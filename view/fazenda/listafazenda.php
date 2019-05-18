<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Produtor.php");
require_once("../../classes/control/ProdutorControl/ListaProdutor.php");
require_once("../../classes/model/Fazenda.php");
require_once("../../classes/control/FazendaControl/ListaFazenda.php");
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
						<li><a href="../../cadastro.php" class="colorwhite">Cadastro de Usuário</a></li>
						<li><a href="../produtor/listaprodutor.php" class="colorwhite">Produtor</a></li>
						<li><a href="listafazenda.php" class="colorwhite">Fazendas</a></li>
						<li><a href="../cliente/listacliente.php" class="colorwhite">Cadastro clientes</a></li>
						<li><a href="../lote/listalote.php" class="colorwhite">Cadastro Lotes</a></li>
						<li><a href="../lotevenda/listalotevenda.php" class="colorwhite">Vendas de lotes</a></li>
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
					<a href="cadastrofazenda.php" class="btn btn-danger"/>Cadastrar Nova Fazenda</a> <a href="../../painel.php" class="btn btn-default">Voltar</a></td>
				</div>
				<h3 class="page-header">Lista Fazendas</h3>
				<table class="table table-striped">
					<thead>
						<tr>
						  <th scope="col">Código</th>
						  <th scope="col">Produtor</th>
						  <th scope="col">Fazenda</th>
						  <th scope="col">Cidade</th>
							<th scope="col"><center>Ação</center></th>
						</tr>
					  </thead>
					<tbody>
						<?php
							$listafazenda = new ListaFazenda;
							$resultado = $listafazenda->getAll();
							foreach($resultado as $fazenda) {
						?>
						<tr>
							<th width="50" scope="row">
								<center>
									<?php echo $fazenda->getId();?>
								</center>
							</th>
							<td width="200">
								<?php
									$listaprodutor = new ListaProdutor;
									$resultado = $listaprodutor->getAll();
									foreach($resultado as $produtorselecionado) {
										if($produtorselecionado->getId()==$fazenda->getProdutor()) {
										echo	$produtorselecionado->getNome();
										}
									}
								?>
							</td>
							<td width="200">
								<?php echo $fazenda->getFazenda();?>
							</td>
							<td width="200">
								<?php echo $fazenda->getCidade();?>
							</td>
							<td width="400">
								<center>
									<a href="editafazenda.php?idfazenda=<?php echo $fazenda->getId();?>" class="btn btn-danger btn-md" role="button">Editar</a>
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
