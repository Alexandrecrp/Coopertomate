<?php
require_once("../../classes/model/Fazenda.php");

class CadastroFazenda {
    private $fazenda;
    private $conn;

    public function __construct(Fazenda $fazenda) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->fazenda = $fazenda;
	   }

		function cadastrarFazenda() {
			$this->conn->beginTransaction();
				try {
				  $fazenda = $this->fazenda;
					$stmt = $this->conn->prepare(
						'INSERT INTO fazenda (idusuariocadastro, produtor, fazenda, ie, cnpj, cgc, endereco, cidade,	ccir,	estado,	cep, email, telefone,	latitude,	longitude)
																	VALUES
																	(:idusuariocadastro, :produtor, :fazenda, :ie, :cnpj, :cgc, :endereco, :cidade,	:ccir,	:estado,	:cep,	:email, :telefone, :latitude,	:longitude)');
											$stmt->bindValue(':idusuariocadastro', $fazenda->getIdusuariocadastro(), PDO::PARAM_INT);
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
													alert("Cadastro de fazenda realizado com sucesso.");
													window.location.replace("listafazenda.php")	;
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
