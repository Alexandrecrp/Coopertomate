<?php
require_once("InterfaceListaProdutorExcetoSelecionado.php");

class ListaProdutorExcetoSelecionado implements InterfaceListaProdutorExcetoSelecionado{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listaprodutor = $this->conn->query("SELECT * FROM produtor WHERE id !=".$idexceto);
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
								$produtor->setCidade($row->cidade);
								$produtor->setEmail($row->email);
								$resultadoprodutores[] = $produtor;
						}
				}
				return $resultadoprodutores;
		}
}
?>
