<?php include('includes/actions.php') ?>
<?php $titulo = 'Cadastrar usuário - Livro caixa' ?>
<?php include('includes/head.php') ?>
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
								Cadastrar usuário
							</div>
							<?php if($_SESSION['tipo'] == 'supadm'){ ?>
							<div id="btns_acoes">
								<a href="usuarios.php" class="padraoBotao">< Voltar</a>
							</div>
						</div>
						
						<div id="cadastrar_conta">

							<form name="formUser" action="#" method="post" class="form_cadastro" id="aReceberForm">
								<input type="hidden" name="acao" value="cadastrar_usuario">
								<ul>
									<li>
										<label for="valor">Nome Completo:</label>
										<input type="text" name="nome" maxlength="100">
									</li>
									<li>
										<label for="nome">Email:</label>
										<input type="text" name="email" maxlength="45">
									</li>
									<li>
										<label for="valor">Senha:</label>
										<input type="password"  name="resp_senha" maxlength="45" required>
									</li>
									<li>
										<label for="valor">Confirmar Senha:</label>
										<input type="password" onkeyup="validar()" name="senha" maxlength="45" required>
									</li>
									<center><span id="resultado">&nbsp;</span></center>
									<center><span id="resultado2">&nbsp;</span></center>
									<li>
										<label for="nome">Tipo de conta:</label>
										<select name="tipo_conta">
											<option value="administrador">Administrador</option>
											<option value="gestor">Gestor de contas</option>
											<option value="supadm">Super Admin</option>
										</select>
									</li>									
								</ul>
								<input type="submit" value="Cadastrar" class="padraoBotao" onclick="return validar()">
								<a href="usuarios.php" class="padraoBotaoDefault">Cancelar</a>
							</form>
							
						</div>
							<?php } ?>
					</div>
				</div>
			
			<footer>
				Livro Caixa - Desenvolvido por Felippe Ribeiro - CETI HAS
			</footer>
			
		</div>

		<?php include('includes/footer.php') ?>
    </body>
</html>

