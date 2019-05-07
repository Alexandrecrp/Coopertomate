<?php

class Lote {

    private $id;
		private $idusuariocadastro;
		private $lote;
		private $cod_fazenda;
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
