<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Produtor.php");
require_once("../../classes/control/ProdutorControl/ListaEditaProdutor.php");
require_once("../../classes/control/ProdutorControl/AtualizaProdutor.php");
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
				<h3 class="page-header">Atualizar Produtor</h3>
			<form method="post" class="form-signin-fluid" name="frmLogin">
				<?php
					$listaprodutor = new ListaEditarProdutor;
					$resultado = $listaprodutor->getAll($_GET['idprodutor']);
					foreach($resultado as $produtor) {
						?>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputEmail4">Código</label>
							<input type="text" name="idprodutor" class="form-control" placeholder="Nome" value="<?php echo $produtor->getId();?>" required readonly>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Nome</label>
							<input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $produtor->getNome();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputPassword4">CPF</label>
							<input type="text" name="cpf" class="form-control" placeholder="00000000000" value="<?php echo $produtor->getCpf();?>" pattern="[0-9]+$" oninvalid="setCustomValidity('Somente números')" maxlength="11" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-4">
							<label for="inputAddress">Endreço</label>
							<input type="text" name="endereco" class="form-control" placeholder="Rodovia BR 050" value="<?php echo $produtor->getEndereco();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Número</label>
							<input type="text" name="numero" class="form-control" placeholder="0000" value="<?php echo $produtor->getNumero();?>" pattern="[0-9]+$" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Bairro</label>
							<input type="text" name="bairro" class="form-control" placeholder="Floresta" value="<?php echo $produtor->getBairro();?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Complemento</label>
							<input type="text" name="complemento" class="form-control" placeholder="Apartamento" value="<?php echo $produtor->getComplemento();?>" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputCity">Cidade</label>
							<input type="text" name="cidade" class="form-control" placeholder="Araguari" value="<?php echo $produtor->getCidade();?>" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Estado</label>
							<select name="estado" class="form-control" value="<?php echo $produtor->getEstado();?>" required>
								<option selected>Selecione um estado...</option>
								<option <?=($produtor->getEstado() == 'Acre')?'selected':''?>>Acre</option>
								<option <?=($produtor->getEstado() == 'Alagoas')?'selected':''?>>Alagoas</option>
								<option <?=($produtor->getEstado() == 'Amapá')?'selected':''?>>Amapá</option>
								<option <?=($produtor->getEstado() == 'Amazonas')?'selected':''?>>Amazonas</option>
								<option <?=($produtor->getEstado() == 'Bahia')?'selected':''?>>Bahia</option>
								<option <?=($produtor->getEstado() == 'Ceará')?'selected':''?>>Ceará</option>
								<option <?=($produtor->getEstado() == 'Distrito Federal')?'selected':''?>>Distrito Federal</option>
								<option <?=($produtor->getEstado() == 'Espírito Santo')?'selected':''?>>Espírito Santo</option>
								<option <?=($produtor->getEstado() == 'Goiás')?'selected':''?>>Goiás</option>
								<option <?=($produtor->getEstado() == 'Maranhão')?'selected':''?>>Maranhão</option>
								<option <?=($produtor->getEstado() == 'Mato Grosso')?'selected':''?>>Mato Grosso</option>
								<option <?=($produtor->getEstado() == 'Mato Grosso do Sul')?'selected':''?>>Mato Grosso do Sul</option>
								<option <?=($produtor->getEstado() == 'Minas Gerais')?'selected':''?>>Minas Gerais</option>
								<option <?=($produtor->getEstado() == 'Pará')?'selected':''?>>Pará</option>
								<option <?=($produtor->getEstado() == 'Paraíba')?'selected':''?>>Paraíba</option>
								<option <?=($produtor->getEstado() == 'Paraná')?'selected':''?>>Paraná</option>
								<option <?=($produtor->getEstado() == 'Pernambuco')?'selected':''?>>Pernambuco</option>
								<option <?=($produtor->getEstado() == 'Piauí')?'selected':''?>>Piauí</option>
								<option <?=($produtor->getEstado() == 'Rio de Janeiro')?'selected':''?>>Rio de Janeiro</option>
								<option <?=($produtor->getEstado() == 'Rio Grande do Norte')?'selected':''?>>Rio Grande do Norte</option>
								<option <?=($produtor->getEstado() == 'Rio Grande do Sul')?'selected':''?>>Rio Grande do Sul</option>
								<option <?=($produtor->getEstado() == 'Rondônia')?'selected':''?>>Rondônia</option>
								<option <?=($produtor->getEstado() == 'Roraima')?'selected':''?>>Roraima</option>
								<option <?=($produtor->getEstado() == 'Santa Catarina')?'selected':''?>>Santa Catarina</option>
								<option <?=($produtor->getEstado() == 'São Paulo')?'selected':''?>>São Paulo</option>
								<option <?=($produtor->getEstado() == 'Sergipe')?'selected':''?>>Sergipe</option>
								<option <?=($produtor->getEstado() == 'Tocantins')?'selected':''?>>Tocantins</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">CEP</label>
							<input type="text" name="cep" class="form-control" placeholder="38443020" value="<?php echo $produtor->getCep();?>" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Email</label>
							<input type="text" name="email" class="form-control" placeholder="aa@email.com" value="<?php echo $produtor->getEmail();?>" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Telefone</label>
							<input type="text" name="telefone" class="form-control" placeholder="(00)0000-0000" value="<?php echo $produtor->getTelefone();?>" pattern="[0-9]+$" maxlength="11" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit2" value="Atualizar" class="btn btn-danger"/> <td><a href="listaprodutor.php"  class="btn btn-default">Voltar</a></td>
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
	//classe responsável por setar valores da entidade produtor
	$produtor = new Produtor();
	$produtor->setId($_POST['idprodutor']);
	$produtor->setNome($_POST['nome']);
	$produtor->setCpf($_POST['cpf']);
	$produtor->setEndereco($_POST['endereco']);
	$produtor->setNumero($_POST['numero']);
	$produtor->setBairro($_POST['bairro']);
	$produtor->setComplemento($_POST['complemento']);
	$produtor->setCidade($_POST['cidade']);
	$produtor->setEstado($_POST['estado']);
	$produtor->setCep($_POST['cep']);
	$produtor->setEmail($_POST['email']);
	$produtor->setTelefone($_POST['telefone']);
	//classe responsável por atualizar produtor
	$atualizarprodutor = new atualizaProdutor($produtor);
	$atualizarprodutor->atualizarProdutor();
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
