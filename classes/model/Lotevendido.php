<?php

class Lotevendido {

    private $id;
		private $cod_venda;
		private	$cod_lote;
		private $qtdvendido;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
		return $this;
  }

	public function getCod_venda() {
    return $this->cod_venda;
  }

  public function setCod_venda($cod_venda) {
    $this->cod_venda = $cod_venda;
		return $this;
  }

	public function getCod_lote() {
		return $this->cod_lote;
	}

	public function setCod_lote($cod_lote) {
		$this->cod_lote = $cod_lote;
		return $this;
	}

	public function getQtdvendido() {
		return $this->qtdvendido;
	}

	public function setQtdvendido($qtdvendido) {
		$this->qtdvendido = $qtdvendido;
		return $this;
	}

}
?>
