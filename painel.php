<?php
session_start();
require_once("classes/control/ConexaoControl/RegistroConexao.php");
require_once("classes/control/ConexaoControl/Conexao.php");
require_once("classes/control/UsuarioControl/RetornaIdUsuario.php");
$registrodeconexao = RegistroConexao::getInstancia();
$registrodeconexao->set('Connection', $conn);
if ($_SESSION['logado'] != 1) {
    ?>
    <script type="text/javascript">
        document.location.href = "index.php?erro=1";
    </script>
    <?php
} else {
    ?>
<!DOCTYPE html>
<html lang="pt-br" class="bg_video">
    <head>
	    <meta charset="UTF-8">
	    <title>.::CooperTomate::.</title>
	    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
			<!-- Bootstrap core CSS -->
			<link href="dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
			<!-- Custom styles for this template -->
			<link href="assets/css/painelone.css" rel="stylesheet">
			<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
			<script src="assets/js/ie-emulation-modes-warning.js"></script>
			<link href="asset/css/themify-icons.css" rel="stylesheet">
	    <link rel="shortcut icon" href="img/logo2.png" />
    </head>
    <body>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#"></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					  <ul class="nav navbar-nav">
							<li><a href="cadastro.php" class="colorwhite">Cadastro de Usuário</a></li>
							<li><a href="view/produtor/listaprodutor.php" class="colorwhite">Produtor</a></li>
							<li><a href="view/fazenda/listafazenda.php" class="colorwhite">Fazenda</a></li>
							<li><a href="view/cliente/listacliente.php" class="colorwhite">Cadastro clientes</a></li>
							<li><a href="view/lote/listalote.php" class="colorwhite">Cadastro Lotes</a></li>
							<li><a href="view/lotevenda/listalotevenda.php" class="colorwhite">Vendas de lotes</a></li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
							<li><a href="?acao=sair"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					  </ul>
					</div>
			  </div>
			</nav>

		<div class="container">

		</div>

		<!--<div class="container-fluid">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<center>
					<div class="carousel-inner" role="listbox">
						<div class="item active"><a href="#" target="_top"><img src="img/tomatethree.jpg"></a></div>
						<div class="item"><a href="#" target="_top"><img src="img/tomatethree.jpg"></a></div>
						<div class="item"><a href="#" target="_top"><img src="img/tomatethree.jpg"></a></div>
					</div>
				</center>
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
		</div>-->
		<footer class="footer">
				<p><center>&copy; CooperTomate - <? echo date("Y");?>.</center></p>
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
}

if (isset($_GET["acao"])) {

    if ($_GET["acao"] == "sair") {
        $_SESSION['logado'] = 0;
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?erro=2";
        </script>
        <?php
    }
}
?>
