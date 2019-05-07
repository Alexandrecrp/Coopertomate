<?php
session_start();
require_once("classes/control/ConexaoControl/Conexao.php");
require_once("classes/control/UsuarioControl/LoginUsuario.php");
require_once("classes/control/UsuarioControl/RetornaIdUsuario.php");
require_once("classes/control/ConexaoControl/RegistroConexao.php");
$registrodeconexao = RegistroConexao::getInstancia();
$registrodeconexao->set('Connection', $conn);
$loginusuario = new LoginUsuario();
if (isset($_POST['btnSubmit'])) {
    if ($loginusuario->LoginUsuario($_POST['txtEmail'], $_POST['txtPassword'])) {
    $_SESSION['logado'] = '1';
		$retornaidusuario = new RetornaIdUsuario();
		$_SESSION['id']=$retornaidusuario->RetornaIdfornecedor($_POST['txtEmail']);
		header ("Location: painel.php");
    } else {
        ?>
        <script type="text/javascript">
            alert("Usuário ou senha inválido.");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>.::CooperTomate::.</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
				<!-- Bootstrap core CSS -->
				<link href="dist/css/bootstrap.min.css" rel="stylesheet">
				<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
				<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
				<!-- Custom styles for this template -->
				<link href="assets/css/login.css" rel="stylesheet">
				<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
				<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
				<script src="assets/js/ie-emulation-modes-warning.js"></script>
				<link href="asset/css/themify-icons.css" rel="stylesheet">
        <link rel="shortcut icon" href="img/logo2.png" />
    </head>
    <body>
			<video autoplay="" loop="" poster="polina.jpg" class="bg_video" muted>
				<source src="videos/tomates.mp4" type="video/mp4">
			</video>
			<div class="container-fluid">
				<img src="">
			</div>
			<div class="container"></br></br></br></br></br></br>
		      <form method="post" class="form-signin" name="frmLogin">
						<div class="alert">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								<div class="form-group">
									<label class="colorwhite">Email</label>
									<input type="text" name="txtEmail" class="form-control" placeholder="" autocomplete="off" required >
								</div>
									<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
								<div class="form-group">
									<label class="colorwhite">Senha</label>
									<input type="password" name="txtPassword" class="form-control " placeholder="" autocomplete="off" required >
								</div>
								<div class="form-group">
									<center><input type="submit" name="btnSubmit" value="Acessar CooperTomate" class="btn btn-danger "/><center>
								</div>
								</br>
								<center>
									<a href="recuperarSenha.php" class="colorwhite"> Recuperar Senha</a>
								</center>
						</div>
		      </form>
			</div>
			<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
			<script src="dist/js/bootstrap.min.js"></script>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
