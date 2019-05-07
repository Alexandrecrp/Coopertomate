<?php

class Usuario {

    private $id;
		private $idusuariocadastro;
		private $cpf;
		private $nome;
    private $email;
    private $senha;

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

	public function getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cpf = $cpf;
		return $this;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
		return $this;
	}

}
?>
