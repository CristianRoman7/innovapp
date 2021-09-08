<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR CLIENTE
	=============================================*/	

	public $validarCliente;

	public function ajaxValidarCliente(){

		$item = "cliente";
		$valor = $this->validarCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CLIENTE
=============================================*/
if(isset($_POST["idCliente"])){

	$editar = new AjaxClientes();
	$editar -> idCliente = $_POST["idCliente"];
	$editar -> ajaxEditarCliente();

}

/*=============================================
VALIDAR NO REPETIR CLIENTE
=============================================*/

if(isset( $_POST["validarCliente"])){

	$valCliente = new AjaxCliente();
	$valCliente -> validarCliente = $_POST["validarCliente"];
	$valCliente -> ajaxValidarCliente();

}