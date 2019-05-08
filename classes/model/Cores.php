<?php

class Cores {

    private $id;
		private $cores;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
		return $this;
  }

	public function getCores() {
		return $this->cores;
	}

	public function setCores($cores) {
		$this->cores = $cores;
		return $this;
	}

}
?>
