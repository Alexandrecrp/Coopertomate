<?php

class Listalotevendido {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAlllote($idlotevenda) {
			try {
				$listalote = $this->conn->query("select l.id, l.lote, l.cod_fazenda, l.cod_grupo, l.cod_cores, l.cod_calibre,
					l.cod_categoria, l.qtdinicial, l.qtdvendida from lote l inner join lotevendido lvo on l.id = lvo.cod_lote
					inner join lotevenda lva on lva.id = lvo.cod_venda where lva.id =".$idlotevenda);
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
