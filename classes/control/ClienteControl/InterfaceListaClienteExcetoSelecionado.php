<?php
require_once("InterfaceMetodoListaCliente.php");
Interface InterfaceListaClienteExcetoSelecionado extends MetodoListaCliente{

		public function getAllExceto($idexceto);

}
?>
