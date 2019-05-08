<?php

class ListaCategoriaExcetoSelecionada {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listacategoria = $this->conn->query("SELECT * FROM categoria WHERE id !=".$idexceto);
				return $this->listaCategoria($listacategoria);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
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
