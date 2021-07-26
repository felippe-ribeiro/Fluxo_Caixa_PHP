<?php include('includes/actions.php') ?>
<?php $titulo = 'Cadastrar usuário - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php
	$usuarios_query = mysql_query('SELECT * FROM lc_usuarios WHERE id = '.$_GET['id']);
	$usuarios = mysql_fetch_assoc($usuarios_query);
	if(mysql_num_rows($usuarios_query) <= 0){
		header('Location: usuarios.php');
	}
	if($_SESSION['tipo'] != 'supadm' && $_GET['id'] != $_SESSION['id']){
		header('Location: usuarios.php');
	}
?>
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
								Editar usuário
							</div>
							<div id="btns_acoes">
								<a href="usuarios.php" class="padraoBotao">< Voltar</a>
							</div>
						</div>
						
						<div id="cadastrar_conta">


							<form action="#" method="post" class="form_cadastro" id="aReceberForm">
								<input type="hidden" name="acao" value="editar_usuario">
								<input type="hidden" name="id_usuario" value="<?= $_GET['id'] ?>">
								<ul>
								<?php if($_SESSION['tipo'] == 'supadm'){ ?>
									<li>
										<label for="valor">Nome:</label>
										<input type="text" name="nome" value="<?= $usuarios['nome'] ?>" maxlength="100">
									</li>
									<li>
										<label for="nome">Email:</label>
										<input type="text" name="email" value="<?= $usuarios['email'] ?>" maxlength="45">
									</li>
								<?php }  else{ ?>
								
									<li>
										<label for="valor">Nome:</label>
										<input type="text" disabled="true" name="nome" value="<?= $usuarios['nome'] ?>" maxlength="100">
									</li>
									<li>
										<label for="nome">Email:</label>
										<input type="text" disabled="true" name="email" value="<?= $usuarios['email'] ?>" maxlength="45">
									</li>
								
								<?php } ?>
									
									
									<li>
										<label for="valor">Nova senha:</label>
										<input type="password" name="senha" maxlength="45">
									</li>
									<li>
										<label for="Foto">Alterar foto:</label>
										<a href="https://wordpress.com/log-in/pt-br?redirect_to=https%3A%2F%2Fwordpress.com%2F" target="_blank" >Alterar foto no Gravatar</a> 
										
									</li> 
									<?php if($_GET['id'] != $_SESSION['id']){ ?>
									<li>
										<label for="nome">Tipo de conta:</label>
										<select name="tipo_conta">
											<option value="administrador" <?= $usuarios['tipo'] == 'administrador' ? 'selected="selected"' : '' ?>>Administrador</option>
											<option value="gestor" <?= $usuarios['tipo'] == 'gestor' ? 'selected="selected"' : '' ?>>Gestor de contas</option>
											<option value="supadm" <?= $usuarios['tipo'] == 'supadm' ? 'selected="selected"' : '' ?>>SuperAdmin</option>
										</select>
									</li>
									<?php } ?>
								</ul>
								<input type="submit" value="Atualizar" class="padraoBotao">
								<a href="usuarios.php" class="padraoBotaoDefault">Cancelar</a>
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

