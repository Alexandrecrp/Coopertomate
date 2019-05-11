<?php
require_once("../../classes/model/Cliente.php");

class CadastroCliente {
	private $cliente;
	private $conn;

	public function __construct(Cliente $cliente) {
		$registry = RegistroConexao::getInstancia();
		$this->conn = $registry->get('Connection');
		$this->cliente = $cliente;
	}

	function cadastrarCliente() {
		$this->conn->beginTransaction();
		try {
			$cliente = $this->cliente;
			$stmt = $this->conn->prepare(
				'INSERT INTO cliente (idusuariocadastro, cliente, cnpj, ie, endereco, numero, bairro, complemento, cidade, estado,	cep, email, telefone,	latitude,	longitude)
				VALUES
				(:idusuariocadastro, :cliente, :cnpj, :ie, :endereco, :numero, :bairro, :complemento, :cidade,	:estado,	:cep,	:email, :telefone, :latitude,	:longitude)');
				$stmt->bindValue(':idusuariocadastro', $cliente->getIdusuariocadastro(), PDO::PARAM_INT);
				$stmt->bindValue(':cliente', $cliente->getCliente(), PDO::PARAM_STR);
				$stmt->bindValue(':cnpj', $cliente->getCnpj(), PDO::PARAM_INT);
				$stmt->bindValue(':ie', $cliente->getIe(), PDO::PARAM_INT);
				$stmt->bindValue(':endereco', $cliente->getEndereco(), PDO::PARAM_STR);
				$stmt->bindValue(':numero', $cliente->getNumero(), PDO::PARAM_INT);
				$stmt->bindValue(':bairro', $cliente->getBairro(), PDO::PARAM_STR);
				$stmt->bindValue(':complemento', $cliente->getComplemento(), PDO::PARAM_STR);
				$stmt->bindValue(':cidade', $cliente->getCidade()), PDO::PARAM_STR;
				$stmt->bindValue(':estado', $cliente->getEstado(), PDO::PARAM_STR);
				$stmt->bindValue(':cep', $cliente->getCep(), PDO::PARAM_INT);
				$stmt->bindValue(':email', $cliente->getEmail(), PDO::PARAM_STR);
				$stmt->bindValue(':telefone', $cliente->getTelefone(), PDO::PARAM_INT);
				$stmt->bindValue(':latitude', $cliente->getLatitude());
				$stmt->bindValue(':longitude', $cliente->getLongitude());
				$stmt->execute();
				$this->conn->commit();
				?>
				<script>
				alert("Cadastro de cliente realizado com sucesso.");
				window.location.replace("listacliente.php");
				</script>
				<?php
			}
			catch(Exception $e) {
				$this->conn->rollback();
			}
		}
	}
