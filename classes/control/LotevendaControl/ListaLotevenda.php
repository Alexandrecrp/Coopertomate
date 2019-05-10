<?php
require_once("InterfaceListaLotevenda.php");

class ListaLotevenda implements InterfaceListaLotevenda{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listalotevenda = $this->conn->query('SELECT * FROM lotevenda');
				return $this->listaLotevenda($listalotevenda);
		}

		public function listaLotevenda($listalotevenda) {
				$resultadolotevenda = array();
				if($listalotevenda) {
						while($row = $listalotevenda->fetch(PDO::FETCH_OBJ)) {
								$lotevenda = new Lotevenda();
								$lotevenda->setId($row->id);
								$lotevenda->setVenda($row->venda);
								$lotevenda->setCod_lote($row->cod_lote);
								$lotevenda->setCod_cliente($row->cod_cliente);
								$lotevenda->setQtdvendido($row->qtdvendido);
								$lotevenda->setValornegociado($row->valornegociado);
								$resultadolotevenda[] = $lotevenda;
						}
				}
				return $resultadolotevenda;
		}
}
?>
