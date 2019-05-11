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
				'INSERT INTO produtor (idusuariocadastro, nome, cpf, endereco, numero, bairro, complemento, cidade,	estado,	cep, email, telefone)
				VALUES
				(:idusuariocadastro, :nome, :cpf, :endereco, :numero, :bairro, :complemento, :cidade,	:estado,	:cep,	:email, :telefone)');
				$stmt->bindValue(':idusuariocadastro', $produtor->getIdusuariocadastro(), PDO::PARAM_INT);
				$stmt->bindValue(':nome', $produtor->getNome(), PDO::PARAM_STR);
				$stmt->bindValue(':cpf', $produtor->getCpf(), PDO::PARAM_INT);
				$stmt->bindValue(':endereco', $produtor->getEndereco(), PDO::PARAM_STR);
				$stmt->bindValue(':numero', $produtor->getNumero(), PDO::PARAM_INT);
				$stmt->bindValue(':bairro', $produtor->getBairro(), PDO::PARAM_STR);
				$stmt->bindValue(':complemento', $produtor->getComplemento(), PDO::PARAM_STR);
				$stmt->bindValue(':cidade', $produtor->getCidade(), PDO::PARAM_STR);
				$stmt->bindValue(':estado', $produtor->getEstado(), PDO::PARAM_STR);
				$stmt->bindValue(':cep', $produtor->getCep(), PDO::PARAM_INT);
				$stmt->bindValue(':email', $produtor->getEmail(), PDO::PARAM_STR);
				$stmt->bindValue(':telefone', $produtor->getTelefone(), PDO::PARAM_INT);
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
