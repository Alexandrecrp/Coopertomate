<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Fazenda.php");
require_once("../../classes/control/FazendaControl/ListaFazenda.php");
require_once("../../classes/model/Lote.php");
require_once("../../classes/control/LoteControl/ConsultaLote.php");
require_once("../../classes/control/LoteControl/CadastroLote.php");
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
						<li><a href="../produtor/listaprodutor.php" class="colorwhite">Produtor</a></li>
						<li><a href="../fazenda/listafazenda.php" class="colorwhite">Fazendas</a></li>
						<li><a href="../cliente/listacliente.php" class="colorwhite">Cadastro clientes</a></li>
						<li><a href="listalote.php" class="colorwhite">Cadastro Lotes</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="?acao=sair"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
			<div class="container">
				<h3 class="page-header">Cadastro de Lote</h3>
				<form method="post" class="form-signin-fluid" name="frmLogin">
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Lote</label>
							<input type="text" name="lote" class="form-control" placeholder="Lote" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-12">
							<label for="inputState">Fazenda</label>
							<select name="cod_fazenda" class="form-control" value="" required>
								<option selected>Selecione uma fazenda...</option>
								<?php
									$listafazenda = new ListaFazenda;
									$resultado = $listafazenda->getAll();
									foreach($resultado as $fazenda) {
								?>
										<option value="<?=($fazenda->getId());?>"><?=($fazenda->getFazenda());?></option>
								<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Quantidade Inicial</label>
							<input type="text" name="qtdinicial" class="form-control" placeholder="234.2" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Quantidade Vendida</label>
							<input type="text" name="qtdvendida" class="form-control" placeholder="48.1" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>	
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit" value="Cadastrar" class="btn btn-danger"/> <td><a href="listalote.php"  class="btn btn-default">Voltar</a></td>
						</div>
						<h3 class="page-header"></h3>
					</div>
				</form>
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
	//classe responsável por setar valores da entidade lote
	$lote = new Lote();
	$lote->setLote($_POST['lote']);
	$lote->setCod_fazenda($_POST['cod_fazenda']);
	$lote->setQtdinicial($_POST['qtdinicial']);
	$lote->setQtdvendida($_POST['qtdvendida']);
	//classe responsável por consultar se lote existe ou não
		$consultalote = new ConsultaLote();
			if (!$consultalote->consultarLote($_POST['lote'])){
					//classe responsável por cadastrar lote novo
					$consultalote = new CadastroLote($lote);
					$consultalote->cadastrarLote();
		} else {
?>
<script>
	alert("Lote já cadastrado.");
</script>
<?php
	}
}
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
