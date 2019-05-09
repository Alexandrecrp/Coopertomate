<?php
require_once("InterfaceListaCores.php");

class ListaCores implements InterfaceListaCores{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listacores = $this->conn->query('SELECT * FROM cores');
				return $this->listaCores($listacores);
		}

		public function listaCores($listacores) {
				$resultadocores = array();
				if($listacores) {
						while($row = $listacores->fetch(PDO::FETCH_OBJ)) {
								$cores = new Cores();
								$cores->setId($row->id);
								$cores->setCores($row->cores);
								$resultadocores[] = $cores;
						}
				}
				return $resultadocores;
		}
}
?>
