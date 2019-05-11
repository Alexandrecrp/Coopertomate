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
											$stmt->bindValue(":id", $lote->getId(), PDO::PARAM_INT);
											$stmt->bindValue(":lote", $lote->getLote(), PDO::PARAM_STR);
											$stmt->bindValue(":cod_fazenda", $lote->getCod_fazenda(), PDO::PARAM_INT);
											$stmt->bindValue(":cod_grupo", $lote->getCod_grupo(), PDO::PARAM_INT);
											$stmt->bindValue(":cod_cores", $lote->getCod_cores(), PDO::PARAM_INT);
											$stmt->bindValue(":cod_calibre", $lote->getCod_calibre(), PDO::PARAM_INT);
											$stmt->bindValue(":cod_categoria", $lote->getCod_categoria(), PDO::PARAM_INT);
											$stmt->bindValue(":qtdinicial", $lote->getQtdinicial());
											$stmt->bindValue(":qtdvendida", $lote->getQtdvendida());
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
