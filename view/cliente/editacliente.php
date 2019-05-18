<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Cliente.php");
require_once("../../classes/control/ClienteControl/AtualizaCliente.php");
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
						<li><a href="../../cadastro.php" class="colorwhite">Cadastro de Usuário</a></li>
						<li><a href="listaprodutor.php" class="colorwhite">Produtor</a></li>
						<li><a href="../fazenda/listafazenda.php" class="colorwhite">Fazendas</a></li>
						<li><a href="listacliente.php" class="colorwhite">Cadastro clientes</a></li>
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
				<h3 class="page-header">Atualizar Cliente</h3>
			<form method="post" class="form-signin-fluid" name="frmLogin">
				<?php
					$listacliente = new ListaCliente;
					$resultado = $listacliente->getAll();
					foreach($resultado as $cliente) {
						if($cliente->getId()==$_GET['idcliente']){
						?>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Código</label>
							<input type="text" name="idcliente" class="form-control" value="<?php echo $cliente->getId();?>" required readonly>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-6">
							<label for="inputPassword4">Cliente</label>
							<input type="text" name="cliente" class="form-control" placeholder="Cliente" value="<?php echo $cliente->getCliente();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputPassword4">CNPJ</label>
							<input type="text" name="cnpj" class="form-control" placeholder="00000000000000" value="<?php echo $cliente->getCnpj();?>" pattern="[0-9]+$" maxlength="14" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">IE</label>
							<input type="text" name="ie" class="form-control" placeholder="00000000" value="<?php echo $cliente->getIe();?>" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-8">
							<label for="inputAddress">Endreço</label>
							<input type="text" name="endereco" class="form-control" placeholder="Rodovia BR 050" value="<?php echo $cliente->getEndereco();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Número</label>
							<input type="text" name="numero" class="form-control" placeholder="0000" value="<?php echo $cliente->getNumero();?>" pattern="[0-9]+$" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Bairro</label>
							<input type="text" name="bairro" class="form-control" placeholder="Floresta" value="<?php echo $cliente->getBairro();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Complemento</label>
							<input type="text" name="complemento" class="form-control" placeholder="Apartamento" value="<?php echo $cliente->getComplemento();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputCity">Cidade</label>
							<input type="text" name="cidade" class="form-control" placeholder="Araguari" value="<?php echo $cliente->getCidade();?>" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Estado</label>
							<select name="estado" class="form-control" value="<?php echo $cliente->getEstado();?>" required>
								<option selected>Selecione um estado...</option>
								<option <?=($cliente->getEstado() == 'Acre')?'selected':''?>>Acre</option>
								<option <?=($cliente->getEstado() == 'Alagoas')?'selected':''?>>Alagoas</option>
								<option <?=($cliente->getEstado() == 'Amapá')?'selected':''?>>Amapá</option>
								<option <?=($cliente->getEstado() == 'Amazonas')?'selected':''?>>Amazonas</option>
								<option <?=($cliente->getEstado() == 'Bahia')?'selected':''?>>Bahia</option>
								<option <?=($cliente->getEstado() == 'Ceará')?'selected':''?>>Ceará</option>
								<option <?=($cliente->getEstado() == 'Distrito Federal')?'selected':''?>>Distrito Federal</option>
								<option <?=($cliente->getEstado() == 'Espírito Santo')?'selected':''?>>Espírito Santo</option>
								<option <?=($cliente->getEstado() == 'Goiás')?'selected':''?>>Goiás</option>
								<option <?=($cliente->getEstado() == 'Maranhão')?'selected':''?>>Maranhão</option>
								<option <?=($cliente->getEstado() == 'Mato Grosso')?'selected':''?>>Mato Grosso</option>
								<option <?=($cliente->getEstado() == 'Mato Grosso do Sul')?'selected':''?>>Mato Grosso do Sul</option>
								<option <?=($cliente->getEstado() == 'Minas Gerais')?'selected':''?>>Minas Gerais</option>
								<option <?=($cliente->getEstado() == 'Pará')?'selected':''?>>Pará</option>
								<option <?=($cliente->getEstado() == 'Paraíba')?'selected':''?>>Paraíba</option>
								<option <?=($cliente->getEstado() == 'Paraná')?'selected':''?>>Paraná</option>
								<option <?=($cliente->getEstado() == 'Pernambuco')?'selected':''?>>Pernambuco</option>
								<option <?=($cliente->getEstado() == 'Piauí')?'selected':''?>>Piauí</option>
								<option <?=($cliente->getEstado() == 'Rio de Janeiro')?'selected':''?>>Rio de Janeiro</option>
								<option <?=($cliente->getEstado() == 'Rio Grande do Norte')?'selected':''?>>Rio Grande do Norte</option>
								<option <?=($cliente->getEstado() == 'Rio Grande do Sul')?'selected':''?>>Rio Grande do Sul</option>
								<option <?=($cliente->getEstado() == 'Rondônia')?'selected':''?>>Rondônia</option>
								<option <?=($cliente->getEstado() == 'Roraima')?'selected':''?>>Roraima</option>
								<option <?=($cliente->getEstado() == 'Santa Catarina')?'selected':''?>>Santa Catarina</option>
								<option <?=($cliente->getEstado() == 'São Paulo')?'selected':''?>>São Paulo</option>
								<option <?=($cliente->getEstado() == 'Sergipe')?'selected':''?>>Sergipe</option>
								<option <?=($cliente->getEstado() == 'Tocantins')?'selected':''?>>Tocantins</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">CEP</label>
							<input type="text" name="cep" class="form-control" placeholder="38443020" value="<?php echo $cliente->getCep();?>" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Email</label>
							<input type="text" name="email" class="form-control" placeholder="a@email.com" value="<?php echo $cliente->getEmail();?>" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Telefone</label>
							<input type="text" name="telefone" class="form-control" placeholder="0000000000" value="<?php echo $cliente->getTelefone();?>" pattern="[0-9]+$" maxlength="11" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Latitude</label>
							<input type="text" name="latitude" class="form-control" placeholder="-18.646" value="<?php echo $cliente->getLatitude();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Longitude</label>
							<input type="text" name="longitude" class="form-control" placeholder="-48.1938" value="<?php echo $cliente->getLongitude();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit2" value="Atualizar" class="btn btn-danger"/> <td><a href="listacliente.php"  class="btn btn-default">Voltar</a></td>
						</div>
						<h3 class="page-header"></h3>
					</div>
				<?php }}?>
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
	//classe responsável por setar valores da entidade cliente
	$cliente = new Cliente();
	$cliente->setId($_POST['idcliente']);
	$cliente->setCliente($_POST['cliente']);
	$cliente->setCnpj(trim($_POST['cnpj']));
	$cliente->setIe($_POST['ie']);
	$cliente->setEndereco($_POST['endereco']);
	$cliente->setNumero($_POST['numero']);
	$cliente->setBairro($_POST['bairro']);
	$cliente->setComplemento($_POST['complemento']);
	$cliente->setCidade($_POST['cidade']);
	$cliente->setEstado($_POST['estado']);
	$cliente->setCep($_POST['cep']);
	$cliente->setEmail($_POST['email']);
	$cliente->setTelefone($_POST['telefone']);
	$cliente->setLatitude($_POST['latitude']);
	$cliente->setLongitude($_POST['longitude']);
	//classe responsável por atualizar cliente
		$consultacliente = new ListaCliente;
		$resultadoexcetoselecionado = $consultacliente->getAll();
		foreach($resultadoexcetoselecionado as $clienteexcetoselecionado) {
			if($clienteexcetoselecionado->getId()!=$_POST['idcliente']){
			if(($clienteexcetoselecionado->getCnpj())==($cliente->getCnpj())){
				$outroclientecommesmocodigo = 1;
			}
		}
	}
		if($outroclientecommesmocodigo==1){
			?>
			<script>
				alert("O sistema já possui um cliente cadastrado com esse CNPJ!");
				window.location.replace("editacliente.php?idcliente=<?php echo $cliente->getId();?>")
			</script>
			<?php
				} else {
		$atualizarcliente = new atualizaCliente($cliente);
		$atualizarcliente->atualizarCliente();
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
