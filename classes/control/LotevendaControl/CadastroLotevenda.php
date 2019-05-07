<?php
require_once("../../classes/model/Lotevenda.php");

class CadastroLotevenda {
    private $lotevenda;
    private $conn;

    public function __construct(Lotevenda $lotevenda) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->lotevenda = $lotevenda;
	   }

		function cadastrarLotevenda() {
			$this->conn->beginTransaction();
				try {
				  $lotevenda = $this->lotevenda;
					$stmt = $this->conn->prepare(
																'INSERT INTO lotevenda (idusuariocadastro, venda, cod_lote, cod_cliente, qtdvendido, valornegociado)
																	VALUES
																	(:idusuariocadastro, :venda, :cod_lote, :cod_cliente, :qtdvendido, :valornegociado)');
																	$stmt->bindParam(":idusuariocadastro", $lotevenda->getIdusuariocadastro());
																	$stmt->bindParam(":venda", $lotevenda->getVenda());
																	$stmt->bindParam(":cod_lote", $lotevenda->getCod_lote());
																	$stmt->bindParam(":cod_cliente", $lotevenda->getCod_cliente());
																	$stmt->bindParam(":qtdvendido", $lotevenda->getQtdvendido());
																	$stmt->bindParam(":valornegociado", $lotevenda->getValornegociado());
																	$stmt->execute();
																	$this->conn->commit();
																	?>
																	<script>
																		alert("Cadastro de venda realizado com sucesso.");
																		window.location.replace("listalotevenda.php")	;
																	</script>
																	<?php
																}
																catch(Exception $e) {
																	$this->conn->rollback();
																}
            			}
    }
