<?php
require_once("InterfaceListaClienteExcetoSelecionado.php");

class ListaClienteExcetoSelecionado implements InterfaceListaClienteExcetoSelecionado{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listacliente = $this->conn->query("SELECT * FROM cliente WHERE id !=".$idexceto);
				return $this->listaCliente($listacliente);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
		}

		public function listaCliente($listacliente) {
				$resultadoclientes = array();
				if($listacliente) {
						while($row = $listacliente->fetch(PDO::FETCH_OBJ)) {
								$cliente = new Cliente();
								$cliente->setId($row->id);
								$cliente->setCliente($row->cliente);
								$cliente->setCnpj($row->cnpj);
								$cliente->setIe($row->ie);
								$cliente->setEndereco($row->endereco);
								$cliente->setNumero($row->numero);
								$cliente->setBairro($row->bairro);
								$cliente->setComplemento($row->complemento);
								$cliente->setCidade($row->cidade);
								$cliente->setEstado($row->estado);
								$cliente->setCep($row->cep);
								$cliente->setEmail($row->email);
								$cliente->setTelefone($row->telefone);
								$cliente->setLatitude($row->latitude);
								$cliente->setLongitude($row->longitude);
								$resultadoclientes[] = $cliente;
						}
				}
				return $resultadoclientes;
		}
}
?>
