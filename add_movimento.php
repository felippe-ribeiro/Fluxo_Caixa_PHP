<?php include('includes/actions.php') ?>
<?php $titulo = 'Adicionar movimento - Livro caixa' ?>
<?php include('includes/head.php') ?>
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
								Adicionar movimento
							</div>
							<div id="btns_acoes">
								<a href="principal.php" class="padraoBotao">< Voltar</a>
							</div>
						</div>
						
						<?php
						$qr=mysqli_query($conn,"SELECT * FROM lc_cat");
						if (mysqli_num_rows($qr)==0){
						?>
						
							<a href="add_categoria.php" class="padraoBotao adicione_categoria">Adicione ao menos uma categoria</a>
						
						<?php } else { ?>
												
						<form action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>" method="post" class="form_cadastro">
							<input type="hidden" name="acao" value="1" />
							<ul>
								<li>
									<label for="nome">Data:</label>
									<a href="#" class="btn_icone calendario_ico" id="calendario_btn" title="Abrir calendário"></a>
									<input type="text" name="data" maxlength="10" id="calendarioInput" value="<?php echo date('d')?>/<?php echo $mes_hoje?>/<?php echo $ano_hoje?>">
								</li>
								<li>
									<label for="nome">Tipo:</label>
									<input type="radio" name="tipo" value="1"> <span class="receita">Receita</span>
									<input type="radio" name="tipo" value="0"> <span class="despesa">Despesa</span>
								</li>
								<li>
									<label for="nome">Categoria:</label>
									<select name="cat">
										<option></option>
										<?php while ($row=mysqli_fetch_array($qr)){ ?>
										<option value="<?php echo $row['id']?>"><?php echo $row['nome']?></option>
										<?php }?>
									</select>
								</li>
								<li>
									<label for="nome">Descrição:</label>
									<textarea name="descricao" maxlength="255"></textarea>
								</li>
								<li>
									<label for="nome">Valor:</label>
									<span class="inputBoxLeft">R$</span>
									<input type="text" name="valor" maxlength="10">
								</li>
							</ul>
							<input type="submit" value="Cadastrar" class="padraoBotao">
							<a href="principal.php" class="padraoBotaoDefault">Cancelar</a>
						</form>
						
						<?php } ?>
						
					</div>
				</div>
			
			<footer>
				Livro Caixa - Desenvolvido por Felippe Ribeiro CETI -HAS. 
			</footer>
			
		</div>

		<?php include('includes/footer.php') ?>
    </body>
</html>
