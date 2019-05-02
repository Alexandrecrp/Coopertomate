<?php
require_once("classes/model/Usuario.php");

class ConsultaUsuario {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function consultarUsuario($cpf) {
        try {
						$stmt = $this->conn->prepare("SELECT cpf FROM usuario WHERE cpf = :cpf");
						$param = array(":cpf" => $cpf);
						$stmt->execute($param);
						return (bool) $stmt->rowCount();
					} catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
}
