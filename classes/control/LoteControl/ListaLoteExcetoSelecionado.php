<?php
require_once("InterfaceListaLoteExcetoSelecionado.php");

class ListaLoteExcetoSelecionado implements InterfaceListaLoteExcetoSelecionado{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listalote = $this->conn->query("SELECT * FROM lote WHERE id !=".$idexceto);
				return $this->listaLote($listalote);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
		}

		public function listaLote($listalote) {
			$resultadolote = array();
			if($listalote) {
					while($row = $listalote->fetch(PDO::FETCH_OBJ)) {
							$lote = new Lote();
							$lote->setId($row->id);
							$lote->setLote($row->lote);
							$lote->setCod_fazenda($row->cod_fazenda);
							$lote->setCod_grupo($row->cod_grupo);
							$lote->setCod_cores($row->cod_cores);
							$lote->setCod_calibre($row->cod_calibre);
							$lote->setCod_categoria($row->cod_categoria);
							$lote->setQtdinicial($row->qtdinicial);
							$lote->setQtdvendida($row->qtdvendida);
							$resultadolote[] = $lote;
						}
				}
				return $resultadolote;
		}
}
?>
