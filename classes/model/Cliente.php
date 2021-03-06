<?php

class Cliente {

    private $id;
		private $idusuariocadastro;
		private $cliente;
		private $cnpj;
		private $ie;
		private $endereco;
		private $numero;
		private $bairro;
		private $complemento;
		private $cidade;
		private $estado;
		private $cep;
		private $email;
		private $telefone;
		private $latitude;
		private $longitude;

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

	public function getCliente() {
		return $this->cliente;
	}

	public function setCliente($cliente) {
		$this->cliente = $cliente;
		return $this;
	}

	public function getCnpj() {
		return $this->cnpj;
	}

	public function setCnpj($cnpj) {
		$this->cnpj = $cnpj;
		return $this;
	}

	public function getIe() {
		return $this->ie;
	}

	public function setIe($ie) {
		$this->ie = $ie;
		return $this;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		$this->endereco = $endereco;
		return $this;
	}


	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($numero) {
		$this->numero = $numero;
		return $this;
	}

	public function getBairro() {
		return $this->bairro;
	}

	public function setBairro($bairro) {
		$this->bairro = $bairro;
		return $this;
	}

	public function getComplemento() {
		return $this->complemento;
	}

	public function setComplemento($complemento) {
		$this->complemento = $complemento;
		return $this;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function setCidade($cidade) {
		$this->cidade = $cidade;
		return $this;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
		return $this;
	}

	public function getCep() {
		return $this->cep;
	}

	public function setCep($cep) {
		$this->cep = $cep;
		return $this;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	public function getTelefone() {
		return $this->telefone;
	}

	public function setTelefone($telefone) {
		$this->telefone = $telefone;
		return $this;
	}

	public function getLatitude() {
		return $this->latitude;
	}

	public function setLatitude($latitude) {
		$this->latitude = $latitude;
		return $this;
	}

	public function getLongitude() {
		return $this->longitutde;
	}

	public function setLongitude($longitutde) {
		$this->longitutde = $longitutde;
		return $this;
	}

}
?>
