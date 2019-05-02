<?php
require_once("../../classes/model/Produtor.php");

class CadastroProdutor {
    private $produtor;
    private $conn;

    public function __construct(Produtor $produtor) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->produtor = $produtor;
	   }

		function cadastrarProdutor() {
			$this->conn->beginTransaction();
				try {
				  $produtor = $this->produtor;
					$stmt = $this->conn->prepare(
						'INSERT INTO produtor (nome, cpf, endereco, numero, bairro, complemento, cidade,	estado,	cep, email, telefone)
																	VALUES
																	(:nome, :cpf, :endereco, :numero, :bairro, :complemento, :cidade,	:estado,	:cep,	:email, :telefone)');
											$stmt->bindValue(':nome', $produtor->getNome());
											$stmt->bindValue(':cpf', $produtor->getCpf());
											$stmt->bindValue(':endereco', $produtor->getEndereco());
											$stmt->bindValue(':numero', $produtor->getNumero());
											$stmt->bindValue(':bairro', $produtor->getBairro());
											$stmt->bindValue(':complemento', $produtor->getComplemento());
											$stmt->bindValue(':cidade', $produtor->getCidade());
											$stmt->bindValue(':estado', $produtor->getEstado());
											$stmt->bindValue(':cep', $produtor->getCep());
											$stmt->bindValue(':email', $produtor->getEmail());
											$stmt->bindValue(':telefone', $produtor->getTelefone());
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													alert("Cadastro de produtor realizado com sucesso.");
													window.location.replace("listaprodutor.php");
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
