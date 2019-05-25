<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Lote.php");
require_once("../../classes/control/LoteControl/ListaLote.php");
require_once("../../classes/model/Cliente.php");
require_once("../../classes/control/ClienteControl/ListaCliente.php");
require_once("../../classes/model/Lotevenda.php");
require_once("../../classes/control/LotevendaControl/CadastroLotevenda.php");
require_once("../../classes/control/LotevendaControl/ListaLotevenda.php");
require_once("../../classes/model/Lotevendido.php");
require_once("../../classes/control/LotevendidoControl/RetornaIdlotevenda.php");
require_once("../../classes/control/LotevendidoControl/CadastroLotevendido.php");
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
			<script>
				function duplicarCampos(){
					var clone = document.getElementById('loteavendainicial').cloneNode(true);
					var destino = document.getElementById('loteavendademais');
					destino.appendChild (clone);
					var camposClonados = clone.getElementsByTagName('+');
					for(i=0; i<camposClonados.length;i++){
						camposClonados[i].value = '';
					}
				}
				function removerCampos(id){
					var node1 = document.getElementById('loteavendademais');
					node1.removeChild(node1.childNodes[0]);
				}
			</script>
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
						<li><a href="../fazenda/listafazenda.php" class="colorwhite">Fazendas</a></li>
						<li><a href="../cliente/listacliente.php" class="colorwhite">Cadastro clientes</a></li>
						<li><a href="../lote/listalote.php" class="colorwhite">Cadastro Lotes</a></li>
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
				<h3 class="page-header">Cadastro de Venda de Lote</h3>
				<form method="post" class="form-signin-fluid" name="frmLogin">
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Venda</label>
							<input type="text" name="venda" class="form-control" placeholder="Lote" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Valor da venda</label>
							<input type="text" name="valornegociado" class="form-control" placeholder="48.1" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-12">
							<label for="inputState">Cliente</label>
							<select name="cod_cliente" class="form-control" value="" required>
								<option selected>Selecione um cliente...</option>
								<?php
									$listacliente = new ListaCliente;
									$resultado = $listacliente->getAll();
									foreach($resultado as $cliente) {
								?>
									<option value="<?=($cliente->getId());?>"><?=($cliente->getCliente());?></option>
								<?php
							}
							?>
							</select>
							<h3 class="page-header"></h3>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-6">
							<a class="btn btn-danger" onclick="duplicarCampos();">Acrescentar lote(+)</a>	<a class="btn btn-default" onclick="removerCampos(this);">Remover lote(-)</a>
						</div>
					</div>
					<div id="loteavendainicial" class="form-row col-md-12">
						<div class="form-group col-md-6">
							<label for="inputState">Lote</label>
							<select name="cod_lote[]" class="form-control" value="" required>
								<option selected>Selecione um lote para venda...</option>
								<?php
									$listalote = new ListaLote;
									$resultado = $listalote->getAll();
									foreach($resultado as $lote) {
								?>
									<option value="<?=($lote->getId());?>"><?=($lote->getLote());?></option>
								<?php
							}
							?>
							</select>
							<h3 class="page-header"></h3>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Quantidade do lote vendido</label>
							<input type="text" name="qtdvendido[]" class="form-control" placeholder="200.10" pattern="([-0-9]+\.)[\d.]*" required>
							<h3 class="page-header"></h3>
						</div>
					</div>
					<div id="loteavendademais">
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit" value="Cadastrar" class="btn btn-danger"/> <td><a href="listalotevenda.php"  class="btn btn-default">Voltar</a></td>
						</div>
						<h3 class="page-header"></h3>
					</div>
				</form>
		</div>
		</br>
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
	//classe responsável por consultar se lote existe ou não
	$consultalotevenda = new ListaLotevenda();
	$resultado = $consultalotevenda->getAll();
	foreach($resultado as $consultalotevenda) {
				if($consultalotevenda->getVenda()==(trim($_POST['venda']))) {
						$temlotevenda = 1;
					}
				}
				if($temlotevenda!=1){
				//classe responsável por criar e setar lote venda
				$lotevenda = new Lotevenda();
				$lotevenda->setIdusuariocadastro($_SESSION['id']);
				$lotevenda->setVenda(trim($_POST['venda']));
				$lotevenda->setCod_cliente($_POST['cod_cliente']);
				$lotevenda->setValornegociado($_POST['valornegociado']);
				//classe responsável por cadastrar lote venda (ou seja, a venda)
				$consultalotevenda = new CadastroLotevenda($lotevenda);
				$consultalotevenda->cadastrarLotevenda();
					foreach(array_combine($_POST["cod_lote"], $_POST["qtdvendido"]) as $lote => $qtdvendido) {
						//classe responsável por consultar e retornar o id do lote venda (ou seja, da id venda)
						$retornaidlotevenda = new RetornaIdlotevenda();
						$variavelretornaidlotevenda = $retornaidlotevenda->RetornaIdlotevenda(trim($_POST['venda']));
						//classe responsável por setar dados do lote vendido
						$lotevendido = new Lotevendido();
						$lotevendido->setCod_venda($variavelretornaidlotevenda);
						$lotevendido->setCod_lote($lote);
						$lotevendido->setQtdvendido($qtdvendido);
						//classe responsável por cadastrar e referenciar a venda ao lote vendido
							$cadastrarlotevendido = new CadastroLotevendido($lotevendido);
							$cadastrarlotevendido->cadastrarLotevendido();
				 }
	} else {
	?>
		<script>
			alert("Venda já cadastrada.");
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
