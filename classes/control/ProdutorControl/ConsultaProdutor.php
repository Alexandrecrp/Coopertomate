<?php
require_once("../../classes/model/Produtor.php");

class ConsultaProdutor {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function consultarProdutor($cpf) {
        try {
						$stmt = $this->conn->prepare("SELECT * FROM produtor WHERE cpf = :cpf");
						$param = array(":cpf" => $cpf);
						$stmt->execute($param);
						return (bool) $stmt->rowCount();
					} catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
}
