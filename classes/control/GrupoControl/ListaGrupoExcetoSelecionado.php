<?php
require_once("InterfaceListaGrupoExcetoSelecionado.php");

class ListaGrupoExcetoSelecionado implements InterfaceListaGrupoExcetoSelecionado{

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAllExceto($idexceto) {
			try {
				$listagrupo = $this->conn->query("SELECT * FROM grupo WHERE id !=".$idexceto);
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
