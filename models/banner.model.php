<?php

require_once "conexion.php";


/**
 * 
 */
class ModelBanner
{
	
	static public function mdlViewBanner($table, $item, $value)
	{
		# code..

		/*=============================================
		=           MOSTRAR BANNER         =
		=============================================*/
		

		if($item !=null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt-> fetch();



		}else {
			# code...

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY id DESC");


			$stmt->execute();

			return $stmt-> fetchAll();

		


		}


		$stmt->close();

		$stmt =null;



	}


	/*===========================================
	=            ACTUALIZAR ESTATUS             =
	===========================================*/

	static public function mdlUpdateStateBanner($table, $item1, $value1, $item2, $value2){


		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;






	}
	
	/*===========================================
	=            INSERTAR UN BANNER            =
	===========================================*/
	static public function mdlInsertBanner($table, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $table (route, type, img, state) VALUES (:route, :type, :img, :state)");

		$stmt -> bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt -> bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt -> bindParam(":state", $datos["state"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;



	}

	/*===========================================
	=            EDITAR UN BANNER            =
	===========================================*/
	static public function mdlEditBanner($table, $datos){


		$stmt = Conexion::conectar()->prepare("UPDATE $table SET route=:route,type=:type,img=:img WHERE id = :id");





		$stmt -> bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt -> bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;



	}

	/*===========================================
	=            ELIMINAR UN BANNER            =
	===========================================*/
	static public function mdlDeleteBanner($table, $datos){


		$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;



	}




}

