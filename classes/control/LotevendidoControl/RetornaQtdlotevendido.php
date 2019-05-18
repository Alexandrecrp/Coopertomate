<?php

class RetornaQtdlotevendido {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getQtdlotevendido($idlotevenda, $idcodlotevendido) {
			try {
				$listalotevendido = $this->conn->query("select qtdvendido from lotevendido where cod_venda = ".$idlotevenda."
				and cod_lote = ".$idcodlotevendido."");
				return $this->listaQtdlotevendido($listalotevendido);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
		}

		public function listaQtdlotevendido($listalotevendido) {
				$resultadolotevendido = array();
				if($listalotevendido) {
						while($row = $listalotevendido->fetch(PDO::FETCH_OBJ)) {
								$lotevendido = new Lotevendido();
								$lotevendido->setId($row->id);
								$lotevendido->setCod_venda($row->cod_venda);
								$lotevendido->setCod_lote($row->cod_lote);								
								$lotevendido->setQtdvendido($row->qtdvendido);
								$resultadolotevendido[] = $lotevendido;
						}
				}
				return $resultadolotevendido;
		}
}
?>
