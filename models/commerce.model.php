
<?php

require_once "conexion.php";
/**
 * 
 */
class ModelCommerce
{
	/*=============================================
	=          SELECCIONAR PLANTILLA         =
	=============================================*/
	static public function mdlSelectTemplate($table)
	{
		# code...

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ");

	
		$stmt->execute();

		return $stmt-> fetch();

		$stmt->close();

		$stmt =null;




	}


	/*=============================================
	=         ACTUALIZAR LOGO -ICONO       =
	=============================================*/
	static public function mdlUpdateLogoIcono($table, $id, $item, $value){


		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $item = :$item WHERE id= :id");



		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

		$stmt-> bindParam(":id", $id, PDO::PARAM_STR);

	

		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;




	}

	/*=============================================
	=         ACTUALIZAR COLORS      =
	=============================================*/
	static public function mdlUpdateColors($table, $id, $datos){


		$stmt = Conexion::conectar()->prepare("UPDATE $table SET barraSuperior = :barraSuperior, textoSuperior=:textoSuperior, colorFondo= :colorFondo, colorTexto = :colorTexto WHERE id= :id");



		$stmt -> bindParam(":barraSuperior", $datos["barraSuperior"], PDO::PARAM_STR);
		$stmt -> bindParam(":textoSuperior", $datos["textoSuperior"], PDO::PARAM_STR);
		$stmt -> bindParam(":colorFondo", $datos["colorFondo"], PDO::PARAM_STR);
		$stmt -> bindParam(":colorTexto", $datos["colorTexto"], PDO::PARAM_STR);
		$stmt-> bindParam(":id", $id, PDO::PARAM_INT);

	

		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;




	}

	/*=============================================
	=        ACTUALIZAR SCRIPT     =
	=============================================*/
	static public function mdlUpdateScript($table, $id, $datos){


		$stmt = Conexion::conectar()->prepare("UPDATE $table SET apiFacebook = :apiFacebook, pixelFacebook=:pixelFacebook, googleAnalytics= :googleAnalytics WHERE id= :id");



		$stmt -> bindParam(":apiFacebook", $datos["apiFacebook"], PDO::PARAM_STR);
		$stmt -> bindParam(":pixelFacebook", $datos["pixelFacebook"], PDO::PARAM_STR);
		$stmt -> bindParam(":googleAnalytics", $datos["googleAnalytics"], PDO::PARAM_STR);
		$stmt-> bindParam(":id", $id, PDO::PARAM_INT);

	

		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;




	}

	/*=============================================
	=        SELECCIONAR COMERCIO    =
	=============================================*/
	static public function mdlSelectCommerce($table)
	{
		# code...

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ");

	
		$stmt->execute();

		return $stmt-> fetch();

		$stmt->close();

		$stmt =null;




	}
	
	/*====================================================
	// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN DEL COMERCIO
	=====================================================*/
	static public function mdlUpdateCommerce($table, $id, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET tax= :tax, national_delivery = :national_delivery, international_delivery = :international_delivery, tax_min_nat= :tax_min_nat, tax_min_int = :tax_min_int, country = :country, modoPaypal = :modoPaypal, clientIdPaypal = :clientIdPaypal, keySecretPaypal = :keySecretPaypal, modoPayu= :modoPayu, merchantIdPayu = :merchantIdPayu, accountIdPayu = :accountIdPayu, apiKeyPayu = :apiKeyPayu, emailCommerce = :emailCommerce, name = :name, phone = :phone, emailContact = :emailContact, address = :address WHERE id= :id");



		$stmt -> bindParam(":tax", $datos["impuesto"], PDO::PARAM_STR);
		$stmt -> bindParam(":national_delivery", $datos["envioNacional"], PDO::PARAM_STR);
		$stmt -> bindParam(":international_delivery", $datos["envioInternacional"], PDO::PARAM_STR);
		$stmt -> bindParam(":tax_min_nat", $datos["tasaMinimaNal"], PDO::PARAM_STR);
		$stmt -> bindParam(":tax_min_int", $datos["tasaMinimaInt"], PDO::PARAM_STR);
		$stmt -> bindParam(":country", $datos["seleccionarPais"], PDO::PARAM_STR);
		$stmt -> bindParam(":modoPaypal", $datos["modoPaypal"], PDO::PARAM_STR);
		$stmt -> bindParam(":clientIdPaypal", $datos["clienteIdPaypal"], PDO::PARAM_STR);
		$stmt -> bindParam(":keySecretPaypal", $datos["llaveSecretaPaypal"], PDO::PARAM_STR);
		$stmt -> bindParam(":modoPayu", $datos["modoPayu"], PDO::PARAM_STR);
		$stmt -> bindParam(":merchantIdPayu", $datos["merchantIdPayu"], PDO::PARAM_STR);
		$stmt -> bindParam(":accountIdPayu", $datos["accountIdPayu"], PDO::PARAM_STR);
		$stmt -> bindParam(":apiKeyPayu", $datos["apiKeyPayu"], PDO::PARAM_STR);
		$stmt -> bindParam(":emailCommerce", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone", $datos["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":emailContact", $datos["emailContact"], PDO::PARAM_STR);
		$stmt -> bindParam(":address", $datos["address"], PDO::PARAM_STR);
		$stmt->  bindParam(":id", $id, PDO::PARAM_INT);

	

		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;





	}



	
}