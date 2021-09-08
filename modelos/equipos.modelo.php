<?php

require_once "conexion.php";

class ModeloEquipos{

	/*=============================================
	MOSTRAR EQUIPOS
	=============================================*/

	static public function mdlMostrarEquipos($tabla, $item, $valor){

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
	REGISTRO DE EQUIPO
	=============================================*/

	static public function mdlIngresarEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigoEquipo, descripcionEquipo, modeloEquipo, categoria, clasificacion, tipo, idUbicacion) VALUES (:codigoEquipo, :descripcionEquipo, :modeloEquipo, :categoria, :clasificacion, :tipo, :idUbicacion)");

		$stmt->bindParam(":codigoEquipo", $datos["codigoEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionEquipo", $datos["descripcionEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":modeloEquipo", $datos["modeloEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":idUbicacion", $datos["idUbicacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR EQUIPO
	=============================================*/

	static public function mdlEditarEquipo($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigoEquipo = :codigoEquipo, descripcionEquipo = :descripcionEquipo, modeloEquipo = :modeloEquipo, categoria = :categoria, clasificacion = :clasificacion, tipo = :tipo, idUbicacion = :idUbicacion WHERE codigoEquipo = :codigoEquipo, descripcionEquipo = :descripcionEquipo, modeloEquipo = :modeloEquipo, categoria = :categoria, clasificacion = :clasificacion, tipo = :tipo, idUbicacion = :idUbicacion");

		$stmt->bindParam(":codigoEquipo", $datos["codigoEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionEquipo", $datos["descripcionEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":modeloEquipo", $datos["modeloEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":idUbicacion", $datos["idUbicacion"], PDO::PARAM_STR);
	

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR EQUIPO
	=============================================*/

	static public function mdlActualizarEquipo($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR EQUIPO
	=============================================*/

	static public function mdlBorrarEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEquipo = :idEquipo");

		$stmt -> bindParam(":idEquipo", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}