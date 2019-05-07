<?php
require_once("classes/control/ConexaoControl/RegistroConexao.php");
require_once("classes/control/ConexaoControl/Conexao.php");
require_once("classes/control/UsuarioControl/ConsultaIdUsuarioRedefinirSenha.php");
require_once("classes/control/UsuarioControl/RedefinirSenha.php");
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
			<link href="assets/css/login.css" rel="stylesheet">
			<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
			<script src="assets/js/ie-emulation-modes-warning.js"></script>
			<link href="asset/css/themify-icons.css" rel="stylesheet">
	    <link rel="shortcut icon" href="img/logo2.png" />
    </head>
    <body>
        <div class="container"></br></br></br>
            <form method="post" class="form-signin" name="frmRedefinirSenha">
                <div class="alert">
					<table>
						<p class="">Insira corretamente sua senha e clique no botão alterar.</p>
						<tr>
							<td class="">Senha:</td>
							<td><input onKeyUp="validarSenha('txtPass', 'txtPassAccept', 'resultadoCadastro');" class="form-control"  type="password" id="txtPass" name="txtPass" placeholder="*********" autocomplete="off" class="inputForm" /></td>
						</tr>
						<tr>
							<td class="">Confirmar senha:</td>
							<td><input type="password" onKeyUp="validarSenha('txtPass', 'txtPassAccept', 'resultadoCadastro');" class="form-control"  id="txtPassAccept" name="txtPassAccept" placeholder="*********" autocomplete="off" class="inputForm" /></td>
						</tr>
						<tr>
							<td colspan="2"><p id="resultadoCadastro" style="font-weight: bold;">&nbsp;</p></td>
						</tr>
						<tr>
							<td colspan="2">
							<center>
								<input type="submit" name="btnSubmit" value="Alterar Senha" class="btn btn-danger" />
								<a href="index.php" class="btn btn-default">Voltar</a></td>
							</center>
						</tr>
					</table>
				</div>
            </form>
        </div>
    </body>
</html>
<?php
$consultaidusuario = new ConsultaIdUsuario();
$redefinirsenha = new RedefinirSenha();
if (isset($_POST['btnSubmit'])) {
    $email = base64_decode($_GET['conta']);
    $senha = $_POST['txtPassAccept'];
    $idusuario = $consultaidusuario->consultarIdUsuario($email);
    if ($redefinirsenha->redefinirSenha($idusuario, $senha)) {
        ?>
        <script type="text/javascript">
            alert("Senha alterada com sucesso.");
            document.location.href= "http://localhost/tomate/";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Erro ao alterar Senha.");
        </script>
        <?php
    }
}
?>
