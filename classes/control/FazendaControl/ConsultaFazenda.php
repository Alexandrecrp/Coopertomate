<?php
require_once("../../classes/model/Fazenda.php");

class ConsultaFazenda {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function consultarFazenda($cnpj) {
        try {
						$stmt = $this->conn->prepare("SELECT * FROM fazenda WHERE cnpj = :cnpj");
						$param = array(":cnpj" => $cnpj);
						$stmt->execute($param);
						return (bool) $stmt->rowCount();
					} catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
}
