

<strong>Seja Bem Vindo: </strong><?= $_SESSION['nome'] ?> 
<img id="perfil_foto" src="http://www.gravatar.com/avatar/<?= md5( strtolower(trim($_SESSION['email']))) ?>?default=wavatar" alt="Perfil">
<a id="editarPerfil" href="editar_usuario.php?id=<?= $_SESSION['id'] ?>" alt="Editar perfil" title="Editar perfil"></a>
<a id="btnSair" href="index.php?sair=true" alt="Sair" title="Sair"></a>

<time datetime="2014-11-19">
	<span class="dia"><?= date('d') ?></span>
	<span class="mes"><?= mostraMes(date('m')) ?></span>
	<span class="ano"><?= date('Y') ?></span>
</time>