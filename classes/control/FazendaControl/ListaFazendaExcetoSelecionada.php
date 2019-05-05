<?php
require_once("InterfaceListaFazendaExcetoSelecionada.php");

class ListaFazendaExcetoSelecionada implements InterfaceListaFazendaExcetoSelecionada{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listafazenda = $this->conn->query("SELECT * FROM fazenda WHERE id !=".$idexceto);
				return $this->listaFazenda($listafazenda);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
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
