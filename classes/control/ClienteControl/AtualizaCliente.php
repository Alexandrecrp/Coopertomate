<?php
require_once("../../classes/model/Cliente.php");

class atualizaCliente {
    private $cliente;
    private $conn;

    public function __construct(Cliente $cliente) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->cliente = $cliente;
	   }

		function atualizarCliente() {
			$this->conn->beginTransaction();
				try {
				  $cliente = $this->cliente;
					$stmt = $this->conn->prepare("UPDATE cliente SET
						cliente=:cliente, cnpj=:cnpj, ie=:ie, endereco=:endereco, numero=:numero, bairro=:bairro,
						complemento=:complemento, cidade=:cidade,	estado=:estado,	cep=:cep,
						email=:email, telefone=:telefone, latitude=:latitude, longitude=:longitude WHERE id=:id");
											$stmt->bindValue(":id", $cliente->getId());
											$stmt->bindValue(':cliente', $cliente->getCliente(), PDO::PARAM_STR);
											$stmt->bindValue(':cnpj', $cliente->getCnpj(), PDO::PARAM_INT);
											$stmt->bindValue(':ie', $cliente->getIe(), PDO::PARAM_INT);
											$stmt->bindValue(':endereco', $cliente->getEndereco(), PDO::PARAM_STR);
											$stmt->bindValue(':numero', $cliente->getNumero(), PDO::PARAM_INT);
											$stmt->bindValue(':bairro', $cliente->getBairro(), PDO::PARAM_STR);
											$stmt->bindValue(':complemento', $cliente->getComplemento(), PDO::PARAM_STR);
											$stmt->bindValue(':cidade', $cliente->getCidade(), PDO::PARAM_STR);
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
													alert("Atualização de cliente realizada com sucesso, clique em OK para aceitar as modificações.");
													window.location.replace("editacliente.php?idcliente=<?php echo $cliente->getId();?>")	;
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
?>
