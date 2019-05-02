<?php
require_once("classes/model/Usuario.php");

class CadastroUsuario {
    private $usuario;
    private $conn;

    public function __construct(Usuario $usuario) {
        $registry = RegistroConexao::getInstancia();
        $this->conn = $registry->get('Connection');
				$this->usuario = $usuario;
	   }

		function cadastrarUsuario() {
							$this->conn->beginTransaction();
									try {
										  $aluno = $this->usuario;
											$stmt = $this->conn->prepare(
													'INSERT INTO usuario (cpf, nome, email, senha) VALUES (:cpf, :nome, :email, :senha)'
											);
											$stmt->bindValue(':cpf', $aluno->getCpf());
											$stmt->bindValue(':nome', $aluno->getNome());
											$stmt->bindValue(':email', $aluno->getEmail());
											$stmt->bindValue(':senha', $aluno->getSenha());
											$stmt->execute();
											$this->conn->commit();
											?>
												<script>
													alert("Cadastro realizado com sucesso.");
												</script>
											<?php
									}
									catch(Exception $e) {
											$this->conn->rollback();
									}
            }
    }
