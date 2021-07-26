<?php include('includes/actions.php') ?>
<?php $titulo = 'Cadastrar usuário - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php
	$usuarios_query = mysqli_query($conn,'SELECT * FROM lc_usuarios WHERE id = '.$_GET['id']);
	$usuarios = mysqli_fetch_assoc($usuarios_query);
	if(mysqli_num_rows($usuarios_query) <= 0){
		header('Location: usuarios.php');
	}
	if($_SESSION['tipo'] != 'supadm' && $_GET['id'] != $_SESSION['id']){
		header('Location: usuarios.php');
	}
?>
<?php include('includes/mensagens_sistema.php') ?>

		<script type="text/javascript">
			function validar(){
				var campo1 = formUser.senha.value;
				var campo2 = formUser.resp_senha.value;
						
				if (campo1 == campo2){
					document.getElementById('resultado').style.color = "#008B45";
					document.getElementById('resultado').innerHTML = "Senhas digitadas Conferem";
					if(campo1.length <=5){
						document.getElementById('resultado2').style.color = "#FF6347";
						document.getElementById('resultado2').innerHTML = "Senhas deve conter mais que 5 caracteres";
						return false;
					}else{
						document.getElementById('resultado2').innerHTML = "";
					}
					
				}else{
					document.getElementById('resultado').style.color = "#FF6347";
					document.getElementById('resultado').innerHTML = "Senhas não correspondem";
					if(campo1.length <=5){
						document.getElementById('resultado2').style.color = "#FF6347";
						document.getElementById('resultado2').innerHTML = "Senhas deve conter mais que 5 caracteres";
						return false;
					}else{
						document.getElementById('resultado2').innerHTML = "";
					}
				return false;
				
				}
				

				
				
				
			}
			
			
		</script>
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


							<form name="formUser" action="#" method="post" class="form_cadastro" id="aReceberForm">
								<input type="hidden" name="acao" value="editar_usuario">
								<input type="hidden" name="id_usuario" value="<?= $_GET['id'] ?>">
								<ul>
								<?php if($_SESSION['tipo'] == 'supadm'){ ?>
									<li>
										<label for="valor">Nome:</label>
										<input type="text" name="nome" value="<?= $usuarios['nome'] ?>" maxlength="100" ">
									</li>
									<li>
										<label for="nome">Email:</label>
										<input type="text" name="email" value="<?= $usuarios['email'] ?>" maxlength="45">
									</li>
									
								<?php }  else{ ?>
								
									<li>
										<label for="valor">Nome Completo:</label>
										<input type="text" readonly="true" name="nome" value="<?= $usuarios['nome'] ?>" maxlength="100">
									</li>
									<li>
										<label for="nome">Email:</label>
										<input type="text" readonly="true" name="email" value="<?= $usuarios['email'] ?>" maxlength="45">
									</li>
									
								
								<?php } ?>
									
									
									<li>
										<label for="valor">Senha:</label>
										<input type="password" placeholder="Digite a Senha" name="senha" maxlength="45" required>
									</li>
									<li>
										<label for="valor">Confirmar Senha:</label>
										<input type="password" onkeyup="validar()" placeholder="Confirme a Senha" name="resp_senha" required>
										
										
									</li>
									<center><span id="resultado">&nbsp;</span></center>
									<center><span id="resultado2">&nbsp;</span></center>
								
									</li>
									<li>
										<label for="Foto">Alterar foto:</label>
										<a href="https://wordpress.com/log-in/pt-br?redirect_to=https%3A%2F%2Fwordpress.com%2F" target="_blank" >Alterar foto no Gravatar</a> 
										
									</li> 
									
									<?php if($_SESSION['tipo'] == 'supadm'){ ?>
									<li>
										<label for="nome">Tipo de conta:</label>
										<select name="tipo_conta" >
											<option value="administrador" <?= $usuarios['tipo'] == 'administrador' ? 'selected="selected"' : '' ?>>Administrador</option>
											<option value="gestor" <?= $usuarios['tipo'] == 'gestor' ? 'selected="selected"' : '' ?>>Gestor de contas</option>
											<option value="supadm" <?= $usuarios['tipo'] == 'supadm' ? 'selected="selected"' : '' ?>>SuperAdmin</option>
										</select>
									</li>
									<?php }  else{ ?>
									<li>
										<label for="nome">Tipo de conta:</label>
										<input type="text" readonly="true" name="tipo_conta" value="<?= $usuarios['tipo'] ?>" maxlength="45">
									</li>
									<?php } ?>
									
									
									<?php if($_GET['id'] != $_SESSION['id']){ ?>
									<?php } ?>
								</ul>
								<input type="submit" value="Atualizar" class="padraoBotao" onclick="return validar();">
								<a href="usuarios.php" class="padraoBotaoDefault">Cancelar</a>
							</form>
							
						</div>
						
					</div>
				</div>
			
			<footer>
				Livro Caixa - Desenvolvido por Felippe Ribeiro - CETI HAS
			</footer>
			
		</div>

		<?php include('includes/footer.php') ?>
    </body>
</html>

