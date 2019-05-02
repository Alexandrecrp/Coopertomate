<?php
require_once("classes/model/Usuario.php");

class ConsultaIdUsuario {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function consultarIdUsuario($email) {
		try {
				$stmt = $this->conn->prepare("SELECT * FROM usuario WHERE email = :email");
				$param = array(":email" => $email);
				$stmt->execute($param);
				if ($stmt->rowCount() > 0) {
						$consulta = $stmt->fetch(PDO::FETCH_ASSOC);
						return $consulta['id'];
				} else {
						return "";
				}
		} catch (PDOException $ex) {
				echo "ERRO 02: {$ex->getMessage()}";
		}
	}
}
