<?php

class ListaCliente {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listacliente = $this->conn->query('SELECT * FROM cliente');
				return $this->listaCliente($listacliente);
		}

		public function listaCliente($listacliente) {
				$resultadoclientes = array();
				if($listacliente) {
						while($row = $listacliente->fetch(PDO::FETCH_OBJ)) {
								$cliente = new Cliente();
								$cliente->setId($row->id);
								$cliente->setCliente($row->cliente);
								$cliente->setCidade($row->cidade);
								$cliente->setEstado($row->estado);
								$resultadoclientes[] = $cliente;
						}
				}
				return $resultadoclientes;
		}
}
?>
