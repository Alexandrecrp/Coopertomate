<?php

class Lotevenda {

    private $id;
		private $idusuariocadastro;
		private $venda;
		private $cod_lote;
		private $cod_cliente;
		private $qtdvendido;
		private $valornegociado;

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

	public function getVenda() {
		return $this->venda;
	}

	public function setVenda($venda) {
		$this->venda = $venda;
		return $this;
	}

	public function getCod_lote() {
		return $this->cod_lote;
	}

	public function setCod_lote($cod_lote) {
		$this->cod_lote = $cod_lote;
		return $this;
	}

	public function getCod_cliente() {
		return $this->fazenda;
	}

	public function setCod_cliente($fazenda) {
		$this->fazenda = $fazenda;
		return $this;
	}

	public function getQtdvendido() {
		return $this->qtdvendido;
	}

	public function setQtdvendido($qtdvendido) {
		$this->qtdvendido = $qtdvendido;
		return $this;
	}

	public function getValornegociado() {
		return $this->valornegociado;
	}

	public function setValornegociado($valornegociado) {
		$this->valornegociado = $valornegociado;
		return $this;
	}

}
?>
