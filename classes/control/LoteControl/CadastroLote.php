<?php
require_once("../../classes/model/Lote.php");

class CadastroLote {
    private $lote;
    private $conn;

    public function __construct(Lote $lote) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->lote = $lote;
	   }

		function cadastrarLote() {
			$this->conn->beginTransaction();
				try {
				  $lote = $this->lote;
					$stmt = $this->conn->prepare(
																'INSERT INTO lote (idusuariocadastro, lote, cod_fazenda, cod_grupo, cod_cores, cod_calibre, cod_categoria, qtdinicial, qtdvendida)
																	VALUES
																	(:idusuariocadastro, :lote, :cod_fazenda, :cod_grupo, :cod_cores, :cod_calibre, :cod_categoria, :qtdinicial, :qtdvendida)');
																	$stmt->bindValue(":idusuariocadastro", $lote->getIdusuariocadastro(), PDO::PARAM_INT);
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
													alert("Cadastro de Lote realizado com sucesso.");
													window.location.replace("listalote.php");
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
