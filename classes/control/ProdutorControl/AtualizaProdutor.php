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
											$stmt->bindParam(":id", $produtor->getId());
											$stmt->bindParam(":nome", $produtor->getNome());
											$stmt->bindParam(":cpf", $produtor->getCpf());
											$stmt->bindParam(":endereco", $produtor->getEndereco());
											$stmt->bindParam(':numero', $produtor->getNumero());
											$stmt->bindParam(':bairro', $produtor->getBairro());
											$stmt->bindParam(':complemento', $produtor->getComplemento());
											$stmt->bindParam(":cidade", $produtor->getCidade());
											$stmt->bindParam(":estado", $produtor->getEstado());
											$stmt->bindParam(":cep", $produtor->getCep());
											$stmt->bindParam(":email", $produtor->getEmail());
											$stmt->bindParam(":telefone", $produtor->getTelefone());
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
