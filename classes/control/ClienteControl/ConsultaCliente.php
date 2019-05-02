<?php
require_once("../../classes/model/Cliente.php");

class ConsultaCliente {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function consultarCliente($cnpj) {
        try {
						$stmt = $this->conn->prepare("SELECT * FROM cliente WHERE cnpj = :cnpj");
						$param = array(":cnpj" => $cnpj);
						$stmt->execute($param);
						return (bool) $stmt->rowCount();
					} catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
}
