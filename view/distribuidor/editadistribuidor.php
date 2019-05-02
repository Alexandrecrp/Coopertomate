<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Distribuidor.php");
require_once("../../classes/control/DistribuidorControl/ListaEditaDistribuidor.php");
require_once("../../classes/control/DistribuidorControl/AtualizaDistribuidor.php");
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
					<li><a href="listafazenda.php" class="colorwhite">Fazenda</a></li>
					<li><a href="listadistribuidor.php" class="colorwhite">Cadastro distribuidores</a></li>
					<li><a href="" class="colorwhite">Cadastro clientes</a></li>
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
				<h3 class="page-header">Atualizar Distribuidor</h3>
			<form method="post" class="form-signin-fluid" name="frmLogin">
				<?php
					$listadistribuidor = new ListaEditarDistribuidor;
					$resultado = $listadistribuidor->getAll($_GET['iddistribuidor']);
					foreach($resultado as $distribuidor) {
						?>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Código</label>
							<input type="text" name="iddistribuidor" class="form-control" value="<?php echo $distribuidor->getId();?>" required readonly>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-6">
							<label for="inputPassword4">Distribuidor</label>
							<input type="text" name="distribuidor" class="form-control" placeholder="Distribuidor" value="<?php echo $distribuidor->getDistribuidor();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputPassword4">CNPJ</label>
							<input type="text" name="cnpj" class="form-control" placeholder="00000000000000" value="<?php echo $distribuidor->getCnpj();?>" pattern="[0-9]+$" maxlength="14" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">IE</label>
							<input type="text" name="ie" class="form-control" placeholder="00000000" value="<?php echo $distribuidor->getIe();?>" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-8">
							<label for="inputAddress">Endreço</label>
							<input type="text" name="endereco" class="form-control" placeholder="Rodovia BR 050" value="<?php echo $distribuidor->getEndereco();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Número</label>
							<input type="text" name="numero" class="form-control" placeholder="0000" value="<?php echo $distribuidor->getNumero();?>" pattern="[0-9]+$" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Bairro</label>
							<input type="text" name="bairro" class="form-control" placeholder="Floresta" value="<?php echo $distribuidor->getBairro();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Complemento</label>
							<input type="text" name="complemento" class="form-control" placeholder="Apartamento" value="<?php echo $distribuidor->getComplemento();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputCity">Cidade</label>
							<input type="text" name="cidade" class="form-control" placeholder="Araguari" value="<?php echo $distribuidor->getCidade();?>" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Estado</label>
							<select name="estado" class="form-control" value="<?php echo $distribuidor->getEstado();?>" required>
								<option selected>Selecione um estado...</option>
								<option <?=($distribuidor->getEstado() == 'Acre')?'selected':''?>>Acre</option>
								<option <?=($distribuidor->getEstado() == 'Alagoas')?'selected':''?>>Alagoas</option>
								<option <?=($distribuidor->getEstado() == 'Amapá')?'selected':''?>>Amapá</option>
								<option <?=($distribuidor->getEstado() == 'Amazonas')?'selected':''?>>Amazonas</option>
								<option <?=($distribuidor->getEstado() == 'Bahia')?'selected':''?>>Bahia</option>
								<option <?=($distribuidor->getEstado() == 'Ceará')?'selected':''?>>Ceará</option>
								<option <?=($distribuidor->getEstado() == 'Distrito Federal')?'selected':''?>>Distrito Federal</option>
								<option <?=($distribuidor->getEstado() == 'Espírito Santo')?'selected':''?>>Espírito Santo</option>
								<option <?=($distribuidor->getEstado() == 'Goiás')?'selected':''?>>Goiás</option>
								<option <?=($distribuidor->getEstado() == 'Maranhão')?'selected':''?>>Maranhão</option>
								<option <?=($distribuidor->getEstado() == 'Mato Grosso')?'selected':''?>>Mato Grosso</option>
								<option <?=($distribuidor->getEstado() == 'Mato Grosso do Sul')?'selected':''?>>Mato Grosso do Sul</option>
								<option <?=($distribuidor->getEstado() == 'Minas Gerais')?'selected':''?>>Minas Gerais</option>
								<option <?=($distribuidor->getEstado() == 'Pará')?'selected':''?>>Pará</option>
								<option <?=($distribuidor->getEstado() == 'Paraíba')?'selected':''?>>Paraíba</option>
								<option <?=($distribuidor->getEstado() == 'Paraná')?'selected':''?>>Paraná</option>
								<option <?=($distribuidor->getEstado() == 'Pernambuco')?'selected':''?>>Pernambuco</option>
								<option <?=($distribuidor->getEstado() == 'Piauí')?'selected':''?>>Piauí</option>
								<option <?=($distribuidor->getEstado() == 'Rio de Janeiro')?'selected':''?>>Rio de Janeiro</option>
								<option <?=($distribuidor->getEstado() == 'Rio Grande do Norte')?'selected':''?>>Rio Grande do Norte</option>
								<option <?=($distribuidor->getEstado() == 'Rio Grande do Sul')?'selected':''?>>Rio Grande do Sul</option>
								<option <?=($distribuidor->getEstado() == 'Rondônia')?'selected':''?>>Rondônia</option>
								<option <?=($distribuidor->getEstado() == 'Roraima')?'selected':''?>>Roraima</option>
								<option <?=($distribuidor->getEstado() == 'Santa Catarina')?'selected':''?>>Santa Catarina</option>
								<option <?=($distribuidor->getEstado() == 'São Paulo')?'selected':''?>>São Paulo</option>
								<option <?=($distribuidor->getEstado() == 'Sergipe')?'selected':''?>>Sergipe</option>
								<option <?=($distribuidor->getEstado() == 'Tocantins')?'selected':''?>>Tocantins</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">CEP</label>
							<input type="text" name="cep" class="form-control" placeholder="38443020" value="<?php echo $distribuidor->getCep();?>" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Email</label>
							<input type="text" name="email" class="form-control" placeholder="a@email.com" value="<?php echo $distribuidor->getEmail();?>" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Telefone</label>
							<input type="text" name="telefone" class="form-control" placeholder="0000000000" value="<?php echo $distribuidor->getTelefone();?>" pattern="[0-9]+$" maxlength="11" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Latitude</label>
							<input type="text" name="latitude" class="form-control" placeholder="-18.646" value="<?php echo $distribuidor->getLatitude();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Longitude</label>
							<input type="text" name="longitude" class="form-control" placeholder="-48.1938" value="<?php echo $distribuidor->getLongitude();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit2" value="Atualizar" class="btn btn-danger"/> <td><a href="listadistribuidor.php"  class="btn btn-default">Voltar</a></td>
						</div>
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
	//classe responsável por setar valores da entidade distribuidor
	$distribuidor = new Distribuidor();
	$distribuidor->setId($_POST['iddistribuidor']);
	$distribuidor->setDistribuidor($_POST['distribuidor']);
	$distribuidor->setCnpj($_POST['cnpj']);
	$distribuidor->setIe($_POST['ie']);
	$distribuidor->setEndereco($_POST['endereco']);
	$distribuidor->setNumero($_POST['numero']);
	$distribuidor->setBairro($_POST['bairro']);
	$distribuidor->setComplemento($_POST['complemento']);
	$distribuidor->setCidade($_POST['cidade']);
	$distribuidor->setEstado($_POST['estado']);
	$distribuidor->setCep($_POST['cep']);
	$distribuidor->setEmail($_POST['email']);
	$distribuidor->setTelefone($_POST['telefone']);
	$distribuidor->setLatitude($_POST['latitude']);
	$distribuidor->setLongitude($_POST['longitude']);
	//classe responsável por atualizar distribuidor
	$atualizardistribuidor = new atualizaDistribuidor($distribuidor);
	$atualizardistribuidor->atualizarDistribuidor();
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
