<?php

class Fazenda {

    private $id;
		private $idusuariocadastro;
		private $produtor;
		private $fazenda;
		private $ie;
		private $cnpj;
		private $cgc;
		private $endereco;
		private $cidade;
		private $ccir;
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

	public function getProdutor() {
		return $this->produtor;
	}

	public function setProdutor($produtor) {
		$this->produtor = $produtor;
		return $this;
	}

	public function getFazenda() {
		return $this->fazenda;
	}

	public function setFazenda($fazenda) {
		$this->fazenda = $fazenda;
		return $this;
	}

	public function getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cpf = $cpf;
		return $this;
	}

	public function getIe() {
		return $this->ie;
	}

	public function setIe($ie) {
		$this->ie = $ie;
		return $this;
	}

	public function getCnpj() {
		return $this->cnpj;
	}

	public function setCnpj($cnpj) {
		$this->cnpj = $cnpj;
		return $this;
	}

	public function getCgc() {
		return $this->cgc;
	}

	public function setCgc($cgc) {
		$this->cgc = $cgc;
		return $this;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		$this->endereco = $endereco;
		return $this;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function setCidade($cidade) {
		$this->cidade = $cidade;
		return $this;
	}

	public function getCcir() {
		return $this->ccir;
	}

	public function setCcir($ccir) {
		$this->ccir = $ccir;
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
