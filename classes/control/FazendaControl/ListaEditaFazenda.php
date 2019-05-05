<?php
require_once("InterfaceListaEditaFazenda.php");

class ListaEditarFazenda implements InterfaceListaEditaFazenda{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll($id) {
			try {
				$listafazenda = $this->conn->query("SELECT * FROM fazenda WHERE id =".$id);
				return $this->listaFazenda($listafazenda);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
		}

		public function listaFazenda($listafazenda) {
				$resultadofazendas = array();
				if($listafazenda) {
						while($row = $listafazenda->fetch(PDO::FETCH_OBJ)) {
								$fazenda = new Fazenda();
								$fazenda->setId($row->id);
								$fazenda->setProdutor($row->produtor);
								$fazenda->setFazenda($row->fazenda);
								$fazenda->setIe($row->ie);
								$fazenda->setCnpj($row->cnpj);
								$fazenda->setCgc($row->cgc);
								$fazenda->setEndereco($row->endereco);
								$fazenda->setCidade($row->cidade);
								$fazenda->setCcir($row->ccir);
								$fazenda->setEstado($row->estado);
								$fazenda->setCep($row->cep);
								$fazenda->setEmail($row->email);
								$fazenda->setTelefone($row->telefone);
								$fazenda->setLatitude($row->latitude);
								$fazenda->setLongitude($row->longitude);
								$resultadofazendas[] = $fazenda;
						}
				}
				return $resultadofazendas;
		}
}
?>
