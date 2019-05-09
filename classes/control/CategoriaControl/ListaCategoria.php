<?php
require_once("InterfaceListaCategoria.php");

class ListaCategoria implements InterfaceListaCategoria{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listacategoria = $this->conn->query('SELECT * FROM categoria');
				return $this->listaCategoria($listacategoria);
		}

		public function listaCategoria($listacategoria) {
				$resultadocategoria = array();
				if($listacategoria) {
						while($row = $listacategoria->fetch(PDO::FETCH_OBJ)) {
								$categoria = new Categoria();
								$categoria->setId($row->id);
								$categoria->setCategoria($row->categoria);
								$resultadocategoria[] = $categoria;
						}
				}
				return $resultadocategoria;
		}
}
?>
