<?php include('includes/actions.php') ?>
<?php $titulo = 'Relatórios'?>
<?php include('includes/head.php') ?>
<?php include('includes/mensagens_sistema.php') ?>
<?php 
$ativar = 'menu_icon_relatorios'; 

$timestamp_1_mes = strtotime("+0 month");
$timestamp_less_1_mes = strtotime("-1 month");

if(isset($_GET['dataInicio']) && isset($_GET['dataFim'])){
	$diaInicio = substr($_GET['dataInicio'], 0, 2);
	$mesInicio = substr($_GET['dataInicio'], 3, 2);
	$anoInicio = substr($_GET['dataInicio'], 6, 4);
	$diaFinal = substr($_GET['dataFim'], 0, 2);
	$mesFinal = substr($_GET['dataFim'], 3, 2);
	$anoFinal = substr($_GET['dataFim'], 6, 4);
} else {
	$diaInicio = date('d', $timestamp_less_1_mes);
	$mesInicio = date('m', $timestamp_less_1_mes);
	$anoInicio = date('Y', $timestamp_less_1_mes);
	$diaFinal = date('d', $timestamp_1_mes);
	$mesFinal = date('m', $timestamp_1_mes);
	$anoFinal = date('Y', $timestamp_1_mes);
}

$testDataInicio = 'CONCAT(m.ano, LPAD(m.mes,2,0), LPAD(m.dia,2,0)) >= '.$anoInicio.$mesInicio.$diaInicio;
$testDataFinal = 'CONCAT(m.ano, LPAD(m.mes,2,0), LPAD(m.dia,2,0)) <= '.$anoFinal.$mesFinal.$diaFinal;
$movimentoQuery = mysqli_query($conn,'SELECT m.* FROM lc_movimento m WHERE '.$testDataInicio.' AND '.$testDataFinal.' ORDER by ano ASC, mes ASC, dia ASC');



$somaTotal = 'SUM(IF(m.tipo = 1, m.valor, m.valor*-1)) as valor_total';
$somaTotalQuery = mysqli_query($conn,'SELECT '.$somaTotal.' FROM lc_movimento m WHERE '.$testDataInicio.' AND '.$testDataFinal);

//Por dia
if(isset($_GET['por'])){
	if($_GET['por'] == 'dia'){
		$porDiaGraficoQuery = mysqli_query($conn,'SELECT SUM(IF(tipo = 1, valor, 0)) as calcCredito, SUM(IF(tipo = 0, valor, 0)) as calcDebito, CONCAT(LPAD(dia,2,0),"/",LPAD(mes,2,0),"/",ano) as diaData FROM lc_movimento m WHERE '.$testDataInicio.' AND '.$testDataFinal.' GROUP BY CONCAT(ano, mes, dia)');
	} else if($_GET['por'] == 'mes'){
		$porDiaGraficoQuery = mysqli_query($conn,'SELECT SUM(IF(tipo = 1, valor, 0)) as calcCredito, SUM(IF(tipo = 0, valor, 0)) as calcDebito, CONCAT(LPAD(mes,2,0),"/",ano) as diaData FROM lc_movimento m WHERE '.$testDataInicio.' AND '.$testDataFinal.' GROUP BY CONCAT(ano, mes)');
	} else if($_GET['por'] == 'ano'){
		$porDiaGraficoQuery = mysqli_query($conn,'SELECT SUM(IF(tipo = 1, valor, 0)) as calcCredito, SUM(IF(tipo = 0, valor, 0)) as calcDebito, ano as diaData FROM lc_movimento m WHERE '.$testDataInicio.' AND '.$testDataFinal.' GROUP BY ano');
	}
} else {
	$porDiaGraficoQuery = mysqli_query($conn,'SELECT SUM(IF(tipo = 1, valor, 0)) as calcCredito, SUM(IF(tipo = 0, valor, 0)) as calcDebito, CONCAT(LPAD(dia,2,0),"/",LPAD(mes,2,0),"/",ano) as diaData FROM lc_movimento m WHERE '.$testDataInicio.' AND '.$testDataFinal.' GROUP BY CONCAT(ano, mes, dia)');
}


?>


    <body id="bodyRelatorios">
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['', 'Receita', 'Despesa'],
			  <?php 
				while($porDiaGrafico = mysqli_fetch_assoc($porDiaGraficoQuery)){
					echo('["'.$porDiaGrafico['diaData'].'",'.$porDiaGrafico['calcCredito'].','.$porDiaGrafico['calcDebito'].'],');
				}
			  ?>
			]);
	
			var options = {
			  legend: { position: 'bottom' }
			  //bars: 'horizontal' // Required for Material Bar Charts.
			};
	
			var chart = new google.charts.Bar(document.getElementById('barchart_material'));
	
			chart.draw(data, options);
		  }
		</script>
		<div id="content">
		
			<!--[if lt IE 7]>
				<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->
	
				<div class="conteudo">
					<?php include('includes/lateral_esquerda.php') ?>
					<div class="col_dir">
					
						<header>
							<?php include('includes/header.php') ?>
							
						</header>
						
						<div id="topo">
							<div id="titulo_topo">
								<span class="dea">De</span> 
								<?= $diaInicio.' de '.$nomMes[$mesInicio].' de '.$anoInicio ?>
								<a id="btnDataInicio" href="#" class="calendario_ico"></a>
								<span class="dea">a</span>
								<?= $diaFinal.' de '.$nomMes[$mesFinal].' de '.$anoFinal ?>
								<a id="btnDataFinal" href="#" class="calendario_ico"></a>
								<form action="relatorios.php" method="get" id="filtro_mes">
									<input type="text" name="dataInicio" value="<?= $diaInicio.'/'.$mesInicio.'/'.$anoInicio ?>">
									<input type="text" name="dataFim" value="<?= $diaFinal.'/'.$mesFinal.'/'.$anoFinal ?>">
									<!--<select name="por">
										<option value="dia">Por dia</option>
										<option value="mes">Por mês</option>
										<option value="ano">Por ano</option>
									</select>-->
								</form>
							</div>
							<a id="btn_imprimir" href="javascript:print()"></a>
						</div>
						
						<div id="relatorios">
							<div id="receitaDespesa">
								<!--<div id="barchart_material"></div>-->
							</div>
							<div id="movimentosRelatorio">
								<div id="topoMovimento">
									Movimentos
								</div>
								<ul>
									<?php while($movimentos = mysqli_fetch_assoc($movimentoQuery)){
 ?>
									<li>
									
									<?php $qr= mysqli_query($conn,'SELECT * FROM lc_cat WHERE id = '.$movimentos['cat']) or die(mysqli_error());  
									$qr2 = mysqli_fetch_assoc($qr); ?>
									
										<?= str_pad($movimentos['dia'], 2, "0", STR_PAD_LEFT).'/'.str_pad($movimentos['mes'], 2, "0", STR_PAD_LEFT).'/'.$movimentos['ano'] ?> - 
										<?= $movimentos['descricao']." - ("."<font color ='blue'>".$qr2['nome']."</font>".")" ?>
										<?php echo (" </br><b>Responsável pelo preenchimento:"); ?>
										<?= "<font color='red'>".$movimentos['responsavel']."</font>"  ?><?php echo ("</b>") ?>
										<span class="valor <?= $movimentos['tipo'] == 1 ? 'credito':'debito' ?>">
											<?= $movimentos['tipo'] == 1 ? '+':'-' ?>
											<?= formata_dinheiro($movimentos['valor']) ?>
										</span>
									</li>
									<?php } ?>
								</ul>
								<div id="totalMovimento">
									<?php $total = mysqli_fetch_assoc($somaTotalQuery) ?>
									<?= formata_dinheiro($total['valor_total']) ?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			
			<footer>
				Livro Caixa - Desenvolvido por Felippe Ribeiro CETI -HAS. 
			</footer>
			
		</div>

		<?php include('includes/footer.php') ?>
    </body>
</html>

