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
													'INSERT INTO usuario (idusuariocadastro, cpf, nome, email, senha) VALUES (:idusuariocadastro, :cpf, :nome, :email, :senha)'
											);
											$stmt->bindValue(':idusuariocadastro', $aluno->getIdusuariocadastro(), PDO::PARAM_INT);
											$stmt->bindValue(':cpf', $aluno->getCpf(), PDO::PARAM_INT);
											$stmt->bindValue(':nome', $aluno->getNome(), PDO::PARAM_STR);
											$stmt->bindValue(':email', $aluno->getEmail(), PDO::PARAM_STR);
											$stmt->bindValue(':senha', $aluno->getSenha(), PDO::PARAM_STR);
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
