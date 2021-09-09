<?php

class ControladorEquipos{

	
	/*=============================================
	REGISTRO DE EQUIPO
	=============================================*/

	static public function ctrCrearEquipo(){
		
		$tabla = "equipos";
		
		$datos = array("codigoEquipo" => $_POST["nuevoCodigoEquipo"],
					    "descripcionEquipo" => $_POST["nuevaDescripcionEquipo"],
					    "modeloEquipo" => $_POST["nuevoModeloEquipo"],
						"categoria" => $_POST["nuevaCategoria"],
						"clasificacion" => $_POST["nuevaClasificacion"],
						"tipo" => $_POST["nuevoTipo"],
						"idUbicacion" => $_POST["nuevaUbicacion"]);

		$respuesta = ModeloEquipos::mdlIngresarEquipo($tabla, $datos);
			
		if($respuesta == "ok"){

			echo '<script>
					swal({
						type: "success",
						title: "¡El registro ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){						
							window.location = "equipos";
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
							window.location = "equipos";
						}
					});				
				</script>';
		}
	}

	/*=============================================
	MOSTRAR EQUIPO
	=============================================*/

	static public function ctrMostrarEquipo($item, $valor){

		$tabla = "equipos";
		$respuesta = ModeloEquipos::MdlMostrarEquipo($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	EDITAR EQUIPO
	=============================================*/

	static public function ctrEditarEquipo(){

		$tabla = "equipos";
		$datos = array("codigoEquipo" => $_POST["NuevoCodigoEquipo"],
					           "descripcionEquipo" => $_POST["nuevaDescripcionEquipo"],
					           "modeloEquipo" => $_POST["nuevoModeloEquipo"],
							   "categoria" => $_POST["nuevaCategoria"],
							   "clasificacion" => $_POST["nuevaClasificacion"],
							   "tipo" => $_POST["nuevoTipo"],
							   "idUbicacion" => $_POST["nuevaUbicacion"]);

		$respuesta = ModeloEquipos::mdlEditarEquipo($tabla, $datos);

		if($respuesta == "ok"){
			echo'<script>
					swal({
						type: "success",
						title: "El Registro ha sido editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result) {
							if (result.value) {
								window.location = "equipos";
							}
						})
				</script>';
		}else{
			echo'<script>
				swal({
					type: "error",
						title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result) {
							if (result.value) {
							window.location = "equipos";
						}
				})
			  	</script>';

			}

	}

	/*=============================================
	BORRAR CLIENTE
	=============================================*/

	static public function ctrBorrarEquipo(){

		if(isset($_GET["idEquipo"])){

			$tabla ="equipos";
			$datos = $_GET["idEquipo"];

			$respuesta = ModeloEquipos::mdlBorrarEquipo($tabla, $datos);

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
								window.location = "clientes";
								}
							})
				</script>';

			}		

		}

	}


}
	


