<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Lotevenda.php");
require_once("../../classes/control/LotevendaControl/ListaEditaLotevenda.php");
require_once("../../classes/control/LotevendaControl/AtualizaLotevenda.php");
require_once("../../classes/model/Lote.php");
require_once("../../classes/control/LoteControl/ListaEditaLote.php");
require_once("../../classes/control/LoteControl/ListaLoteExcetoSelecionado.php");
require_once("../../classes/model/Cliente.php");
require_once("../../classes/control/ClienteControl/ListaEditaCliente.php");
require_once("../../classes/control/ClienteControl/ListaClienteExcetoSelecionado.php");
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
						<li><a href="listalotevenda.php" class="colorwhite">Vendas de Lotes</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="?acao=sair"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
      <div class="container">
				<h3 class="page-header">Atualizar Venda de Lote</h3>
			<form method="post" class="form-signin-fluid" name="frmLogin">
				<?php
					$listalotevenda = new ListaEditarLotevenda;
					$resultado = $listalotevenda->getAll($_GET['idlotevenda']);
					foreach($resultado as $lotevenda) {
						?>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Código</label>
							<input type="text" name="idlotevenda" class="form-control" value="<?php echo $lotevenda->getId();?>" required readonly>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Venda</label>
							<input type="text" name="venda" class="form-control" value="<?php echo $lotevenda->getVenda();?>" required readonly>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-12">
							<label for="inputState">Lote</label>
							<select name="cod_lote" class="form-control" value="" required>
								<option>Selecione um lote...</option>
								<?php
									$listalote = new ListaEditarLote;
									$resultado = $listalote->getAll($lotevenda->getCod_lote());
									foreach($resultado as $loteselecionados) {
								?>
									<option value="<?=$loteselecionados->getId();?>" selected><?=$loteselecionados->getLote();?></option>
								<?php
								}
									$listaloteexcetoselecionado = new ListaLoteExcetoSelecionado;
									$resultadoexcetoselecionado = $listaloteexcetoselecionado->getAllExceto($loteselecionados->getId());
									foreach($resultadoexcetoselecionado as $loteexcetoselecionado) {
								?>
									<option value="<?=$loteexcetoselecionado->getId();?>"><?=$loteexcetoselecionado->getLote();?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-12">
							<label for="inputState">Cliente</label>
							<select name="cod_cliente" class="form-control" value="" required>
								<option>Selecione um cliente...</option>
								<?php
									$listacliente = new ListaEditaCliente;
									$resultado = $listacliente->getAll($lotevenda->getCod_cliente());
									foreach($resultado as $clienteselecionado) {
								?>
									<option value="<?=$clienteselecionado->getId();?>" selected><?=$clienteselecionado->getCliente();?></option>
								<?php
								}
									$listaclienteexcetoselecionado = new ListaClienteExcetoSelecionado;
									$resultadoexcetoselecionado = $listaclienteexcetoselecionado->getAllExceto($clienteselecionado->getId());
									foreach($resultadoexcetoselecionado as $clienteexcetoselecionado) {
								?>
									<option value="<?=$clienteexcetoselecionado->getId();?>"><?=$clienteexcetoselecionado->getCliente();?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Quantidade Vendido</label>
							<input type="text" name="qtdvendido" class="form-control" placeholder="48.1938" value="<?php echo $lotevenda->getQtdvendido();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Valor Negociado</label>
							<input type="text" name="valornegociado" class="form-control" placeholder="48.1938" value="<?php echo $lotevenda->getValornegociado();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit" value="Atualizar" class="btn btn-danger"/> <td><a href="listalotevenda.php"  class="btn btn-default">Voltar</a></td>
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
if (isset($_POST['btnSubmit'])) {
	//classe responsável por setar valores da entidade lotevenda
	$lotevenda = new Lotevenda();
	$lotevenda->setId($_POST['idlotevenda']);
	$lotevenda->setVenda($_POST['venda']);
	$lotevenda->setCod_lote($_POST['cod_lote']);
	$lotevenda->setCod_cliente($_POST['cod_cliente']);
	$lotevenda->setQtdvendido($_POST['qtdvendido']);
	$lotevenda->setValornegociado($_POST['valornegociado']);
		//classe responsável por cadastrar lote venda novo
		$atualizarlotevenda = new atualizaLotevenda($lotevenda);
		$atualizarlotevenda->atualizarLotevenda();
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
