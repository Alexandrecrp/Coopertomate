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
											$stmt->bindValue(":id", $fazenda->getId());
											$stmt->bindValue(':produtor', $fazenda->getProdutor(), PDO::PARAM_INT);
											$stmt->bindValue(':fazenda', $fazenda->getFazenda(), PDO::PARAM_STR);
											$stmt->bindValue(':ie', $fazenda->getIe(), PDO::PARAM_INT);
											$stmt->bindValue(':cnpj', $fazenda->getCnpj(), PDO::PARAM_INT);
											$stmt->bindValue(':cgc', $fazenda->getCgc(), PDO::PARAM_STR);
											$stmt->bindValue(':endereco', $fazenda->getEndereco(), PDO::PARAM_STR);
											$stmt->bindValue(':cidade', $fazenda->getCidade(), PDO::PARAM_STR);
											$stmt->bindValue(':ccir', $fazenda->getCcir(), PDO::PARAM_INT);
											$stmt->bindValue(':estado', $fazenda->getEstado(), PDO::PARAM_STR);
											$stmt->bindValue(':cep', $fazenda->getCep(), PDO::PARAM_INT);
											$stmt->bindValue(':email', $fazenda->getEmail(), PDO::PARAM_STR);
											$stmt->bindValue(':telefone', $fazenda->getTelefone(), PDO::PARAM_INT);
											$stmt->bindValue(':latitude', $fazenda->getLatitude());
											$stmt->bindValue(':longitude', $fazenda->getLongitude());
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
