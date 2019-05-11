<?php
require_once("../../classes/model/Produtor.php");

class atualizaProdutor {
    private $produtor;
    private $conn;

    public function __construct(Produtor $produtor) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->produtor = $produtor;
	   }

		function atualizarProdutor() {
			$this->conn->beginTransaction();
				try {
				  $produtor = $this->produtor;
					$stmt = $this->conn->prepare("UPDATE produtor SET
					nome=:nome, cpf=:cpf, endereco=:endereco, numero=:numero, bairro=:bairro, complemento=:complemento, cidade=:cidade,	estado=:estado,
						cep=:cep, email=:email, telefone=:telefone WHERE id=:id");
											$stmt->bindParam(":id", $produtor->getId(), PDO::PARAM_INT);
											$stmt->bindParam(":nome", $produtor->getNome(), PDO::PARAM_STR);
											$stmt->bindParam(":cpf", $produtor->getCpf(), PDO::PARAM_INT);
											$stmt->bindParam(":endereco", $produtor->getEndereco(), PDO::PARAM_STR);
											$stmt->bindParam(':numero', $produtor->getNumero(), PDO::PARAM_INT);
											$stmt->bindParam(':bairro', $produtor->getBairro(), PDO::PARAM_STR);
											$stmt->bindParam(':complemento', $produtor->getComplemento(), PDO::PARAM_STR);
											$stmt->bindParam(":cidade", $produtor->getCidade(), PDO::PARAM_STR);
											$stmt->bindParam(":estado", $produtor->getEstado(), PDO::PARAM_STR);
											$stmt->bindParam(":cep", $produtor->getCep(), PDO::PARAM_INT);
											$stmt->bindParam(":email", $produtor->getEmail(), PDO::PARAM_STR);
											$stmt->bindParam(":telefone", $produtor->getTelefone(), PDO::PARAM_INT);
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													window.location.replace("editarprodutor.php?idprodutor=<?php echo $produtor->getId();?>")	;
													alert("Cadastro de produtor realizado com sucesso, clique em OK para aceitar as modificações.");
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
?>
