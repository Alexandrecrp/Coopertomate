<?php

class ListaDistribuidor {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listadistribuidor = $this->conn->query('SELECT * FROM distribuidor');
				return $this->listaDistribuidor($listadistribuidor);
		}

		public function listaDistribuidor($listadistribuidor) {
				$resultadodistribuidores = array();
				if($listadistribuidor) {
						while($row = $listadistribuidor->fetch(PDO::FETCH_OBJ)) {
								$distribuidor = new Distribuidor();
								$distribuidor->setId($row->id);
								$distribuidor->setDistribuidor($row->distribuidor);
								$distribuidor->setCidade($row->cidade);
								$distribuidor->setCnpj($row->cnpj);
								$resultadodistribuidores[] = $distribuidor;
						}
				}
				return $resultadodistribuidores;
		}
}
?>
