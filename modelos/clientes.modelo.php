<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(razonSocial, rutCliente, giro, direccion, ciudad, nombreContacto, telefono, email) VALUES (:razonSocial, :rutCliente, :giro, :direccion, :ciudad, :nombreContacto, :telefono, :email)");

		$stmt->bindParam(":razonSocial", $datos["razonSocial"], PDO::PARAM_STR);
		$stmt->bindParam(":rutCliente", $datos["rutCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":giro", $datos["giro"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreContacto", $datos["nombreContacto"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET razonSocial = :razonSocial, rutCliente = :rutCliente, giro = :giro, direccion = :direccion, ciudad = :ciudad, nombreContacto = :nombreContacto, telefono = :telefono, email = :email WHERE razonSocial = :razonSocial, rutCliente = :rutCliente, giro = :giro, direccion = :direccion, ciudad = :ciudad, nombreContacto = :nombreContacto, telefono = :telefono, email = :email");

		$stmt->bindParam(":razonSocial", $datos["razonSocial"], PDO::PARAM_STR);
		$stmt->bindParam(":rutCliente", $datos["rutCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":giro", $datos["giro"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreContacto", $datos["nombreContacto"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR CLIENTE
	=============================================*/

	static public function mdlBorrarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCliente = :idCliente");

		$stmt -> bindParam(":idCliente", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}