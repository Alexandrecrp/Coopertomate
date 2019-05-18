<?php
require_once("../../classes/model/Lotevendido.php");

class CadastroLotevendido {
    private $lotevendido;
    private $conn;

    public function __construct(Lotevendido $lotevendido) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->lotevendido= $lotevendido;
	   }

		function cadastrarLotevendido() {
			$this->conn->beginTransaction();
				try {
				  $lotevendido = $this->lotevendido;
					$stmt = $this->conn->prepare(
																'INSERT INTO lotevendido (cod_venda, cod_lote, qtdvendido)
																	VALUES
																	(:cod_venda, :cod_lote, :qtdvendido)');
																	$stmt->bindValue(":cod_venda", $lotevendido->getCod_venda(), PDO::PARAM_STR);
																	$stmt->bindValue(":cod_lote", $lotevendido->getCod_lote(), PDO::PARAM_STR);
																	$stmt->bindValue(":qtdvendido", $lotevendido->getQtdvendido());
																	$stmt->execute();
																	$this->conn->commit();
																	?>
																	<script>
																		alert("Cadastro de lote vendido realizado com sucesso.");
																		window.location.replace("listalotevenda.php")	;
																	</script>
																	<?php
																}
																catch(Exception $e) {
																	$this->conn->rollback();
																}
            			}
    }
