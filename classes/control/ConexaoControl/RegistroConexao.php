<?php

class RegistroConexao {

    private static $instancia;
    private $armazenaconexao;

    protected function __construct() {
        $this->armazenaconexao = new ArrayObject();
    }

    public static function getInstancia() {
        if ( !self::$instancia )
            self::$instancia = new RegistroConexao();

        return self::$instancia;
    }

    public function set( $nomeconexao , $conexao ) {
        if ( !$this->armazenaconexao->offsetExists( $nomeconexao ) ) {
            $this->armazenaconexao->offsetSet( $nomeconexao , $conexao );
        } else {
            throw new LogicException( sprintf( 'Conexão já possui registro como"%s".' , $nomeconexao ) );
        }
    }
		public function get( $nomeconexao ) {
				if ( $this->armazenaconexao->offsetExists( $nomeconexao ) ) {
						return $this->armazenaconexao->offsetGet( $nomeconexao );
				} else {
						throw new RuntimeException( sprintf( 'Não há registro para a conexão "%s".' , $nomeconexao ) );
				}
		}
}
