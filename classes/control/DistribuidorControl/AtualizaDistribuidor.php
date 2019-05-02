<?php
require_once("../../classes/model/Distribuidor.php");

class atualizaDistribuidor {
    private $distribuidor;
    private $conn;

    public function __construct(Distribuidor $distribuidor) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->distribuidor = $distribuidor;
	   }

		function atualizarDistribuidor() {
			$this->conn->beginTransaction();
				try {
				  $distribuidor = $this->distribuidor;
					$stmt = $this->conn->prepare("UPDATE distribuidor SET
						distribuidor=:distribuidor, cnpj=:cnpj, ie=:ie, endereco=:endereco, numero=:numero, bairro=:bairro,
						complemento=:complemento, cidade=:cidade,	estado=:estado,	cep=:cep,
						email=:email, telefone=:telefone, latitude=:latitude, longitude=:longitude WHERE id=:id");
											$stmt->bindParam(":id", $distribuidor->getId());
											$stmt->bindParam(':distribuidor', $distribuidor->getDistribuidor());
											$stmt->bindParam(':cnpj', $distribuidor->getCnpj());
											$stmt->bindParam(':ie', $distribuidor->getIe());
											$stmt->bindParam(':endereco', $distribuidor->getEndereco());
											$stmt->bindParam(':numero', $distribuidor->getNumero());
											$stmt->bindParam(':bairro', $distribuidor->getBairro());
											$stmt->bindParam(':complemento', $distribuidor->getComplemento());
											$stmt->bindParam(':cidade', $distribuidor->getCidade());
											$stmt->bindParam(':estado', $distribuidor->getEstado());
											$stmt->bindParam(':cep', $distribuidor->getCep());
											$stmt->bindParam(':email', $distribuidor->getEmail());
											$stmt->bindParam(':telefone', $distribuidor->getTelefone());
											$stmt->bindParam(':latitude', $distribuidor->getLatitude());
											$stmt->bindParam(':longitude', $distribuidor->getLongitude());
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													alert("Atualização de distribuidor realizada com sucesso, clique em OK para aceitar as modificações.");
													window.location.replace("editadistribuidor.php?iddistribuidor=<?php echo $distribuidor->getId();?>")	;
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
?>
