<?php

require_once "conexion.php";
/**
 * 
 */
class ModelUsers
{
	/*=============================================
	=         MOSTRAR TOTAL DE USUARIOS           =
	=============================================*/	
	
	static public function mdlViewTotalUsers($table, $order)
	{
		

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY $order DESC");

		
		
		$stmt->execute();

		return $stmt-> fetchAll();

		$stmt->close();

		$stmt =null;




	}


	/*=============================================
	=         MOSTRAR  USUARIOS           =
	=============================================*/	

	static public function mdlViewUsers($table, $item, $value){

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

	/*===================================================
	=            ACTUALIZAR EL USUARIO            =
	===================================================*/

	static public function mdlActiveUser($table, $item1, $value1, $item2, $value2){

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








}