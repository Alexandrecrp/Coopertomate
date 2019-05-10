<?php
require_once("InterfaceListaEditaLotevenda.php");

class ListaEditarLotevenda implements InterfaceListaEditaLotevenda{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll($id) {
			try {
				$listalotevenda = $this->conn->query("SELECT * FROM lotevenda WHERE id =".$id);
				return $this->listaLotevenda($listalotevenda);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
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
