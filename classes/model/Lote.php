<?php

class Lote {

    private $id;
		private $idusuariocadastro;
		private $lote;
		private $cod_fazenda;
		private $cod_grupo;
		private $cod_cores;
		private $cod_calibre;
		private $cod_categoria;
		private $qtdinicial;
		private $qtdvendida;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
		return $this;
  }

	public function getIdusuariocadastro() {
    return $this->idusuariocadastro;
  }

  public function setIdusuariocadastro($idusuariocadastro) {
    $this->idusuariocadastro = $idusuariocadastro;
		return $this;
  }

	public function getLote() {
		return $this->lote;
	}

	public function setLote($lote) {
		$this->lote = $lote;
		return $this;
	}

	public function getCod_fazenda() {
		return $this->fazenda;
	}

	public function setCod_fazenda($fazenda) {
		$this->fazenda = $fazenda;
		return $this;
	}

	public function getCod_grupo() {
		return $this->grupo;
	}

	public function setCod_grupo($grupo) {
		$this->grupo = $grupo;
		return $this;
	}

	public function getCod_cores() {
		return $this->cores;
	}

	public function setCod_cores($cores) {
		$this->cores = $cores;
		return $this;
	}

	public function getCod_calibre() {
		return $this->cod_calibre;
	}

	public function setCod_calibre($cod_calibre) {
		$this->cod_calibre = $cod_calibre;
		return $this;
	}

	public function getCod_categoria() {
		return $this->cod_categoria;
	}

	public function setCod_categoria($cod_categoria) {
		$this->cod_categoria = $cod_categoria;
		return $this;
	}

	public function getQtdinicial() {
		return $this->qtdinicial;
	}

	public function setQtdinicial($qtdinicial) {
		$this->qtdinicial = $qtdinicial;
		return $this;
	}

	public function getQtdvendida() {
		return $this->qtdvendida;
	}

	public function setQtdvendida($qtdvendida) {
		$this->qtdvendida = $qtdvendida;
		return $this;
	}

}
?>
