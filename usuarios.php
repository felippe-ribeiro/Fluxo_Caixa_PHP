<?php include('includes/actions.php') ?>
<?php $titulo = 'Usuários - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php $ativar = 'menu_icon_usuarios'; ?>
<?php include('includes/mensagens_sistema.php') ?>


    <body id="bodyAddMovimento">
		<div id="content">
		

	
				<div class="conteudo">
					<?php include('includes/lateral_esquerda.php') ?>
					<div class="col_dir">
					
						<header>
							<?php include('includes/header.php') ?>
						</header>
						
						<div id="topo">
							<div id="titulo_topo">
								Usuários
							</div>
							<?php if($_SESSION['tipo'] == 'supadm'){ ?>
							<div id="btns_acoes">
								<a href="cadastrar_usuario.php" class="padraoBotao">Cadastrar novo usuário</a>
							</div>
							
						</div>
						
						<?php
						$usuarios_query = mysqli_query($conn,'SELECT * FROM lc_usuarios');
						?>
						
						<div id="ger_usuarios">
							<ul>
								<?php while($usuarios = mysqli_fetch_assoc($usuarios_query)){ ?>
								<li>
									<strong><?= $usuarios['nome'] ?></strong>
									(<?= $usuarios['email'] ?>) - 
									<span class="strong_primary"><?= $usuarios['tipo'] ?></span>
									<a href="usuarios.php?excluir=<?= $usuarios['id'] ?>" class="btn_editar_usuario excluir_btn">Excluir</a>
									<a href="editar_usuario.php?id=<?= $usuarios['id'] ?>" class="btn_editar_usuario">Editar</a>
								</li>
								<?php } ?>
							</ul>
						</div>
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

