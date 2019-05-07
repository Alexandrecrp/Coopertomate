<?php
require_once("classes/model/Usuario.php");

class RetornaIdUsuario {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		public function RetornaIdfornecedor($email){
					try{
							$stmt = $this->conn->prepare("SELECT id FROM usuario WHERE email = :email");
								$param = array(
									":email"  => $email
								);
								$stmt->execute($param);
								$dados = $stmt->fetch(PDO::FETCH_ASSOC);
								return $dados["id"];
							}catch (PDOException $ex) {
					      echo "ERRO 04: {$ex->getMessage()}";
							return null;
					   }
			}
}
