<?php
require_once("../../classes/model/Lotevenda.php");

class atualizaLotevenda {
    private $lotevenda;
    private $conn;

    public function __construct(Lotevenda $lotevenda) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->lotevenda = $lotevenda;
	   }

		function atualizarLotevenda() {
			$this->conn->beginTransaction();
				try {
				  $lotevenda = $this->lotevenda;
					$stmt = $this->conn->prepare("UPDATE lotevenda SET
					venda=:venda, cod_lote=:cod_lote, cod_cliente=:cod_cliente, qtdvendido=:qtdvendido,
					valornegociado=:valornegociado WHERE id=:id");
											$stmt->bindParam(":id", $lotevenda->getId());
											$stmt->bindParam(":venda", $lotevenda->getVenda());
											$stmt->bindParam(":cod_lote", $lotevenda->getCod_lote());
											$stmt->bindParam(":cod_cliente", $lotevenda->getCod_cliente());
											$stmt->bindParam(":qtdvendido", $lotevenda->getQtdvendido());
											$stmt->bindParam(":valornegociado", $lotevenda->getValornegociado());
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													alert("Atualização de venda realizada com sucesso, clique em OK para aceitar as modificações.");
													window.location.replace("editalotevenda.php?idlotevenda=<?php echo $lotevenda->getId();?>")	;
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
?>
