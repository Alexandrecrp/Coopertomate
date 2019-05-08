<?php

class Calibre {

    private $id;
		private $calibre;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
		return $this;
  }

	public function getCalibre() {
		return $this->calibre;
	}

	public function setCalibre($calibre) {
		$this->calibre = $calibre;
		return $this;
	}

}
?>
