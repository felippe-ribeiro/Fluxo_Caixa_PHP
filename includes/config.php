<?php

//Configura��o do Banco de dados
$host = "localhost";
$user = "admin";
$pass = "";
$d_b = "caixa_cef";

//T�tulo do seu livro Caixa, geralmente seu nome
$lc_titulo="CEF HAS - HCFMUSP";

//////////////////////////////////////
//N�o altere a partir daqui!
//////////////////////////////////////

$conn = mysqli_connect($host, $user, $pass) or die("Erro na conexão com a base de dados");
$db =  mysqli_select_db($conn, $d_b) or die("Erro na seleзгo da base de dados");

if (isset($_SESSION['logado']))
    $logado = $_SESSION['logado'];
else
    $logado = "logado";

	$senha_ = isset($_SESSION['senha']) ? $_SESSION['senha'] : 'false';
	
if (isset($_POST['login']) && $_POST['login'] != '') {
	
	$busca_usuario_query = mysqli_query($conn,'SELECT * FROM lc_usuarios WHERE email="'.addslashes($_POST['login']).'" and senha="'.base64_encode($_POST['senha']).'"');
    if (mysqli_num_rows($busca_usuario_query) > 0) {
		$busca_usuario = mysqli_fetch_assoc($busca_usuario_query);
        $logado = $_SESSION['logado'] = base64_encode($_POST['senha']);
        $_SESSION['id'] = $busca_usuario['id'];
        $_SESSION['nome'] = $busca_usuario['nome'];
        $_SESSION['senha'] = $busca_usuario['senha'];
        $_SESSION['email'] = $busca_usuario['email'];
        $_SESSION['tipo'] = $busca_usuario['tipo'];
        header("Location: principal.php");
        exit();
    } else {
		header("Location: index.php?error=true");
	}
}

if ($logado != $senha_ && !isset($pagina_login)) {
    header("Location: index.php");
    exit();
}
?>
