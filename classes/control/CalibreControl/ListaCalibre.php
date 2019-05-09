<?php
require_once("InterfaceListaCalibre.php");

class ListaCalibre implements InterfaceListaCalibre{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listacalibre = $this->conn->query('SELECT * FROM calibre');
				return $this->listaCalibre($listacalibre);
		}

		public function listaCalibre($listacalibre) {
				$resultadocalibre = array();
				if($listacalibre) {
						while($row = $listacalibre->fetch(PDO::FETCH_OBJ)) {
								$calibre = new Calibre();
								$calibre->setId($row->id);
								$calibre->setCalibre($row->calibre);
								$resultadocalibre[] = $calibre;
						}
				}
				return $resultadocalibre;
		}
}
?>
