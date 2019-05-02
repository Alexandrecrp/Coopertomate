<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Cliente.php");
require_once("../../classes/control/ClienteControl/ListaCliente.php");
require_once("../../classes/control/ConexaoControl/Conexao.php");
$registrodeconexao = RegistroConexao::getInstancia();
$registrodeconexao->set('Connection', $conn);
if ($_SESSION['logado'] != 1) {
    ?>
    <script type="text/javascript">
        document.location.href = "../../index.php?erro=1";
    </script>
    <?php
} else {
    ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
	    <meta charset="UTF-8">
	    <title>.::CooperTomate::.</title>
	    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
			<!-- Bootstrap core CSS -->
			<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
			<!-- Custom styles for this template -->
			<link href="../../assets/css/painel.css" rel="stylesheet">
			<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
			<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
			<link href="../../asset/css/themify-icons.css" rel="stylesheet">
	    <link rel="shortcut icon" href="../../img/logo2.png" />
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
					<li><a href="listaprodutor.php" class="colorwhite">Produtor</a></li>
					<li><a href="listafazenda.php" class="colorwhite">Fazendas</a></li>
					<li><a href="listadistribuidor.php" class="colorwhite">Cadastro distribuidores</a></li>
					<li><a href="listacliente.php" class="colorwhite">Cadastro clientes</a></li>
					<li><a href="" class="colorwhite">Classificação de lotes</a></li>
					<li><a href="" class="colorwhite">Cadastro Lotes</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="?acao=sair"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
      <div class="container">
				<div class="nav navbar-nav navbar-right">
					<a href="cadastrocliente.php" class="btn btn-danger"/>Cadastrar Novo Cliente</a> <a href="../../painel.php" class="btn btn-default">Voltar</a></td>
				</div>
				<h3 class="page-header">Lista Clientes</h3>
				<table class="table table-striped">
					<thead>
						<tr>
						  <th scope="col">Código</th>
						  <th scope="col">Cliente</th>
						  <th scope="col">Cidade</th>
							<th scope="col">Estado</th>
							<th scope="col"><center>Ação</center></th>
						</tr>
					  </thead>
					<tbody>
						<?php
							$listacliente = new ListaCliente;
							$resultado = $listacliente->getAll();
							foreach($resultado as $cliente) {
						?>
						<tr>
							<th width="50" scope="row">
								<center>
									<?php echo $cliente->getId();?>
								</center>
							</th>
							<td width="200">
								<?php	echo	$cliente->getCliente();?>
							</td>
							<td width="200">
								<?php echo $cliente->getCidade();?>
							</td>
							<td width="200">
								<?php echo $cliente->getEstado();?>
							</td>
							<td width="400">
								<center>
									<a href="editacliente.php?idcliente=<?php echo $cliente->getId();?>" class="btn btn-danger btn-md" role="button">Editar</a>
								</center>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
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
		if (isset($_GET["acao"])) {

	    if ($_GET["acao"] == "sair") {
	        $_SESSION['logado'] = 0;
	        ?>
	        <script type="text/javascript">
	            document.location.href = "../../index.php?erro=2";
	        </script>
      <?php
    }
	}
}
?>
