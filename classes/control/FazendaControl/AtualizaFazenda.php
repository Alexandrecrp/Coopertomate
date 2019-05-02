<?php
require_once("../../classes/model/Fazenda.php");

class atualizaFazenda {
    private $fazenda;
    private $conn;

    public function __construct(Fazenda $fazenda) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->fazenda = $fazenda;
	   }

		function atualizarFazenda() {
			$this->conn->beginTransaction();
				try {
				  $fazenda = $this->fazenda;
					$stmt = $this->conn->prepare("UPDATE fazenda SET
					produtor=:produtor, fazenda=:fazenda, ie=:ie, cnpj=:cnpj,
						cgc=:cgc, endereco=:endereco, cidade=:cidade,	ccir=:ccir,	estado=:estado,
						cep=:cep, email=:email, telefone=:telefone,	latitude=:latitude,	longitude=:longitude WHERE id=:id");
											$stmt->bindParam(":id", $fazenda->getId());
											$stmt->bindParam(":produtor", $fazenda->getProdutor());
											$stmt->bindParam(":fazenda", $fazenda->getFazenda());
											$stmt->bindParam(":ie", $fazenda->getIe());
											$stmt->bindParam(":cnpj", $fazenda->getCnpj());
											$stmt->bindParam(":cgc", $fazenda->getCgc());
											$stmt->bindParam(":endereco", $fazenda->getEndereco());
											$stmt->bindParam(":cidade", $fazenda->getCidade());
											$stmt->bindParam(":ccir", $fazenda->getCcir());
											$stmt->bindParam(":estado", $fazenda->getEstado());
											$stmt->bindParam(":cep", $fazenda->getCep());
											$stmt->bindParam(":email", $fazenda->getEmail());
											$stmt->bindParam(":telefone", $fazenda->getTelefone());
											$stmt->bindParam(":latitude", $fazenda->getLatitude());
											$stmt->bindParam(":longitude", $fazenda->getLongitude());
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													alert("Atualização de fazenda realizada com sucesso, clique em OK para aceitar as modificações.");
													window.location.replace("editafazenda.php?idfazenda=<?php echo $fazenda->getId();?>")	;
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
?>
