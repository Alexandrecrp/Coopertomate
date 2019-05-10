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
																	$stmt->bindParam(":idusuariocadastro", $lote->getIdusuariocadastro());
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
