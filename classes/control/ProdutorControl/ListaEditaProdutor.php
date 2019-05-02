<?php
require_once("InterfaceListaEditaProdutor.php");

class ListaEditarProdutor implements InterfaceListaEditaProdutor{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll($id) {
			try {
				$listaprodutor = $this->conn->query("SELECT * FROM produtor WHERE id =".$id);
				return $this->listaProdutor($listaprodutor);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
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
