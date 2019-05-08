<?php
require_once("../../classes/model/Lote.php");

class atualizaLote {
    private $lote;
    private $conn;

    public function __construct(Lote $lote) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->lote = $lote;
	   }

		function atualizarLote() {
			$this->conn->beginTransaction();
				try {
				  $lote = $this->lote;
					$stmt = $this->conn->prepare("UPDATE lote SET
					lote=:lote, cod_fazenda=:cod_fazenda, cod_grupo=:cod_grupo, cod_cores=:cod_cores, cod_calibre=:cod_calibre, cod_categoria=:cod_categoria, qtdinicial=:qtdinicial, qtdvendida=:qtdvendida WHERE id=:id");
											$stmt->bindParam(":id", $lote->getId());
											$stmt->bindParam(":lote", $lote->getLote());
											$stmt->bindParam(":cod_fazenda", $lote->getCod_fazenda());
											$stmt->bindParam(":cod_grupo", $lote->getCod_grupo());
											$stmt->bindParam(":cod_cores", $lote->getCod_cores());
											$stmt->bindParam(":cod_calibre", $lote->getCod_calibre());
											$stmt->bindParam(":cod_categoria", $lote->getCod_categoria());
											$stmt->bindParam(":qtdinicial", $lote->getQtdinicial());
											$stmt->bindParam(":qtdvendida", $lote->getQtdvendida());
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													alert("Atualização de lote realizada com sucesso, clique em OK para aceitar as modificações.");
													window.location.replace("editalote.php?idlote=<?php echo $lote->getId();?>")	;
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
?>
