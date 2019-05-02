<?php
require_once('usuario.php');
require_once('InterfaceEmail.php');

class SmtpMailerRedefinirSenha implements email {

	private $usuario;

	public function __construct(Usuario $usuario){
		$this->usuario = $usuario;
	}

	function enviarEmail($mensagem){
		mail($this->usuario->getEmail(), "Cadastro na CooperTomate", $mensagem);
		?>
    <script>
          alert("Confira sua caixa de mensagem do email para redefinir sua senha.");
    </script>
  <?php
	}
}
?>
