<?php
require_once('usuario.php');
require_once('InterfaceEmail.php');

class SmtpMailer implements email {

	private $usuario;

	public function __construct(Usuario $usuario){
		$this->usuario = $usuario;
	}

	function enviarEmail($mensagem){
		mail($this->usuario->getEmail(), "Cadastro na CooperTomate", $mensagem);
		?>
    <script>
          alert("Email de confirmação de cadastro enviado para sua caixa de mensagem.");
    </script>
  <?php
	}
}
?>
