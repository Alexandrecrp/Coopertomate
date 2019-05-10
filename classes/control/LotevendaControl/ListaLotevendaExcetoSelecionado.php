<?php
require_once("InterfaceListaLotevendaExcetoSelecionado.php");

class ListaLotevendaExcetoSelecionado implements InterfaceListaLotevendaExcetoSelecionado{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listalotevenda = $this->conn->query("SELECT * FROM lotevenda WHERE id !=".$idexceto);
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
