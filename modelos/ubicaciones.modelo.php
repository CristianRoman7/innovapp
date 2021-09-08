<?php

require_once "conexion.php";

class ModeloUbicaciones{

	/*=============================================
	MOSTRAR UBICACIONES
	=============================================*/

	static public function mdlMostrarUbicaciones($tabla, $item, $valor){

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
	REGISTRO DE UBICACIONES
	=============================================*/

	static public function mdlIngresarUbicacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigoUbicacion, nombreUbicacion) VALUES (:codigoUbicacion, :nombreUbicacion)");

		$stmt->bindParam(":codigoUbicacion", $datos["codigoUbicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreUbicacion", $datos["nombreUbicacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR UBICACION
	=============================================*/

	static public function mdlEditarUbicacion($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigoUbicacion = :codigoUbicacion, nombreUbicacion = :nombreUbicacion WHERE codigoUbicacion = :codigoUbicacion");

		$stmt -> bindParam(":codigoUbicacion", $datos["codigoUbicacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombreUbicacion", $datos["nombreUbicacion"], PDO::PARAM_STR);
		
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR UBICACION
	=============================================*/

	static public function mdlActualizarUbicacion($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR UBICACION
	=============================================*/

	static public function mdlBorrarUbicacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUbicacion = :idUbicacion");

		$stmt -> bindParam(":idUbicacion", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}