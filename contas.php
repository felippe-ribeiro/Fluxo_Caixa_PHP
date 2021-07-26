<?php include('includes/actions.php') ?>
<?php $titulo = 'Contas - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php $ativar = 'menu_icon_contas'; ?>
<?php include('includes/mensagens_sistema.php') ?>

    <body id="bodyAddMovimento">
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
								Contas
							</div>
							<div id="btns_acoes">
								<a href="cadastrar_conta.php" class="padraoBotao">Adicionar conta +</a>
							</div>
						</div>
						
						<div id="ger_contas">
							<form action="contas.php" method="get" id="filtrosContas">
								<input name="busca" id="text_buscar" class="padraoInput" type="text" placeholder="Buscar">
								<select name="filtrar_por" class="padraoInput">
									<option value="">Filtrar por</option>
									<option value="">Tudo</option>
									<option value="pagos">Pagos</option>
									<option value="naopagos">Não pagos</option>
								</select>
								<select name="ordenar_por" class="padraoInput">
									<option value="">Ordenar por</option>
									<option value="">Sem ordem</option>
									<option value="data_decrescente">Data decrescente</option>
									<option value="data_crescente">Data crescente</option>
									<option value="mais_atrasado">Mais atrasados</option>
								</select>
							</form>
							
							<ul>
								<?php
								$ordem = '';
								if(isset($_GET['ordenar_por']) && $_GET['ordenar_por'] != ''){
									if ($_GET['ordenar_por'] == 'data_decrescente'){
										$ordem = ' ORDER BY ano ASC, mes ASC, dia ASC';
									} else if ($_GET['ordenar_por'] == 'data_crescente'){
										$ordem = ' ORDER BY ano DESC, mes DESC, dia DESC';
									} else if ($_GET['ordenar_por'] == 'mais_atrasado'){
										$ordem = ' ORDER BY pago ASC, ano ASC, mes ASC, dia ASC';
									}
								} else {
									$ordem = ' ORDER BY pago ASC, ano ASC, mes ASC, dia ASC';
								}
								$filtro = '';
								if(isset($_GET['filtrar_por'])){
									if ($_GET['filtrar_por'] == 'pagos'){
										$filtro = ' WHERE pago = "pago"';
									} else if ($_GET['filtrar_por'] == 'naopagos'){
										$filtro = ' WHERE pago IS NULL';
									}
								}
								$busca = '';
								$term_refer = isset($_GET['filtrar_por']) && $_GET['filtrar_por'] != '' ? ' AND' : ' WHERE';
								if(isset($_GET['busca']) && $_GET['busca'] != ''){
									$busca = $term_refer.' (de_para LIKE "%'.$_GET['busca'].'%" OR observacoes LIKE "%'.$_GET['busca'].'%")';
								}
								$qr=mysqli_query($conn,"SELECT * FROM lc_contas ".$filtro.$busca.$ordem);
								//echo("SELECT * FROM lc_contas ".$filtro.$busca.$ordem);
								while ($row=mysqli_fetch_array($qr)){
									$dias_restantes = ceil((strtotime($row['mes']."/".$row['dia']."/".$row['ano']) - time())/(60*60*24));
									if($row['pago']){
										$situacao_texto = '<span class="emdia">'.str_pad($row['dia'], 2, "0", STR_PAD_LEFT)."/".str_pad($row['mes'], 2, "0", STR_PAD_LEFT)."/".$row['ano'].'</span>';
										$situacao = 'emdia';
									} elseif ($dias_restantes > 0){
										$situacao_texto =	'<span class="emdia">Pagar em '.abs($dias_restantes).' dias</span>';
										$situacao = 'emdia';
									} else if ($dias_restantes == 0){
										$situacao_texto =	'<span class="nodia">Pagar hoje</span>';
										$situacao = 'nodia';
									} else if ($dias_restantes < 0){
										$situacao_texto = '<span class="atrasado"><strong>'.abs($dias_restantes).'</strong> dias atrasado</span>';
										$situacao = 'atrasado';
									}
								?>
									<li class="<?= $row['pago'] == '' ? '' : 'pago' ?> <?= $situacao ?> <?= $row['tipo'] ?>">
										<?= $row['tipo'] == 'credito' ? 'A receber de' : 'A pagar a' ?>
										<strong><?= $row['de_para'] ?></strong>
										<?= formata_dinheiro($row['valor']) ?>
										<?= $row['conta_mensal'] == 'true' ? '<strong>mensalmente</strong>' : '' ?>
										(<?= $situacao_texto ?>)
										<a class="btn_excluir" onclick="return confirm('Tem certeza que deseja apagar essa conta?')" href="?acao=excluir_conta&id=<?= $row['id'] ?>" title="Remover"></a>
										<?php if($row['pago'] == ''){ ?>
											<a href="#" class="btn_pago">Pago</a>
											<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="formPagaConta">
												<input type="hidden" name="acao" value="pagar_conta">
												<input type="hidden" name="id_conta" value="<?= $row['id'] ?>">
											</form>
										<?php } ?>
										<span class="valor <?= $row['tipo'] ?>">
										<?= $row['tipo'] == 'credito' ? '+' : '-' ?>
										<?= formata_dinheiro($row['valor']) ?>
										</span>
									</li>
								<?php } ?>
<!--								<li class="atrasado debito">
									A pagar a <strong>Cart&oacute;rio do Estado</strong> R$ 150,00 (<span class="atrasado"><strong>15</strong> dias atrasado</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor debito">-R$ 150,00</span>
								</li>
								<li class="nodia debito">
									A pagar a <strong>Fornecedor</strong> R$ 150,00 (<span class="nodia">Pagar hoje</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor debito">+R$ 750,00</span>
								</li>
								<li class="nodia credito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="nodia">Pagar hoje</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor credito">+R$ 750,00</span>
								</li>
								<li class="emdia credito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor credito">+R$ 750,00</span>
								</li>
								<li class="emdia debito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor debito">+R$ 750,00</span>
								</li>
								<li class="emdia debito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor debito">+R$ 750,00</span>
								</li>
								<li class="emdia credito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor credito">+R$ 750,00</span>
								</li>
								<li class="emdia credito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor credito">+R$ 750,00</span>
								</li>
								<li class="emdia debito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<a href="#" class="btn_pago">Pago</a>
									<span class="valor debito">+R$ 750,00</span>
								</li>
								<li class="pago credito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<span class="valor credito">+R$ 750,00</span>
								</li>
								<li class="pago debito">
									A receber de <strong>J&uacute;nior</strong> R$ 750,00 (<span class="emdia">Pagar em 2 dias</span>)
									<span class="valor debito">+R$ 750,00</span>
								</li>
-->							</ul>
							
							<!--<a href="#" class="padraoBotao mostra_mais">Mostrar mais ></a>-->
							
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

