<?php


require_once "conexion.php";


/**
 * 
 */
class ModelSubCategories
{
	/*=============================================
	=   Actualizar el estatus de la subcagorias   =
	=============================================*/

	static public function mdlUpdateSubCategories($table, $item1, $value1, $item2, $value2){


		if ($item1=="id_categories" && $value1==0){

			$stmt = Conexion::conectar()->prepare("UPDATE $table SET id_categories = 0 WHERE $item2 = :$item2");

		}else{

			$stmt = Conexion::conectar()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);

		}

		
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
	=   Actualizar oferta subcagorias   =
	=============================================*/


	static public function mdlUpdateOfferSubCategories($table, $datos, $offerBy){

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $offerBy= :$offerBy, offer= :offer, offerPrice=:offerPrice, discountOffer=:discountOffer, offerImagen=:offerImagen, endOffer= :endOffer WHERE id_categories= :id_categories");

		$stmt -> bindParam(":".$offerBy, $datos["offer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offer", $datos["offer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offerPrice", $datos["offerPrice"], PDO::PARAM_STR);
		$stmt -> bindParam(":discountOffer", $datos["discountOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offerImagen", $datos["offerImagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":endOffer", $datos["endOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_categories", $datos["id"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;







	}


	/*=============================================
	=   Mostra las Subcategorias  =
	=============================================*/


	static public function mdlViewSubCategories($table, $item, $value){

		if($item !=null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt-> fetchAll();



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
	CREAR CATEGORIA
	=============================================*/


	static public function mdlInsertSubCategories($table, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $table (id_categories, subcategory, route, state, offerByCategory, offer, offerPrice, discountOffer, offerImagen, endOffer) VALUES (:id_categories, :subcategory, :route, :state, :offerByCategory, :offer, :offerPrice, :discountOffer, :offerImagen, :endOffer");



		$stmt -> bindParam(":subcategory", $datos["subcategory"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_categories", $datos["id_categories"], PDO::PARAM_STR);
		$stmt -> bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt -> bindParam(":offerByCategory", $datos["offerByCategory"], PDO::PARAM_STR);
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


	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlUpdateSubCategory($table, $datos){


		$stmt = Conexion::conectar()->prepare("UPDATE $table SET id_categories = :id_categories, subcategory = :subcategory, route= :route, state= :state, offer= :offer, offerPrice= :offerPrice, discountOffer= :discountOffer, offerImagen= :offerImagen, endOffer=  :endOffer WHERE id = :id") ;



		$stmt -> bindParam(":subcategory", $datos["subcategory"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_categories", $datos["id_categories"], PDO::PARAM_STR);
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
	=            ELIMINAR categorias            =
	==========================================*/

	static public function mdlDeleteSubCategory($table, $id){


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
