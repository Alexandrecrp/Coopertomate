<?php
require_once("classes/model/Usuario.php");

class LoginUsuario {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		function LoginUsuario($email, $senha) {
        try {
						$stmt = $this->conn->prepare("SELECT email,senha FROM usuario WHERE email = :email and senha = :senha");
						$param = array(":email" => $email,
														":senha"=> $senha);
						$stmt->execute($param);
						return (bool) $stmt->rowCount();
					} catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }
}
