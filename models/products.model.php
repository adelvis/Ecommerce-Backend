<?php

require_once "conexion.php";

/**
 * 
 */
class ModelProducts
{
	/*=============================================
	=         MOSTRAR TOTAL DE PRODUCTOS           =
	=============================================*/
	static public function mdlViewTotalProducts($table, $order)
	{
		

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY $order DESC");

		
		$stmt->execute();

		return $stmt-> fetchAll();

		$stmt->close();

		$stmt =null;



	}

	/*=============================================
	=       MOSTRAR SUMA VENTAS            =
	=============================================*/
	static public function mdlViewSumSales($table)
	{
		

		$stmt = Conexion::conectar()->prepare("SELECT SUM(sales) as total FROM $table");

		
		$stmt->execute();

		return $stmt-> fetch();

		$stmt->close();

		$stmt =null;



	}

	/*=============================================
	=   Actualizar el estatus del producto   =
	=============================================*/
	static public function mdlUpdateProducts($table, $item1,$value1, $item2, $value2){

		if ($item1=="id_category" && $value1==0){

			$stmt = Conexion::conectar()->prepare("UPDATE products SET id_category=0  WHERE $item2 = :$item2");


		}else{

			if ($item1=="id_subcategory" && $value1==0){

				$stmt = Conexion::conectar()->prepare("UPDATE products SET id_subcategory=0  WHERE $item2 = :$item2");



			}else{

				$stmt = Conexion::conectar()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");
			
				$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);


			}


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
	=   Actualizar oferta producto   =
	=============================================*/

	static public function mdlUpdateOfferProducts($table, $datos, $offerBy, $priceOfferUpdate, $discountOfferUpdate, $idProduct){

		
		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $offerBy= :$offerBy, offer= :offer, priceOffer=:priceOffer, discountOffer=:discountOffer, imgOffer=:imgOffer, endOffer= :endOffer WHERE id= :id");



		$stmt -> bindParam(":".$offerBy, $datos["offer"], PDO::PARAM_STR);
		$stmt -> bindParam(":offer", $datos["offer"], PDO::PARAM_STR);
		$stmt -> bindParam(":priceOffer", $priceOfferUpdate, PDO::PARAM_STR);
		$stmt -> bindParam(":discountOffer", $discountOfferUpdate, PDO::PARAM_STR);
		$stmt -> bindParam(":imgOffer", $datos["offerImagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":endOffer", $datos["endOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $idProduct, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;





	}

	/*==========================================
	=            Mostrar productos            =
	==========================================*/
	
	
	static public function mdlViewProducts($table, $item, $value)
	{
		# code...

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

	/*==========================================
	=           Insertar productos            =
	==========================================*/
	static public function mdlInsertProduct($table, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $table(id_category, id_subcategory, type, route, state, title, headline, description, multimedia, details, price, frontImg, offer, priceOffer, discountOffer, imgOffer, endOffer, weight, delivery) VALUES (:id_category, :id_subcategory, :type, :route, :state, :title, :headline, :description, :multimedia, :details, :price, :frontImg, :offer, :priceOffer, :discountOffer, :imgOffer, :endOffer,  :weight, :delivery)");

		
		

		$stmt->bindParam(":id_category", $datos["id_category"], PDO::PARAM_STR);
		$stmt->bindParam(":id_subcategory", $datos["id_subcategory"], PDO::PARAM_STR);
		$stmt->bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt->bindParam(":headline", $datos["headline"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
		$stmt->bindParam(":details", $datos["details"], PDO::PARAM_STR);
		$stmt->bindParam(":price", $datos["price"], PDO::PARAM_STR);
		$stmt->bindParam(":frontImg", $datos["frontImg"], PDO::PARAM_STR);
		$stmt->bindParam(":offer", $datos["offer"], PDO::PARAM_STR);
		$stmt->bindParam(":priceOffer", $datos["priceOffer"], PDO::PARAM_STR);
		$stmt->bindParam(":discountOffer", $datos["discountOffer"], PDO::PARAM_STR);
		$stmt->bindParam(":imgOffer", $datos["fotoOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":endOffer", $datos["endOffer"], PDO::PARAM_STR);
		$stmt->bindParam(":weight", $datos["weight"], PDO::PARAM_STR);
		$stmt->bindParam(":delivery", $datos["delivery"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;






	}


	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function mdlEditProduct($table, $datos){



		$stmt = Conexion::conectar()->prepare("UPDATE $table SET id_category = :id_category, id_subcategory = :id_subcategory, type = :type, route = :route, state = :state, title = :title, headline = :headline, description = :description, multimedia = :multimedia, details = :details, price = :price, frontImg = :frontImg, offer = :offer, priceOffer = :priceOffer, discountOffer = :discountOffer, imgOffer = :imgOffer, endOffer = :endOffer, weight = :weight, delivery = :delivery WHERE id = :id");

		//$sql= "UPDATE $table SET id_category = :id_category, id_subcategory = :id_subcategory, type = :type, route = :route, state = :state, title = :title, headline = :headline, description = :description, multimedia = :multimedia, details = :details, price = :price, frontImg = :frontImg, offer = :offer, priceOffer = :priceOffer, discountOffer = :discountOffer, imgOffer = :imgOffer, endOffer = :endOffer, weight = :weight, delivery = :delivery WHERE id = :id";

		//return  $sql;

		$stmt->bindParam(":id_category", $datos["id_category"], PDO::PARAM_STR);
		$stmt->bindParam(":id_subcategory", $datos["id_subcategory"], PDO::PARAM_STR);
		$stmt->bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt->bindParam(":route", $datos["route"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $datos["state"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt->bindParam(":headline", $datos["headline"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
		$stmt->bindParam(":details", $datos["details"], PDO::PARAM_STR);
		$stmt->bindParam(":price", $datos["price"], PDO::PARAM_STR);
		$stmt->bindParam(":frontImg", $datos["frontImg"], PDO::PARAM_STR);
		$stmt->bindParam(":offer", $datos["offer"], PDO::PARAM_STR);
		$stmt->bindParam(":priceOffer", $datos["priceOffer"], PDO::PARAM_STR);
		$stmt->bindParam(":discountOffer", $datos["discountOffer"], PDO::PARAM_STR);
		$stmt->bindParam(":imgOffer", $datos["fotoOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":endOffer", $datos["endOffer"], PDO::PARAM_STR);
		$stmt->bindParam(":weight", $datos["weight"], PDO::PARAM_STR);
		$stmt->bindParam(":delivery", $datos["delivery"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/

	static public function mdlDeleteProduct($table, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}