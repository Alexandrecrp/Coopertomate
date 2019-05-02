<?php

class ListaEditarDistribuidor {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll($id) {
			try {
				$listadistribuidor = $this->conn->query("SELECT * FROM distribuidor WHERE id =".$id);
				return $this->listaDistribuidor($listadistribuidor);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
		}

		public function listaDistribuidor($listadistribuidor) {
				$resultadodistribuidores = array();
				if($listadistribuidor) {
						while($row = $listadistribuidor->fetch(PDO::FETCH_OBJ)) {
								$distribuidor = new Distribuidor();
								$distribuidor->setId($row->id);
								$distribuidor->setDistribuidor($row->distribuidor);
								$distribuidor->setCnpj($row->cnpj);
								$distribuidor->setIe($row->ie);
								$distribuidor->setEndereco($row->endereco);
								$distribuidor->setNumero($row->numero);
								$distribuidor->setBairro($row->bairro);
								$distribuidor->setComplemento($row->complemento);
								$distribuidor->setCidade($row->cidade);
								$distribuidor->setEstado($row->estado);
								$distribuidor->setCep($row->cep);
								$distribuidor->setEmail($row->email);
								$distribuidor->setTelefone($row->telefone);
								$distribuidor->setLatitude($row->latitude);
								$distribuidor->setLongitude($row->longitude);
								$resultadodistribuidores[] = $distribuidor;
						}
				}
				return $resultadodistribuidores;
		}
}
?>
