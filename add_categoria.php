<?php include('includes/actions.php') ?>
<?php $titulo = 'Adicionar categoria - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php include('includes/mensagens_sistema.php') ?>

    <body id="bodyAddCategoria">
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
								Adicionar categoria
							</div>
							<div id="btns_acoes">
								<a href="principal.php" class="padraoBotao">< Voltar</a>
							</div>
						</div>
						
						<form class="form_cadastro" method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
							<input type="hidden" name="acao" value="2" />
							<label for="nome">Nome:</label>
							<input type="text" id="nome" name="nome" maxlength="50">
							<input type="submit" value="Cadastrar" class="padraoBotao">
						</form>
						
						<ul id="lista_categorias">
							<?php
							$qr=mysqli_query($conn,"SELECT id, nome FROM lc_cat");
							while ($row=mysqli_fetch_array($qr)){
							?>
							<li>
								<span class="nome"><?php echo $row['nome']?></span>
								<?php if($_SESSION['tipo'] == 'supadm'){ ?>
								<a onclick="return confirm('Tem certeza que deseja remover esta categoria?\nAtenção: Apenas categorias sem movimentos associados poder�o ser removidas.')" href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&acao=apagar_cat&id=<?php echo $row['id']?>" class="btn_excluir" title="Remover categoria"></a>
								<?php } ?>
								<a href="#editar" class="btn_editar" title="Editar categoria"></a>
								<form class="editar_categoria" method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
								<input type="hidden" name="acao" value="editar_cat" />
								<input type="hidden" name="id" value="<?php echo $row['id']?>" />
								<input type="text" class="padraoInput" name="nome" value="<?php echo $row['nome']?>" size="20" maxlength="50" />
								<input type="submit" class="input padraoBotao" value="Alterar" />
								</form> 
							</li>
							<?php }?>
						</ul>
						
					</div>
				</div>
			
			<footer>
				Livro Caixa - Desenvolvido por Felippe Ribeiro CETI -HAS. 
			</footer>
			
		</div>

		<?php include('includes/footer.php') ?>
    </body>
</html>
