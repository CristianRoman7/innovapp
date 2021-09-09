<?php

require_once "conexion.php";

class ModeloSolicitudes{

	/*=============================================
	MOSTRAR SOLICITUDES
	=============================================*/

	static public function mdlMostrarSolicitudes($tabla, $item, $valor){

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
	REGISTRO DE SOLICITUDES
	=============================================*/

	static public function mdlIngresarSolicitud($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeroSolicitud, descripcionSolicitud, referencia, prioridad, fechaCreacion, fechaIncidente, fechaProgramada, FechaCierre, idCliente, idEquipo, idUbicación, idUsuarioCreador, idUsuarioAsignado) VALUES (:numeroSolicitud, :descripcionSolicitud, :referencia, :prioridad, :fechaCreacion, :fechaIncidente, :fechaProgramada, :FechaCierre, :idCliente, :idEquipo, :idUbicación, :idUsuarioCreador, :idUsuarioAsignado)");

		$stmt->bindParam(":numeroSolicitud", $datos["numeroSolicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionSolicitud", $datos["descripcionSolicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCreacion", $datos["fechaCreacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIncidente", $datos["fechaIncidente"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaProgramada", $datos["fechaProgramada"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCierre", $datos["fechaCierre"], PDO::PARAM_STR);
		$stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":idEquipo", $datos["idEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":idUbicacion", $datos["idUbicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":idUsuarioCreador", $datos["idUsuarioCreador"], PDO::PARAM_STR);
		$stmt->bindParam(":idUsuarioAsignado", $datos["idUsuarioAsignado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR SOLICITUD
	=============================================*/

	static public function mdlEditarSolicitud($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numeroSolicitud = :numeroSolicitud, descripcionSolicitud = :descripcionSolicitud, referencia = :referencia, prioridad = :prioridad, fechaCreacion = :fechaCreacion, fechaIncidente = :fechaIncidente, fechaProgramada = :fechaProgramada, fechaCierre = :fechaCierre, idCliente = :idCliente, idEquipo = :idEquipo, idUbicacion = :idUbicacion, idUsuarioCreador = :idUsuarioCreador, idUsuarioAsignado = :idUsuarioAsignado WHERE numeroSolicitud = :numeroSolicitud, descripcionSolicitud = :descripcionSolicitud, referencia = :referencia, prioridad = :prioridad, fechaCreacion = :fechaCreacion, fechaIncidente = :fechaIncidente, fechaProgramada = :fechaProgramada, fechaCierre = :fechaCierre, idCliente = :idCliente, idEquipo = :idEquipo, idUbicacion = :idUbicacion, idUsuarioCreador = :idUsuarioCreador, idUsuarioAsignado = :idUsuarioAsignado");

		$stmt->bindParam(":numeroSolicitud", $datos["numeroSolicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionSolicitud", $datos["descripcionSolicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCreacion", $datos["fechaCreacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIncidente", $datos["fechaIncidente"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaProgramada", $datos["fechaProgramada"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaCierre", $datos["fechaCierre"], PDO::PARAM_STR);
		$stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":idEquipo", $datos["idEquipo"], PDO::PARAM_STR);
		$stmt->bindParam(":idUbicacion", $datos["idUbicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":idUsuarioCreador", $datos["idUsuarioCreador"], PDO::PARAM_STR);
		$stmt->bindParam(":idUsuarioAsignado", $datos["idUsuarioAsignado"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR SOLICITUD
	=============================================*/

	static public function mdlActualizarSolicitud($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR SOLICITUD
	=============================================*/

	static public function mdlBorrarSolicitud($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSolicitud = :idSolicitud");

		$stmt -> bindParam(":idSolicitud", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}