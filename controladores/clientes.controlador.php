<?php

class ControladorClientes{

	
	/*=============================================
	REGISTRO DE CLIENTE
	=============================================*/

	static public function ctrCrearCliente(){
		
		$tabla = "clientes";
		
		$datos = array("razonSocial" => $_POST["nuevaRazonSocial"],
					    "rutCliente" => $_POST["nuevoRutCliente"],
					    "giro" => $_POST["nuevoGiro"],
						"direccion" => $_POST["nuevaDireccion"],
						"ciudad" => $_POST["nuevaCiudad"],
						"nombreContacto" => $_POST["nuevoNombreContacto"],
						"telefono" => $_POST["nuevoTelefono"],
						"email" => $_POST["nuevoEmail"]);

		$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
			
		if($respuesta == "ok"){

			echo '<script>
					swal({
						type: "success",
						title: "¡El Cliente ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){						
							window.location = "clientes";
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
							window.location = "clientes";
						}
					});				
				</script>';
		}
	}

	/*=============================================
	MOSTRAR CLIENTE
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::MdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){
		
		$datos = array("razonSocial" => $_POST["editarRazonSocial"],
					           "rutCliente" => $_POST["editarRutCliente"],
					           "giro" => $_POST["editarGiro"],
							   "direccion" => $_POST["editarDireccion"],
							   "ciudad" => $_POST["editarCiudad"],
							   "nombreContacto" => $_POST["editarNombreContacto"],
							   "telefono" => $_POST["editarTelefono"],
							   "email" => $_POST["editarEmail"]);

		$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

		if($respuesta == "ok"){
			echo'<script>
					swal({
						type: "success",
						title: "El Cliente ha sido editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result) {
							if (result.value) {
								window.location = "clientes";
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
							window.location = "clientes";
						}
				})
			  	</script>';

			}
		}
	}

	/*=============================================
	BORRAR CLIENTE
	=============================================*/

	static public function ctrBorrarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlBorrarCliente($tabla, $datos);

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
	


