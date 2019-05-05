<?php
require_once("../../classes/model/Lote.php");

class ConsultaLote {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function consultarLote($lote) {
        try {
						$stmt = $this->conn->prepare("SELECT * FROM lote WHERE lote = :lote");
						$param = array(":lote" => $lote);
						$stmt->execute($param);
						return (bool) $stmt->rowCount();
					} catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
}
