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
																'INSERT INTO lotevenda (idusuariocadastro, venda, cod_cliente, valornegociado)
																	VALUES
																	(:idusuariocadastro, :venda, :cod_cliente, :valornegociado)');
																	$stmt->bindValue(":idusuariocadastro", $lotevenda->getIdusuariocadastro(), PDO::PARAM_INT);
																	$stmt->bindValue(":venda", $lotevenda->getVenda(), PDO::PARAM_STR);
																	$stmt->bindValue(":cod_cliente", $lotevenda->getCod_cliente(), PDO::PARAM_INT);
																	$stmt->bindValue(":valornegociado", $lotevenda->getValornegociado());
																	$stmt->execute();
																	$this->conn->commit();
																	?>
																	<script>
																		alert("Cadastro de venda realizado com sucesso.");
																		//window.location.replace("listalotevenda.php")	;
																	</script>
																	<?php
																}
																catch(Exception $e) {
																	$this->conn->rollback();
																}
            			}
    }
