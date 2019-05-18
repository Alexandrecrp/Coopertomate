<?php
require_once("../../classes/model/Lotevendido.php");

class RetornaIdlotevenda {

    private $conn;

    public function __construct() {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
    }

		public function RetornaIdlotevenda($lotevenda){
					try{
							$stmt = $this->conn->prepare("SELECT id FROM lotevenda WHERE venda = :lotevenda");
								$param = array(
									":lotevenda"  => $lotevenda
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
