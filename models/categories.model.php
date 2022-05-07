<?php

require_once "conexion.php";

/**
 * 
 */
class ModelCategories
{
	/*==========================================
	=            Mostrar categorias            =
	==========================================*/
	
	
	static public function mdlViewCategories($table, $item, $value)
	{
		# code...

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

	/*=============================================
	ACTIVAR CATEGORIA
	=============================================*/
	static public function mdlUpdateCategories($table, $item1, $value1, $item2, $value2){


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

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlInsertCategories($table, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $table (categories, route, state, offer, offerPrice, discountOffer, offerImagen, endOffer) VALUES (:categories, :route, :state, :offer, :offerPrice, :discountOffer, :offerImagen, :endOffer)");

		$stmt -> bindParam(":categories", $datos["categories"], PDO::PARAM_STR);
		$stmt -> bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt -> bindParam(":offer", $datos["offer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offerPrice", $datos["offerPrice"], PDO::PARAM_STR);
		$stmt -> bindParam(":discountOffer", $datos["discountOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offerImagen", $datos["offerImagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":endOffer", $datos["endOffer"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;




	}

	/*==========================================
	=            Editar categorias            =
	==========================================*/

	static public function mdlUpdateCategory($table, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET categories = :categories, route= :route, state= :state, offer= :offer, offerPrice= :offerPrice, discountOffer= :discountOffer, offerImagen= :offerImagen, endOffer= :endOffer WHERE id = :id");

		$stmt -> bindParam(":categories", $datos["categories"], PDO::PARAM_STR);
		$stmt -> bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt -> bindParam(":offer", $datos["offer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offerPrice", $datos["offerPrice"], PDO::PARAM_STR);
		$stmt -> bindParam(":discountOffer", $datos["discountOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offerImagen", $datos["offerImagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":endOffer", $datos["endOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;





	}


	/*==========================================
	=            Editar categorias            =
	==========================================*/

	static public function mdlDeleteCategory($table, $id){


		$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");


		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);




		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;


	}
	

	

}
