<?php


require_once "conexion.php";

/**
 * 
 */
class ModelSlider
{
	/*=============================================
	=            MOSTRAR SLIDER          =
	=============================================*/

	static public function mdlViewSlider($table)
	{
		# code...

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY orden ASC");

	
		$stmt->execute();

		return $stmt-> fetchAll();

		$stmt->close();

		$stmt =null;






	}

	/*=============================================
	=           CREAR SLIDER          =
	=============================================*/
	static public function mdlCreateSlider($table, $datos, $orden){

		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $table (imgBack, typeSlide, styleTextSlide, title1, title2, title3, button, url, orden) VALUES(:imgBack, :typeSlide, :styleTextSlide, :title1, :title2, :title3, :button, :url, :orden)");



		$stmt -> bindParam(":imgBack", $datos["imgBack"], PDO::PARAM_STR);
		$stmt -> bindParam(":typeSlide", $datos["typeSlide"], PDO::PARAM_STR);
		$stmt -> bindParam(":styleTextSlide", $datos["styleTextSlide"], PDO::PARAM_STR);
		$stmt -> bindParam(":title1", $datos["title1"], PDO::PARAM_STR);
		$stmt -> bindParam(":title2", $datos["title2"], PDO::PARAM_STR);
		$stmt -> bindParam(":title3", $datos["title3"], PDO::PARAM_STR);
		$stmt -> bindParam(":button", $datos["button"], PDO::PARAM_STR);
		$stmt -> bindParam(":url", $datos["url"], PDO::PARAM_STR);
		$stmt -> bindParam(":orden", $orden, PDO::PARAM_STR);


		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null; 

		

	}



	/*=============================================
	=           Actualizar orden slide       =
	=============================================*/

	static public function mdlUpdateOrderSlide($table, $datos){


		
		$stmt = Conexion::conectar()->prepare("UPDATE $table SET orden = :orden WHERE id = :id");

		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;





	}


	/*=============================================
	=           Actualizar  slide       =
	=============================================*/

	static public function mdlUpdateSlide($table, $datos, $routeBack, $routeProduct){


		$stmt = Conexion::conectar()->prepare("UPDATE $table SET name = :name, typeSlide = :typeSlide, styleTextSlide = :styleTextSlide, styleImgProduct = :styleImgProduct, imgBack = :imgBack, imgProduct = :imgProduct, title1 = :title1, title2 = :title2, title3 = :title3, button = :button , url = :url   WHERE id = :id");


		

		$stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt->bindParam(":typeSlide", $datos["typeSlide"], PDO::PARAM_STR);
		$stmt->bindParam(":styleTextSlide", $datos["styleTextSlide"], PDO::PARAM_STR);
		$stmt->bindParam(":styleImgProduct", $datos["styleImgProduct"], PDO::PARAM_STR);
		$stmt->bindParam(":imgBack", $routeBack, PDO::PARAM_STR);
		$stmt->bindParam(":imgProduct", $routeProduct, PDO::PARAM_STR);
		$stmt->bindParam(":title1", $datos["title1"], PDO::PARAM_STR);
		$stmt->bindParam(":title2", $datos["title2"], PDO::PARAM_STR);
		$stmt->bindParam(":title3", $datos["title3"], PDO::PARAM_STR);
		$stmt->bindParam(":button", $datos["button"], PDO::PARAM_STR);
		$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;






	}



	/*=============================================
	=           Borrar  slide       =
	=============================================*/

	static public function mdlDeleteSlide($table, $id){


		$stmt = Conexion::conectar()->prepare("DELETE FROM $table  WHERE id = :id");


		
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;






	}
	

}