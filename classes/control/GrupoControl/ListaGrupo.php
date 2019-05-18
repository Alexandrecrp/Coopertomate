<?php

class ListaGrupo {

		private $conn;

		public function __construct() {
				$registry = RegistroConexao::getInstancia();
				$this->conn = $registry->get('Connection');
		}

		public function getAll() {
				$listagrupo = $this->conn->query('SELECT * FROM grupo');
				return $this->listaGrupo($listagrupo);
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
