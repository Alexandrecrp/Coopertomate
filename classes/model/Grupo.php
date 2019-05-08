<?php

class Grupo {

    private $id;
		private $grupo;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
		return $this;
  }

	public function getGrupo() {
		return $this->grupo;
	}

	public function setGrupo($grupo) {
		$this->grupo = $grupo;
		return $this;
	}

}
?>
