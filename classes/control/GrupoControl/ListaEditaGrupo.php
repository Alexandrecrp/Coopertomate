<?php
require_once("InterfaceListaEditaGrupo.php");

class ListaEditaGrupo implements InterfaceListaEditaGrupo{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll($id) {
			try {
				$listagrupo = $this->conn->query("SELECT * FROM grupo WHERE id =".$id);
				return $this->listaGrupo($listagrupo);
			} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
			}
		}

		public function listaGrupo($listagrupo) {
				$resultadogrupo = array();
				if($listagrupo) {
						while($row = $listagrupo->fetch(PDO::FETCH_OBJ)) {
								$grupo = new Grupo();
								$grupo->setId($row->id);
								$grupo->setGrupo($row->grupo);
								$resultadogrupo[] = $grupo;
						}
				}
				return $resultadogrupo;
		}
}
?>
