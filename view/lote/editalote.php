<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Fazenda.php");
require_once("../../classes/control/FazendaControl/ListaEditaFazenda.php");
require_once("../../classes/control/FazendaControl/ListaFazendaExcetoSelecionada.php");
require_once("../../classes/model/Lote.php");
require_once("../../classes/control/LoteControl/ListaEditaLote.php");
require_once("../../classes/control/LoteControl/AtualizaLote.php");
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
						<li><a href="" class="colorwhite">Cadastro Lotes</a></li>
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
				<h3 class="page-header">Atualizar Lote</h3>
			<form method="post" class="form-signin-fluid" name="frmLogin">
				<?php
					$listalote = new ListaEditarLote;
					$resultado = $listalote->getAll($_GET['idlote']);
					foreach($resultado as $lote) {
						?>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Código</label>
							<input type="text" name="idlote" class="form-control" value="<?php echo $lote->getId();?>" required readonly>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Lote</label>
							<input type="text" name="lote" class="form-control" value="<?php echo $lote->getLote();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-12">
							<label for="inputState">Fazenda</label>
							<select name="cod_fazenda" class="form-control" value="" required>
								<option>Selecione uma fazenda...</option>
								<?php
									$listafazenda = new ListaEditarFazenda;
									$resultado = $listafazenda->getAll($lote->getCod_fazenda());
									foreach($resultado as $fazendaselecionada) {
								?>
									<option value="<?=$fazendaselecionada->getId();?>" selected><?=$fazendaselecionada->getFazenda();?></option>
								<?php
								}
									$listafazendaexcetoselecionado = new ListaFazendaExcetoSelecionada;
									$resultadoexcetoselecionado = $listafazendaexcetoselecionado->getAllExceto($fazendaselecionada->getId());
									foreach($resultadoexcetoselecionado as $fazendaexcetoselecionada) {
								?>
									<option value="<?=$fazendaexcetoselecionada->getId();?>"><?=$fazendaexcetoselecionada->getFazenda();?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Quantidade Inicial</label>
							<input type="text" name="qtdinicial" class="form-control" placeholder="18.646" value="<?php echo $lote->getQtdinicial();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Quantidade Vendida</label>
							<input type="text" name="qtdvendida" class="form-control" placeholder="48.1938" value="<?php echo $lote->getQtdvendida();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit2" value="Atualizar" class="btn btn-danger"/> <td><a href="listalote.php"  class="btn btn-default">Voltar</a></td>
						</div>
					</br>
						<h3 class="page-header"></h3>
					</div>
				<?php }?>
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
if (isset($_POST['btnSubmit2'])) {
	//classe responsável por setar valores da entidade lote
	$lote = new Lote();
	$lote->setId($_POST['idlote']);
	$lote->setLote($_POST['lote']);
	$lote->setCod_fazenda($_POST['cod_fazenda']);
	$lote->setQtdinicial($_POST['qtdinicial']);
	$lote->setQtdvendida($_POST['qtdvendida']);
	//classe responsável por atualizar lote
	$atualizarlote = new atualizaLote($lote);
	$atualizarlote->atualizarLote();
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
