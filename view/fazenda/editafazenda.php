<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Produtor.php");
require_once("../../classes/control/ProdutorControl/ListaEditaProdutor.php");
require_once("../../classes/control/ProdutorControl/ListaProdutorExcetoSelecionado.php");
require_once("../../classes/model/Fazenda.php");
require_once("../../classes/control/FazendaControl/ListaEditafazenda.php");
require_once("../../classes/control/FazendaControl/Atualizafazenda.php");
require_once("../../classes/control/FazendaControl/ListaFazendaExcetoSelecionada.php");
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
				<h3 class="page-header">Atualizar Fazenda</h3>
			<form method="post" class="form-signin-fluid" name="frmLogin">
				<?php
					$listafazenda = new ListaEditarFazenda;
					$resultado = $listafazenda->getAll($_GET['idfazenda']);
					foreach($resultado as $fazenda) {
						?>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Código</label>
							<input type="text" name="idfazenda" class="form-control" value="<?php echo $fazenda->getId();?>" required readonly>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-12">
							<label for="inputState">Produtor</label>
							<select name="produtor" class="form-control" value="" required>
								<option>Selecione um produtor...</option>
								<?php
									$listaprodutor = new ListaEditarProdutor;
									$resultado = $listaprodutor->getAll($fazenda->getProdutor());
									foreach($resultado as $produtorselecionado) {
								?>
									<option value="<?=$produtorselecionado->getId();?>" selected><?=$produtorselecionado->getNome();?></option>
								<?php
								}
									$listaprodutorexcetoselecionado = new ListaProdutorExcetoSelecionado;
									$resultadoexcetoselecionado = $listaprodutorexcetoselecionado->getAllExceto($produtorselecionado->getId());
									foreach($resultadoexcetoselecionado as $produtorexcetoselecionado) {
								?>
									<option value="<?=$produtorexcetoselecionado->getId();?>"><?=$produtorexcetoselecionado->getNome();?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-6">
							<label for="inputPassword4">Fazenda</label>
							<input type="text" name="fazenda" class="form-control" placeholder="Fazenda" value="<?php echo $fazenda->getFazenda();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputPassword4">IE</label>
							<input type="text" name="ie" class="form-control" placeholder="00000000" value="<?php echo $fazenda->getIe();?>" pattern="[0-9]+$" maxlength="8" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">CNPJ</label>
							<input type="text" name="cnpj" class="form-control" placeholder="00000000000000" value="<?php echo $fazenda->getCnpj();?>" pattern="[0-9]+$" maxlength="14" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">CGC/MAPA</label>
							<input type="text" name="cgc" class="form-control" placeholder="MG1234567" value="<?php echo $fazenda->getCgc();?>" pattern="[A-Za-z]{2}[0-9]{7}"maxlength="9" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-8">
							<label for="inputAddress">Endreço</label>
							<input type="text" name="endereco" class="form-control" placeholder="Rodovia BR 050" value="<?php echo $fazenda->getEndereco();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Cidade</label>
							<input type="text" name="cidade" class="form-control" placeholder="Araguari" value="<?php echo $fazenda->getCidade();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">CCIR</label>
							<input type="text" name="ccir" class="form-control" placeholder="0000000000000" value="<?php echo $fazenda->getCcir();?>" pattern="[0-9]+$" maxlength="14" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputState">Estado</label>
							<select name="estado" class="form-control" value="<?php echo $fazenda->getEstado();?>" required>
								<option selected>Selecione um estado...</option>
								<option <?=($fazenda->getEstado() == 'Acre')?'selected':''?>>Acre</option>
								<option <?=($fazenda->getEstado() == 'Alagoas')?'selected':''?>>Alagoas</option>
								<option <?=($fazenda->getEstado() == 'Amapá')?'selected':''?>>Amapá</option>
								<option <?=($fazenda->getEstado() == 'Amazonas')?'selected':''?>>Amazonas</option>
								<option <?=($fazenda->getEstado() == 'Bahia')?'selected':''?>>Bahia</option>
								<option <?=($fazenda->getEstado() == 'Ceará')?'selected':''?>>Ceará</option>
								<option <?=($fazenda->getEstado() == 'Distrito Federal')?'selected':''?>>Distrito Federal</option>
								<option <?=($fazenda->getEstado() == 'Espírito Santo')?'selected':''?>>Espírito Santo</option>
								<option <?=($fazenda->getEstado() == 'Goiás')?'selected':''?>>Goiás</option>
								<option <?=($fazenda->getEstado() == 'Maranhão')?'selected':''?>>Maranhão</option>
								<option <?=($fazenda->getEstado() == 'Mato Grosso')?'selected':''?>>Mato Grosso</option>
								<option <?=($fazenda->getEstado() == 'Mato Grosso do Sul')?'selected':''?>>Mato Grosso do Sul</option>
								<option <?=($fazenda->getEstado() == 'Minas Gerais')?'selected':''?>>Minas Gerais</option>
								<option <?=($fazenda->getEstado() == 'Pará')?'selected':''?>>Pará</option>
								<option <?=($fazenda->getEstado() == 'Paraíba')?'selected':''?>>Paraíba</option>
								<option <?=($fazenda->getEstado() == 'Paraná')?'selected':''?>>Paraná</option>
								<option <?=($fazenda->getEstado() == 'Pernambuco')?'selected':''?>>Pernambuco</option>
								<option <?=($fazenda->getEstado() == 'Piauí')?'selected':''?>>Piauí</option>
								<option <?=($fazenda->getEstado() == 'Rio de Janeiro')?'selected':''?>>Rio de Janeiro</option>
								<option <?=($fazenda->getEstado() == 'Rio Grande do Norte')?'selected':''?>>Rio Grande do Norte</option>
								<option <?=($fazenda->getEstado() == 'Rio Grande do Sul')?'selected':''?>>Rio Grande do Sul</option>
								<option <?=($fazenda->getEstado() == 'Rondônia')?'selected':''?>>Rondônia</option>
								<option <?=($fazenda->getEstado() == 'Roraima')?'selected':''?>>Roraima</option>
								<option <?=($fazenda->getEstado() == 'Santa Catarina')?'selected':''?>>Santa Catarina</option>
								<option <?=($fazenda->getEstado() == 'São Paulo')?'selected':''?>>São Paulo</option>
								<option <?=($fazenda->getEstado() == 'Sergipe')?'selected':''?>>Sergipe</option>
								<option <?=($fazenda->getEstado() == 'Tocantins')?'selected':''?>>Tocantins</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">CEP</label>
							<input type="text" name="cep" class="form-control" placeholder="38443020" value="<?php echo $fazenda->getCep();?>" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Email</label>
							<input type="text" name="email" class="form-control" placeholder="a@email.com" value="<?php echo $fazenda->getEmail();?>" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Telefone</label>
							<input type="text" name="telefone" class="form-control" placeholder="0000000000" value="<?php echo $fazenda->getTelefone();?>" pattern="[0-9]+$" maxlength="11" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Latitude</label>
							<input type="text" name="latitude" class="form-control" placeholder="-18.646" value="<?php echo $fazenda->getLatitude();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Longitude</label>
							<input type="text" name="longitude" class="form-control" placeholder="-48.1938" value="<?php echo $fazenda->getLongitude();?>" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit2" value="Atualizar" class="btn btn-danger"/> <td><a href="listafazenda.php"  class="btn btn-default">Voltar</a></td>
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
	//classe responsável por setar valores da entidade fazenda
	$fazenda = new Fazenda();
	$fazenda->setId($_POST['idfazenda']);
	$fazenda->setProdutor($_POST['produtor']);
	$fazenda->setFazenda($_POST['fazenda']);
	$fazenda->setIe($_POST['ie']);
	$fazenda->setCnpj($_POST['cnpj']);
	$fazenda->setCgc($_POST['cgc']);
	$fazenda->setEndereco($_POST['endereco']);
	$fazenda->setCidade($_POST['cidade']);
	$fazenda->setCcir($_POST['ccir']);
	$fazenda->setEstado($_POST['estado']);
	$fazenda->setCep($_POST['cep']);
	$fazenda->setEmail($_POST['email']);
	$fazenda->setTelefone($_POST['telefone']);
	$fazenda->setLatitude($_POST['latitude']);
	$fazenda->setLongitude($_POST['longitude']);
	//classe responsável por atualizar fazenda
		$consultafazenda = new ListaFazendaExcetoSelecionada;
		$resultadoexcetoselecionado = $consultafazenda->getAllExceto(trim($_POST['idfazenda']));
		foreach($resultadoexcetoselecionado as $fazendaexcetoselecionada) {
			if(($fazendaexcetoselecionada->getCnpj())==($fazenda->getCnpj())){
				$outrolotecommesmocodigo = 1;
			}
		}
		if($outrolotecommesmocodigo==1){
			?>
			<script>
				alert("O sistema já possui uma fazenda cadastrada com esse CNPJ!");
				window.location.replace("editafazenda.php?idfazenda=<?php echo $fazenda->getId();?>")
			</script>
			<?php
				} else {
		$atualizarfazenda = new atualizaFazenda($fazenda);
		$atualizarfazenda->atualizarFazenda();
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
