<?php
require_once("classes/control/ConexaoControl/RegistroConexao.php");
require_once("classes/model/Usuario.php");
require_once("classes/control/UsuarioControl/ConsultaUsuario.php");
require_once("classes/control/UsuarioControl/CadastroUsuario.php");
require_once("classes/model/EnviarEmailConfirmacaoCadastro.php");
require_once("classes/control/ConexaoControl/Conexao.php");
$registrodeconexao = RegistroConexao::getInstancia();
$registrodeconexao->set('Connection', $conn);
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
			<link href="assets/css/painel.css" rel="stylesheet">
			<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
			<script src="assets/js/ie-emulation-modes-warning.js"></script>
			<link href="asset/css/themify-icons.css" rel="stylesheet">
	    <link rel="shortcut icon" href="img/logo2.png" />
    </head>
    <body>
      <div class="container"></br></br></br>
				<form method="post" class="form-signin" name="frmLogin">
					<div class="alert">
						<tr>
							<td><h5 class="colorwhite">CPF:</h5></td>
							<td><input type="text" name="txtCpf" class="form-control" placeholder="00000000000" autocomplete="off" /></td>
						</tr>
						<tr>
							<td><h5 class="colorwhite">Nome:</h5></td>
							<td><input type="text" name="txtNome" class="form-control" placeholder="Miguel Dias" autocomplete="off" /></td>
						</tr>
						<tr>
							<td><h5 class="colorwhite">E-mail:</h5></td>
							<td><input type="text" name="txtEmail" class="form-control" placeholder="email@dominio.com" autocomplete="off" /></td>
						</tr>
						<tr>
							<td><h5 class="colorwhite">Senha:</h5></td>
							<td><input type="password" id="txtPass" name="txtPass" class="form-control" placeholder="*********" autocomplete="off" /></td>
						</tr>
						<tr>
							<td><h5 class="colorwhite">Confirmar senha:</h5></td>
							<td><input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="*********" autocomplete="off" /></td>
							<td colspan="2">
							<center>
								<input type="submit" name="btnSubmit" value="Cadastrar" class="btn btn-danger"  /> <td><a href="index.php"  class="btn btn-default">Voltar</a></td>
							</center>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<footer class="footer">
				<p><center>&copy; CooperTomate.</center></p>
		</footer>

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
<?php
if (isset($_POST['btnSubmit'])) {
	//classe responsável por setar valores da entidade usuario
	$usuario = new Usuario();
	$usuario->setCpf($_POST['txtCpf']);
	$usuario->setNome($_POST['txtNome']);
	$usuario->setEmail($_POST['txtEmail']);
	$usuario->setSenha($_POST['txtSenha']);
	//classe responsável por consultar se usuário existe ou não
		$consultausuario = new ConsultaUsuario();
			if (!$consultausuario->consultarUsuario($_POST['txtCpf'])){
					//classe responsável por cadastrar usuário novo
					$cadastraUsuario = new cadastroUsuario($usuario);
					$cadastraUsuario->cadastrarUsuario();
					//Classe responsável por disparar um e-mail de confirmação de cadastro
					$enviaremailconfirmacaocadastro = new SmtpMailer($usuario);
					$enviaremailconfirmacaocadastro->enviarEmail("Cadastrado com sucesso ".$usuario->getNome()." e sua senha de acesso é: ".$usuario->getSenha());
		} else {
?>
<script>
	alert("CPF já cadastrado.");
</script>
<?php
	}
}
?>
