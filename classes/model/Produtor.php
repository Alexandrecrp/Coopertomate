<?php

class Produtor {

    private $id;
		private $idusuariocadastro;
		private $nome;
		private $cpf;
		private $endereco;
		private $numero;
		private $bairro;
		private $complemento;
		private $cidade;
		private $estado;
		private $cep;
		private $email;
		private $telefone;

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

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	public function getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cpf = $cpf;
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

}
?>
