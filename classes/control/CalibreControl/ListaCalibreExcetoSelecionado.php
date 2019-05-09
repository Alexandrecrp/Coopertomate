<?php
require_once("InterfaceListaCalibreExcetoSelecionado.php");

class ListaCalibreExcetoSelecionado implements InterfaceListaCalibreExcetoSelecionado{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listacalibre = $this->conn->query("SELECT * FROM calibre WHERE id !=".$idexceto);
				return $this->listaCalibre($listacalibre);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
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
