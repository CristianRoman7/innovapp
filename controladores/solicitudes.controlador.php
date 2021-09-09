<?php

class ControladorSolicitudes{
	
	/*=============================================
	REGISTRO DE SOLICITUD
	=============================================*/

	static public function ctrCrearSolicitud(){

		$tabla = "solicitudes";
		$datos = array("numeroSolicitud" => $_POST["nuevoNumeroSolicitud"],
					    "descripcionSolicitud" => $_POST["nuevaDescripcionSolicitud"],
						"referencia" => $_POST["nuevaReferencia"],
						"prioridad" => $_POST["nuevaPrioridad"],
						"fechaCreacion" => $_POST["nuevaFechaCreacion"],
						"fechaIncidente" => $_POST["nuevaFechaIncidente"],
						"fechaProgramada" => $_POST["nuevaFechaProgramada"],
						"fechaCierre" => $_POST["nuevaFechaCierre"],
						"idCliente" => $_POST["nuevoCliente"],
					    "idEquipo" => $_POST["nuevoEquipo"],
						"idUbicacion" => $_POST["nuevaUbicacion"],
						"idUsuarioCreador" => $_POST["nuevoUsuarioCreador"],
						"idUsuarioAsignado" => $_POST["nuevoUsuarioAsignado"]);

		$respuesta = ModeloSolicitudes::mdlIngresarSolicitud($tabla, $datos);
			
		if($respuesta == "ok"){

			echo '<script>

					swal({
						type: "success",
						title: "¡El registro ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "solicitudes";
						}
					});
					</script>';
		}else{

			echo '<script>

					swal({

						type: "error",
						title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "solicitudes";

						}

					});
				

				</script>';
		}

	}

	/*=============================================
	MOSTRAR SOLICITUDES
	=============================================*/

	static public function ctrMostrarSolicitudes($item, $valor){

		$tabla = "solicitudes";

		$respuesta = ModeloSolicitudes::MdlMostrarSolicitudes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR SOLICITUD
	=============================================*/

	static public function ctrEditarSolicitud(){

		if(isset($_POST["editarSolicitud"])){

			$datos = array("numeroSolicitud" => $_POST["editarNumeroSolicitud"],
						"descripcionSolicitud" => $_POST["editarDescripcionSolicitud"],
						"referencia" => $_POST["editarReferencia"],
						"prioridad" => $_POST["editarPrioridad"],
						"fechaCreacion" => $_POST["editarFechaCreacion"],
						"fechaIncidente" => $_POST["editarFechaIncidente"],
						"fechaProgramada" => $_POST["editarFechaProgramada"],
						"fechaCierre" => $_POST["editarFechaCierre"],
						"idCliente" => $_POST["editarCliente"],
						"idEquipo" => $_POST["editarEquipo"],
						"idUbicacion" => $_POST["editarUbicacion"],
						"idUsuarioCreador" => $_POST["editarUsuarioCreador"],
						"idUsuarioAsignado" => $_POST["editarUsuarioAsignado"]);

			$respuesta = ModeloSolicitudes::mdlEditarSolicitud($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "solicitudes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "solicitudes";

							}
						})

			  	</script>';

			}

	}

	/*=============================================
	BORRAR SOLICITUD
	=============================================*/

	static public function ctrBorrarSolicitud(){

		if(isset($_GET["idSolicitud"])){

			$tabla ="solicitudes";
			$datos = $_GET["idSolicitud"];

			$respuesta = ModeloSolicitudes::mdlBorrarSolicitud($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "solicitudes";

								}
							})

				</script>';

			}		

		}

	}


}
	


