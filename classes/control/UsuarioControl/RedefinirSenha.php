<?php

class RedefinirSenha {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
	   }

		 public function redefinirSenha($id, $senha) {
         try {
             $stmt = $this->conn->prepare("UPDATE usuario set senha = :senha WHERE id = :id");
             $param = array(
                 ":id" => $id,
                 ":senha" =>($senha)
             );
           return $stmt->execute($param);
       } catch (PDOException $ex) {
           echo "ERRO 02,  SENHA: {$ex->getMessage()}";
       }
   }
}
