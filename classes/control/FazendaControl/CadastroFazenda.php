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
											$stmt->bindValue(':idusuariocadastro', $fazenda->getIdusuariocadastro());
											$stmt->bindValue(':produtor', $fazenda->getProdutor());
											$stmt->bindValue(':fazenda', $fazenda->getFazenda());
											$stmt->bindValue(':ie', $fazenda->getIe());
											$stmt->bindValue(':cnpj', $fazenda->getCnpj());
											$stmt->bindValue(':cgc', $fazenda->getCgc());
											$stmt->bindValue(':endereco', $fazenda->getEndereco());
											$stmt->bindValue(':cidade', $fazenda->getCidade());
											$stmt->bindValue(':ccir', $fazenda->getCcir());
											$stmt->bindValue(':estado', $fazenda->getEstado());
											$stmt->bindValue(':cep', $fazenda->getCep());
											$stmt->bindValue(':email', $fazenda->getEmail());
											$stmt->bindValue(':telefone', $fazenda->getTelefone());
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
