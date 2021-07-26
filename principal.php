<?php include('includes/actions.php') ?>
<?php $titulo = 'Livro caixa'; ?>
<?php include('includes/head.php') ?>
<?php $ativar = 'menu_icon_fluxo'; ?>
    <body id="bodyPrincipal">
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
						<div id="calendario">
							<div id="content_select_ano">
								<a href="#" id="ano_selected"><?= $ano_hoje ?></a>
								<ul>
									<?php for ($i=2019;$i<=2021;$i++){ ?>
										<li><a href="?mes=<?= $mes_hoje ?>&ano=<?= $i ?>"><?= $i ?></a></li>
									<?php }?>
								</ul>
							</div>
							<?php if($_SESSION['tipo'] == 'administrador' || 'supadm'){ ?>
							<div id="btns_acoes">
								<a href="add_categoria.php" class="padraoBotao">Adicionar categoria +</a>
								<a href="add_movimento.php" class="padraoBotao">Adicionar movimento +</a>
							</div>
							<?php } ?>
							<div id="radio_meses">
								<?php
								for ($i=1;$i<=12;$i++){
									?>
									<a href="?mes=<?= $i ?>&ano=<?= $ano_hoje ?>" class="<?php if($mes_hoje==$i){ echo 'mesAtual'; } ?>">
									<?= mostraMes($i);?>
									</a>
									</td>
								<?php } ?>
							</div>
						</div>
						
<?php
$qr=mysqli_query($conn,"SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 && mes='$mes_hoje' && ano='$ano_hoje'");
$row=mysqli_fetch_array($qr);
$entradas=$row['total'];

$qr=mysqli_query($conn,"SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 && mes='$mes_hoje' && ano='$ano_hoje'");
$row=mysqli_fetch_array($qr);
$saidas=$row['total'];


$resultado_mes=$entradas-$saidas;
?>
						
						<div id="info_conteudo">
							<div id="entradas_mes" class="box_info">
								<div class="title_top">Entradas <br>e saídas deste mês</div>
								<table>
									<tr>
										<td>Entradas</td>
										<td class="valor"><?php echo formata_dinheiro($entradas) ?></td>
									</tr>
									<tr>
										<td>Saídas</td>
										<td class="valor"><?php echo formata_dinheiro($saidas) ?></td>
									</tr>
									<tr class="resultado">
										<td>Resultado</td>
										<td class="valor"><?php echo formata_dinheiro($resultado_mes) ?></td>
									</tr>
								</table>
							</div>
							
<?php

$qr=mysqli_query($conn,"SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1");
$row=mysqli_fetch_array($qr);
$entradas=$row['total'];

$qr=mysqli_query($conn,"SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 ");
$row=mysqli_fetch_array($qr);
$saidas=$row['total'];

$resultado_geral=$entradas-$saidas;
?>
							
							<div id="balanco_geral" class="box_info">
								<div class="title_top">Balanço geral</div>
								<table>
									<tr>
										<td>Entradas</td>
										<td class="valor"><?php echo formata_dinheiro($entradas)?></td>
									</tr>
									<tr>
										<td>Saídas</td>
										<td class="valor"><?php echo formata_dinheiro($saidas)?></td>
									</tr>
									<tr class="resultado">
										<td>Resultado</td>
										<td class="valor"><?php echo formata_dinheiro($resultado_geral)?></td>
									</tr>
								</table>
							</div>
						</div>
						
						<?php include('includes/mensagens_sistema.php') ?>
						
						<div id="movimentos">
							<div id="header_movimento">
								<span>Movimentos deste mês</span>
								<form name="form_filtro_cat" method="get" action="" class="formfiltrar">
									<input type="hidden" name="mes" value="<?php echo $mes_hoje?>" >
									<input type="hidden" name="ano" value="<?php echo $ano_hoje?>" >
									<select name="filtro_cat" onchange="form_filtro_cat.submit()">
										<option value="" class="opt_filtrar">Filtrar por</option>
										<option value="">Tudo</option>
										<?php
										$qr=mysqli_query($conn,"SELECT DISTINCT c.id, c.nome FROM lc_cat c, lc_movimento m WHERE m.cat=c.id && m.mes='$mes_hoje' && m.ano='$ano_hoje'");
										while ($row=mysqli_fetch_array($qr)){
										?>
										<option <?php if (isset($_GET['filtro_cat']) && $_GET['filtro_cat']==$row['id'])echo "selected=selected"?> value="<?php echo $row['id']?>"><?php echo $row['nome']?></option>
										<?php }?>
									</select>
								</form>
							</div>
							
							<ul id="lista_movimento">
								<?php
								$filtros="";
								if (isset($_GET['filtro_cat'])){
									if ($_GET['filtro_cat']!=''){	
										$filtros="&& cat='".$_GET['filtro_cat']."'";
										$qr=mysqli_query($conn,"SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 && mes='$mes_hoje' && ano='$ano_hoje' $filtros");
										$row=mysqli_fetch_array($qr);
										$entradas=$row['total'];
										$qr=mysqli_query($conn,"SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 && mes='$mes_hoje' && ano='$ano_hoje' $filtros");
										$row=mysqli_fetch_array($qr);
										$saidas=$row['total'];
										$resultado_mes=$entradas-$saidas;
										}
								}
								
								$qr=mysqli_query($conn,"SELECT *, LPAD(dia,2,0) as dia FROM lc_movimento WHERE mes='$mes_hoje' && ano='$ano_hoje' $filtros ORDER By dia");
								$cont=0;
								while ($row=mysqli_fetch_array($qr)){
								$cont++;
								
								$cat=$row['cat'];
								$qr2=mysqli_query($conn,"SELECT nome FROM lc_cat WHERE id='$cat'");
								$row2=mysqli_fetch_array($qr2);
								$categoria=$row2['nome'];
								
								?>
								<li>
									<?php echo "<b>Dia: </b>".$row['dia']."</br>"?>  
									<?php echo $row['descricao']?> 
									(<a href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&filtro_cat=<?php echo $cat?>"><?php echo $categoria?></a>) 
									<a href="#" class="btn_editar"></a>
									<?php if($_SESSION['tipo'] == 'supadm'){ ?>
									<a class="btn_excluir" onclick="return confirm('Tem certeza que deseja apagar?')" href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&acao=apagar&id=<?php echo $row['id']?>" title="Remover"></a>
									<?php } ?>
									<span class="<?php if ($row['tipo']==0) echo "negativo"; else echo "positivo" ?> valor_direita"><?php if ($row['tipo']==0) echo "-"; else echo "+"?><?php echo formata_dinheiro($row['valor'])?></span>
									
									<form method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>" class="form_editar form_cadastro">
										<ul>
												<input type="hidden" name="acao" value="editar_mov" />
												<input type="hidden" name="id" value="<?php echo $row['id']?>" />
											<li>
												<label>Dia:</label>
												<input type="text" name="dia" size="3" maxlength="2" value="<?php echo $row['dia']?>" />
											</li>
											<li>
												<label>Tipo:</label>
												<input <?php if($row['tipo']==1) echo "checked=checked"?> type="radio" name="tipo" value="1" /> 
												<span class="receita">Receita</span>
												</label>
												<input <?php if($row['tipo']==0) echo "checked=checked"?> type="radio" name="tipo" value="0" /> 
												<span class="despesa">Despesa</span>
											</li>
											<li>
												<label>Categoria:</label>
												<select name="cat">
													<?php
													$qr2=mysqli_query($conn,"SELECT * FROM lc_cat");
													while ($row2=mysqli_fetch_array($qr2)){
													?>
														<option <?php if($row2['id']==$row['cat']) echo "selected"?> value="<?php echo $row2['id']?>"><?php echo $row2['nome']?></option>
													<?php }?>
												</select>
											</li>
											<li>
												<label>Valor:</label> 
												<span class="inputBoxLeft">R$</span>
												<input type="text" value="<?php echo $row['valor']?>" name="valor" size="8" maxlength="10" />
											</li>
											<li>
												<label>Descricao:</label>
												<input type="text" name="descricao" value="<?php echo $row['descricao']?>" maxlength="255" />
											</li>
											<li class="ultimo_li">
												<input type="submit" class="padraoBotao" value="Alterar" />
											</li>
										</ul>
									</form> 
									
								</li>
								<?php } ?>
								<li id="total_movimento">
									<?php echo formata_dinheiro($resultado_mes)?>
								</li>
							</ul>
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
