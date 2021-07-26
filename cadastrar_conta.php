<?php include('includes/actions.php') ?>
<?php $titulo = 'Cadastrar conta - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php include('includes/mensagens_sistema.php') ?>
    <body id="bodyAddconta">
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
								Cadastrar conta
							</div>
							<div id="btns_acoes">
								<a href="contas.php" class="padraoBotao">< Voltar</a>
							</div>
						</div>
						
						<div id="cadastrar_conta">

							<a href="#" id="aReceber" class="botao_toggle ativo">Conta a <strong>receber</strong></a>
							<a href="#" id="aPagar" class="botao_toggle">Conta <strong>a pagar</strong></a>
							<form action="#" method="post" class="form_cadastro" id="aReceberForm">
								<input type="hidden" name="acao" value="cadastrar_conta">
								<input type="hidden" name="tipo" value="credito">
								<ul>
									<li>
										<label for="valor">Valor a receber:</label>
										<span class="inputBoxLeft">R$</span>
										<input type="text" name="valor">
									</li>
									<li>
										<label for="nome">Receber de:</label>
										<input type="text" name="nome">
									</li>
									<li>
										<label for="data_pagamento">Dia a receber:</label>
										<a href="#calendario" class="btn_icone calendario_ico" title="Abrir calendário"></a>
										<input type="text" name="data_pagamento" class="data_pagamento">
										<label class="select_check">
											<input type="checkbox" name="mensal" value="true"> Conta mensal
										</label>
									</li>
									<li>
										<label for="observacoes">Observações:</label>
										<textarea name="observacoes"></textarea>
									</li>
								</ul>
								<input type="submit" value="Cadastrar" class="padraoBotao">
								<a href="contas.php" class="padraoBotaoDefault">Cancelar</a>
							</form>

							<form action="#" method="post" class="form_cadastro" id="aPagarForm">
								<input type="hidden" name="acao" value="cadastrar_conta">
								<input type="hidden" name="tipo" value="debito">
								<ul>
									<li>
										<label for="valor">Valor a pagar:</label>
										<span class="inputBoxLeft">R$</span>
										<input type="text" name="valor">
									</li>
									<li>
										<label for="nome">Pagar a:</label>
										<input type="text" name="nome">
									</li>
									<li>
										<label for="data_pagamento">Pagar dia:</label>
										<a href="#calendario" class="btn_icone calendario_ico" title="Abrir calend�rio"></a>
										<input type="text" name="data_pagamento" class="data_pagamento">
										<label class="select_check">
											<input type="checkbox" name="mensal" value="true"> Conta mensal
										</label>
									</li>
									<li>
										<label for="observacoes">Observações:</label>
										<textarea name="observacoes"></textarea>
									</li>
								</ul>
								<input type="submit" value="Cadastrar" class="padraoBotao">
								<a href="contas.php" class="padraoBotaoDefault">Cancelar</a>
							</form>
							
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

