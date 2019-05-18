<?php
class ListaProdutor {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listaprodutor = $this->conn->query('SELECT * FROM produtor');
				return $this->listaProdutor($listaprodutor);
		}

		public function listaProdutor($listaprodutor) {
				$resultadoprodutores = array();
				if($listaprodutor) {
						while($row = $listaprodutor->fetch(PDO::FETCH_OBJ)) {
								$produtor = new Produtor();
								$produtor->setId($row->id);
								$produtor->setNome($row->nome);
								$produtor->setCpf($row->cpf);
								$produtor->setEndereco($row->endereco);
								$produtor->setNumero($row->numero);
								$produtor->setBairro($row->bairro);
								$produtor->setComplemento($row->complemento);
								$produtor->setCidade($row->cidade);
								$produtor->setEstado($row->estado);
								$produtor->setCep($row->cep);
								$produtor->setEmail($row->email);
								$produtor->setTelefone($row->telefone);
								$resultadoprodutores[] = $produtor;
						}
				}
				return $resultadoprodutores;
		}
}
?>
