<?php
require_once("InterfaceListaProdutor.php");

class ListaProdutor implements InterfaceListaProdutor{

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
								$produtor->setCidade($row->cidade);
								$produtor->setEmail($row->email);
								$resultadoprodutores[] = $produtor;
						}
				}
				return $resultadoprodutores;
		}
}
?>
