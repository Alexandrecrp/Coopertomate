<?php

class ListaFazenda {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listafazenda = $this->conn->query('SELECT * FROM fazenda');
				return $this->listaFazenda($listafazenda);
		}

		public function listaFazenda($listafazenda) {
				$resultadofazendas = array();
				if($listafazenda) {
						while($row = $listafazenda->fetch(PDO::FETCH_OBJ)) {
								$fazenda = new Fazenda();
								$fazenda->setId($row->id);
								$fazenda->setProdutor($row->produtor);
								$fazenda->setFazenda($row->fazenda);
								$fazenda->setCidade($row->cidade);
								$fazenda->setCnpj($row->cnpj);
								$resultadofazendas[] = $fazenda;
						}
				}
				return $resultadofazendas;
		}
}
?>
