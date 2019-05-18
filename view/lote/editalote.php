<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Fazenda.php");
require_once("../../classes/control/FazendaControl/ListaFazenda.php");
require_once("../../classes/model/Grupo.php");
require_once("../../classes/control/GrupoControl/ListaGrupo.php");
require_once("../../classes/model/Cores.php");
require_once("../../classes/control/CoresControl/ListaCores.php");
require_once("../../classes/model/Calibre.php");
require_once("../../classes/control/CalibreControl/ListaCalibre.php");
require_once("../../classes/model/Categoria.php");
require_once("../../classes/control/CategoriaControl/ListaCategoria.php");
require_once("../../classes/model/Lote.php");
require_once("../../classes/control/LoteControl/ListaLote.php");
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
						<li><a href="../fazenda/listafazenda.php" class="colorwhite">Fazendas</a></li>
						<li><a href="../cliente/listacliente.php" class="colorwhite">Cadastro clientes</a></li>
						<li><a href="listalote.php" class="colorwhite">Cadastro Lotes</a></li>
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
					$listalote = new ListaLote;
					$resultado = $listalote->getAll();
					foreach($resultado as $lote) {
						if($lote->getId()==$_GET['idlote']) {
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
									$listafazenda = new ListaFazenda;
									$resultado = $listafazenda->getAll();
									foreach($resultado as $fazendaselecionada) {
										if($fazendaselecionada->getId()==$lote->getCod_fazenda()) {
								?>
									<option value="<?=$fazendaselecionada->getId();?>" selected><?=$fazendaselecionada->getFazenda();?></option>
								<?php
									}
								}
								$listafazenda = new ListaFazenda;
								$resultado = $listafazenda->getAll();
								foreach($resultado as $fazendaexcetoselecionada) {
									if($fazendaexcetoselecionada->getId()!=$lote->getCod_fazenda()) {
								?>
									<option value="<?=$fazendaexcetoselecionada->getId();?>"><?=$fazendaexcetoselecionada->getFazenda();?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputState">Grupo</label>
							<select name="cod_grupo" class="form-control" value="" required>
								<option>Selecione uma grupo...</option>
								<?php
									$listagrupo = new ListaGrupo;
									$resultado = $listagrupo->getAll();
									foreach($resultado as $gruposelecionado) {
										if($gruposelecionado->getId()==$lote->getCod_grupo()) {
								?>
									<option value="<?=$gruposelecionado->getId();?>" selected><?=$gruposelecionado->getGrupo();?></option>
								<?php
									}
								}
									$listagrupoexcetoselecionado = new ListaGrupo;
									$resultadoexcetogruposelecionado = $listagrupoexcetoselecionado->getAll($gruposelecionado->getId());
									foreach($resultadoexcetogruposelecionado as $grupoexcetoselecionado) {
										if($grupoexcetoselecionado->getId()!=$lote->getCod_grupo()){
								?>
									<option value="<?=$grupoexcetoselecionado->getId();?>"><?=$grupoexcetoselecionado->getGrupo();?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Cores</label>
							<select name="cod_cores" class="form-control" value="" required>
								<option>Selecione uma cor...</option>
								<?php
									$listacores = new ListaCores;
									$resultado = $listacores->getAll();
									foreach($resultado as $coresselecionada) {
										if($coresselecionada->getId()==$lote->getCod_cores()) {
								?>
									<option value="<?=$coresselecionada->getId();?>" selected><?=$coresselecionada->getCores();?></option>
								<?php
									}
								}
									$listacoresexcetoselecionada = new ListaCores;
									$resultadocoresexcetoselecionada = $listacoresexcetoselecionada->getAll();
									foreach($resultadocoresexcetoselecionada as $coresexcetoselecionada) {
										if($coresexcetoselecionada->getId()!=$lote->getCod_cores()) {
								?>
									<option value="<?=$coresexcetoselecionada->getId();?>"><?=$coresexcetoselecionada->getCores();?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Calibre</label>
							<select name="cod_calibre" class="form-control" value="" required>
								<option>Selecione um calibre...</option>
								<?php
									$listacalibre = new ListaCalibre;
									$resultado = $listacalibre->getAll();
									foreach($resultado as $calibreselecionado) {
										if($calibreselecionado->getId()==$lote->getCod_calibre()) {
								?>
									<option value="<?=$calibreselecionado->getId();?>" selected><?=$calibreselecionado->getCalibre();?></option>
								<?php
									}
								}
									$listacalibreexcetoselecionado = new ListaCalibre;
									$resultadocalibreexcetoselecionado = $listacalibreexcetoselecionado->getAll();
									foreach($resultadocalibreexcetoselecionado as $calibreexcetoselecionado) {
										if($calibreexcetoselecionado->getId()!=$lote->getCod_calibre()) {
								?>
									<option value="<?=$calibreexcetoselecionado->getId();?>"><?=$calibreexcetoselecionado->getCalibre();?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Categoria</label>
							<select name="cod_categoria" class="form-control" value="" required>
								<option>Selecione uma categoria...</option>
								<?php
									$listacategoria = new ListaCategoria;
									$resultado = $listacategoria->getAll($lote->getCod_categoria());
									foreach($resultado as $categoriaselecionada) {
										if($categoriaselecionada->getId()==$lote->getCod_categoria()) {
								?>
									<option value="<?=$categoriaselecionada->getId();?>" selected><?=$categoriaselecionada->getCategoria();?></option>
								<?php
									}
								}
									$listacategoriaexcetoselecionada = new ListaCategoria;
									$resultadocategoriaexcetoselecionada = $listacategoriaexcetoselecionada->getAll();
									foreach($resultadocategoriaexcetoselecionada as $categoriaexcetoselecionada) {
										if($categoriaexcetoselecionada->getId()!=$lote->getCod_categoria()) {
								?>
									<option value="<?=$categoriaexcetoselecionada->getId();?>"><?=$categoriaexcetoselecionada->getCategoria();?></option>
								<?php
									}
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
	//classe responsável por setar valores da entidade lote
	$lote = new Lote();
	$lote->setId($_POST['idlote']);
	$lote->setLote(trim($_POST['lote']));
	$lote->setCod_fazenda($_POST['cod_fazenda']);
	$lote->setCod_grupo($_POST['cod_grupo']);
	$lote->setCod_cores($_POST['cod_cores']);
	$lote->setCod_calibre($_POST['cod_calibre']);
	$lote->setCod_categoria($_POST['cod_categoria']);
	$lote->setQtdinicial(trim($_POST['qtdinicial']));
	$lote->setQtdvendida(trim($_POST['qtdvendida']));
	//classe responsável por atualizar lote
		$consultalote = new ListaLote;
		$resultadoexcetoselecionado = $consultalote->getAll();
		foreach($resultadoexcetoselecionado as $loteexcetoselecionado) {
			if($loteexcetoselecionado->getId()!=(trim($_POST['idlote']))) {
			if($loteexcetoselecionado->getLote()==$lote->getLote()){
				$outrolotecommesmocodigo = 1;
			}
		}
	}
		if($outrolotecommesmocodigo==1){
			?>
			<script>
				alert("O sistema já possui um lote cadastrado com esse código! Por favor, preencher o campo LOTE com outro código.");
				window.location.replace("editalote.php?idlote=<?php echo $lote->getId();?>")
			</script>
			<?php
				} else {
					$atualizarlote = new atualizaLote($lote);
					$atualizarlote->atualizarLote();
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
