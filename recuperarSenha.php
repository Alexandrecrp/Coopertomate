<?php
require_once("classes/model/Usuario.php");
require_once("classes/model/EnviarEmailRedefinirSenha.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8">
      <title>.::Portal Construtora::.</title>
      <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
			<!-- Bootstrap core CSS -->
			<link href="dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
			<!-- Custom styles for this template -->
			<link href="assets/css/logins2.css" rel="stylesheet">
			<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
			<script src="assets/js/ie-emulation-modes-warning.js"></script>
			<link href="asset/css/themify-icons.css" rel="stylesheet">
	    <link rel="shortcut icon" href="img/logo2.png" />
    </head>
    <body style="background-color: #983A35">
	<div class="container-fluid">
		<img src="img/portal.png">
	</div>
	<div class="container">
    <form method="post" class="form-signin" name="frmRecuperarSenha">
			<div class="alert">
				<center>
				</center>
					<p class="">Para redefinir sua senha, por favor insira seu e-mail de cadastro no formulário abaixo.</p>
					<div class="form-group">
						<h5 class="colorwhite">E-mail:</h5>
						<input type="email" name="txtEmail" class="form-control" placeholder="email@dominio.com" required="required" class="inputForm" />
					</div>
					<div class="form-group">
						<input type="submit" name="btnSubmit" value="Recuperar" class="btn btn-danger" />
					</div>
				</div>
    </form>
        </div>
    </body>
</html>
<?php
if (isset($_POST['btnSubmit'])) {
		$usuario = new Usuario();
		$usuario->setEmail(($_POST['txtEmail']));
		$enviaremailredefinirsenha = new SmtpMailerRedefinirSenha($usuario);
		$enviaremailredefinirsenha->enviarEmail("Você esta recebendo este e-mail, por que foi solicitado a alteração de senha para o site,
		clique no link abaixo para redefinir sua senha. <br /><a href='http://localhost/tomate/redefinirSenha.php?conta=".base64_encode($usuario->getEmail()).">Recuperar Senha</a>");
}
?>
