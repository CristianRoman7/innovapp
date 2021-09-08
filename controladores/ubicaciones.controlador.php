<?php

class ControladorUbicaciones{

	
	/*=============================================
	REGISTRO DE UBICACION
	=============================================*/

	static public function ctrCrearUbicacion(){
	   
		$tabla = "ubicaciones";
		$datos = array("codigoUbicacion" => $_POST["nuevoCodigoUbicacion"],
					    "nombreUbicacion" => $_POST["nuevoNombreUbicacion"]);
		$respuesta = ModeloUbicaciones::mdlIngresarUbicacion($tabla, $datos);
			
			if($respuesta == "ok"){

					echo '<script>

					swal({
						type: "success",
						title: "¡El registro ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){						
							window.location = "ubicaciones";
						}
					});				
					</script>';

			}else{
				echo '<script>
					swal({
						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){					
							window.location = "usuarios";
						}
					});				
				</script>';
			}	
	}
	

	/*=============================================
	MOSTRAR UBICACION
	=============================================*/

	static public function ctrMostrarUbicaciones($item, $valor){

		$tabla = "ubicaciones";

		$respuesta = ModeloUbicaciones::MdlMostrarUbicaciones($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR UBICACION
	=============================================*/

	static public function ctrEditarUbicacion(){

		if(isset($_POST["editarUbicacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUbicacion"])){

				$tabla = "ubicaciones";

				$datos = array("codigoUbicacion" => $_POST["editarCodigoUbicacion"],
							   "nombreUbicacion" => $_POST["editarNombreUbicacion"]);

				$respuesta = ModeloUbicaciones::mdlEditarUbicacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "ubicaciones";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "ubicaciones";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR UBICACION
	=============================================*/

	static public function ctrBorrarUbicacion(){

		if(isset($_GET["idUbicacion"])){

			$tabla ="ubicaciones";
			$datos = $_GET["idUbicacion"];
			$respuesta = ModeloUbicaciones::mdlBorrarUbicacion($tabla, $datos);

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

								window.location = "ubicaciones";

								}
							})

				</script>';

			}		

		}

	}


}
	


