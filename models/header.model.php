<?php

require_once "conexion.php";

/**
 * 
 */
class ModelHeader
{
	/*=============================================
	MOSTRAR CABECERAS
	=============================================*/
	
	static public function mdlViewHeader($table, $item, $value)
	{
		# code...
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	INSERTAR CABECERAS
	=============================================*/
	static public function mdlInsertHead($table, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $table (route, title, description, keywords, image) VALUES (:route, :title, :description, :keywords, :image)");

		$stmt -> bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":keywords", $datos["keywords"], PDO::PARAM_STR);
		$stmt -> bindParam(":image", $datos["image"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;
		

	}

	/*=============================================
	EDITAR CABECERAS
	=============================================*/
	static public function mdlUpdateHead($table, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET route = :route, title =:title, description =:description, keywords =:keywords, image =:image WHERE id = :id");

		$stmt -> bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":keywords", $datos["keywords"], PDO::PARAM_STR);
		$stmt -> bindParam(":image", $datos["image"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["idHead"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;
		





	}

	/*=============================================
	ELIMINAR CABECERA
	=============================================*/
	static public function mdlDeleteHeader($table, $route){


		$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE route = :route");

		
		$stmt -> bindParam(":route", $route, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;
		





	}

	


}