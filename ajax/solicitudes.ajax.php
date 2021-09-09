<?php

require_once "../controladores/solicitudes.controlador.php";
require_once "../modelos/solicitudes.modelo.php";

class AjaxSolicitudes{

	/*=============================================
	EDITAR SOLICITUD
	=============================================*/	

	public $idSolicitud

	public function ajaxEditarSolicitud(){

		$item = "idSolicitud";
		$valor = $this->idSolicitud;

		$respuesta = ControladorSolicitudes::ctrMostrarSolicitudes($item, $valor);

		echo json_encode($respuesta);

	}


}

/*=============================================
EDITAR SOLICITUD
=============================================*/
if(isset($_POST["idSolicitud"])){

	$editar = new AjaxSolicitudes();
	$editar -> idSolicitud = $_POST["idSolicitud"];
	$editar -> ajaxEditarSolicitud();

}