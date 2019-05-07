<?php
require_once("../../classes/model/Lotevenda.php");

class ConsultaLotevenda {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function consultarLotevenda($venda) {
        try {
						$stmt = $this->conn->prepare("SELECT * FROM lotevenda WHERE venda = :venda");
						$param = array(":venda" => $venda);
						$stmt->execute($param);
						return (bool) $stmt->rowCount();
					} catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
}
