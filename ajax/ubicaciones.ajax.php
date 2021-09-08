<?php

require_once "../controladores/ubicaciones.controlador.php";
require_once "../modelos/ubicaciones.modelo.php";

class AjaxUbicaciones{

	/*=============================================
	EDITAR UBICACIONES
	=============================================*/	

	public $idUbicacion;

	public function ajaxEditarUbicacion){

		$item = "idUbicacion";
		$valor = $this->idUbicacion;

		$respuesta = ControladorUbicaciones::ctrMostrarUbicaciones $item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR UBICACION
	=============================================*/	

	public $validarUbicacion;

	public function ajaxValidarUbicacion(){

		$item = "codigoUbicacion";
		$valor = $this->validarUbicacion;

		$respuesta = ControladorUbicaciones::ctrMostrarUbicaciones($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR UBICACIONES
=============================================*/
if(isset($_POST["idUbicacion"])){

	$editar = new AjaxUbicaciones();
	$editar -> idUbicacion = $_POST["idUbicacion"];
	$editar -> ajaxEditarUbicacion();

}
