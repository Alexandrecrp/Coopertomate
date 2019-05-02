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
											$stmt->bindParam(":id", $cliente->getId());
											$stmt->bindParam(':cliente', $cliente->getCliente());
											$stmt->bindParam(':cnpj', $cliente->getCnpj());
											$stmt->bindParam(':ie', $cliente->getIe());
											$stmt->bindParam(':endereco', $cliente->getEndereco());
											$stmt->bindParam(':numero', $cliente->getNumero());
											$stmt->bindParam(':bairro', $cliente->getBairro());
											$stmt->bindParam(':complemento', $cliente->getComplemento());
											$stmt->bindParam(':cidade', $cliente->getCidade());
											$stmt->bindParam(':estado', $cliente->getEstado());
											$stmt->bindParam(':cep', $cliente->getCep());
											$stmt->bindParam(':email', $cliente->getEmail());
											$stmt->bindParam(':telefone', $cliente->getTelefone());
											$stmt->bindParam(':latitude', $cliente->getLatitude());
											$stmt->bindParam(':longitude', $cliente->getLongitude());
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
