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
						'INSERT INTO cliente (cliente, cnpj, ie, endereco, numero, bairro, complemento, cidade, estado,	cep, email, telefone,	latitude,	longitude)
																	VALUES
																	(:cliente, :cnpj, :ie, :endereco, :numero, :bairro, :complemento, :cidade,	:estado,	:cep,	:email, :telefone, :latitude,	:longitude)');
											$stmt->bindValue(':cliente', $cliente->getCliente());
											$stmt->bindValue(':cnpj', $cliente->getCnpj());
											$stmt->bindValue(':ie', $cliente->getIe());
											$stmt->bindValue(':endereco', $cliente->getEndereco());
											$stmt->bindValue(':numero', $cliente->getNumero());
											$stmt->bindValue(':bairro', $cliente->getBairro());
											$stmt->bindValue(':complemento', $cliente->getComplemento());
											$stmt->bindValue(':cidade', $cliente->getCidade());
											$stmt->bindValue(':estado', $cliente->getEstado());
											$stmt->bindValue(':cep', $cliente->getCep());
											$stmt->bindValue(':email', $cliente->getEmail());
											$stmt->bindValue(':telefone', $cliente->getTelefone());
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
