<?php

require_once "../controladores/equipos.controlador.php";
require_once "../modelos/equipos.modelo.php";

class AjaxEquipos{

	/*=============================================
	EDITAR EQUIPO
	=============================================*/	

	public $idEquipo;

	public function ajaxEditarEquipo(){

		$item = "idEquipo";
		$valor = $this->idEquipo;

		$respuesta = ControladorEquipos::ctrMostrarEquipo($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR EQUIPO
	=============================================*/	

	public $validarEquipo;

	public function ajaxValidarEquipo(){

		$item = "equipos";
		$valor = $this->validarEquipo;

		$respuesta = ControladorEquipos::ctrMostrarEquipo($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR EQUIPO
=============================================*/
if(isset($_POST["idEquipo"])){

	$editar = new AjaxEquipo();
	$editar -> idEquipo = $_POST["idEquipo"];
	$editar -> ajaxEditarCliente();

}

/*=============================================
VALIDAR NO REPETIR EQUIPO
=============================================*/

if(isset( $_POST["validarEquipo"])){

	$valEquipo = new AjaxEquipo();
	$valEquipo -> validarEquipo = $_POST["validarEquipo"];
	$valEquipo -> ajaxValidarEquipo();

}