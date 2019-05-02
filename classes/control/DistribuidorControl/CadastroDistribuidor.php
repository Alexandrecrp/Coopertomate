<?php
require_once("../../classes/model/Distribuidor.php");

class CadastroDistribuidor {
    private $distribuidor;
    private $conn;

    public function __construct(Distribuidor $distribuidor) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->distribuidor = $distribuidor;
	   }

		function cadastrarDistribuidor() {
			$this->conn->beginTransaction();
				try {
				  $distribuidor = $this->distribuidor;
					$stmt = $this->conn->prepare(
						'INSERT INTO distribuidor (distribuidor, cnpj, ie, endereco, numero, bairro, complemento, cidade, estado,	cep, email, telefone,	latitude,	longitude)
																	VALUES
																	(:distribuidor, :cnpj, :ie, :endereco, :numero, :bairro, :complemento, :cidade,	:estado,	:cep,	:email, :telefone, :latitude,	:longitude)');
											$stmt->bindValue(':distribuidor', $distribuidor->getDistribuidor());
											$stmt->bindValue(':cnpj', $distribuidor->getCnpj());
											$stmt->bindValue(':ie', $distribuidor->getIe());
											$stmt->bindValue(':endereco', $distribuidor->getEndereco());
											$stmt->bindValue(':numero', $distribuidor->getNumero());
											$stmt->bindValue(':bairro', $distribuidor->getBairro());
											$stmt->bindValue(':complemento', $distribuidor->getComplemento());
											$stmt->bindValue(':cidade', $distribuidor->getCidade());
											$stmt->bindValue(':estado', $distribuidor->getEstado());
											$stmt->bindValue(':cep', $distribuidor->getCep());
											$stmt->bindValue(':email', $distribuidor->getEmail());
											$stmt->bindValue(':telefone', $distribuidor->getTelefone());
											$stmt->bindValue(':latitude', $distribuidor->getLatitude());
											$stmt->bindValue(':longitude', $distribuidor->getLongitude());
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													alert("Cadastro de Distribuidor realizado com sucesso.");
													window.location.replace("listadistribuidor.php");
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
