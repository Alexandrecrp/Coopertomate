<?php
require_once("InterfaceListaCoresExcetoSelecionada.php");

class ListaCoresExcetoSelecionada implements InterfaceListaCoresExcetoSelecionada {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listacores = $this->conn->query("SELECT * FROM cores WHERE id !=".$idexceto);
				return $this->listaCores($listacores);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
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
