<?php


/**
 * 
 */
class ControllerCommerce
{
	
	/*=============================================
	=          SELECCIONAR PLANTILLA         =
	=============================================*/
	
	static public function ctrSelectTemplate(){

		$table = "plantilla";

		$asnwer = ModelCommerce::mdlSelectTemplate($table);


		return $asnwer;




	}


	/*=============================================
	=        ACTUALIZAR LOGOTIPO/ICONO     =
	=============================================*/
	static public function ctrUpdateLogoIcono($item, $value){

		$table = "plantilla";

		$id= 1;

		$template = ModelCommerce::mdlSelectTemplate($table);

		$valueNew = $value;
		
		if(isset($value["tmp_name"])){

			list($width, $height) = getimagesize($value["tmp_name"]);

			/*=============================================
			=        CAMBIAR LOGOTIPO     =
			=============================================*/

			if($item=="logo"){



				unlink("../".$template["logo"]);

				$new_Width =500;

				$new_height=100;

				$destiny = imagecreatetruecolor($new_Width, $new_height);

				

				if($value["type"]=="image/jpeg"){

					$rout = "../views/img/plantilla/logo.jpg";

					$origin = imagecreatefromjpeg($value["tmp_name"]);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $rout);



				}

				if($value["type"]=="image/png"){

					$rout = "../views/img/plantilla/logo.png";

					$origin = imagecreatefrompng($value["tmp_name"]);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $rout);



				}


			}

			/*=============================================
			=        CAMBIAR ICONO     =
			=============================================*/
			if($item=="icono"){


				unlink("../".$template["icono"]);

				$new_Width =100;

				$new_height=100;

				$destiny = imagecreatetruecolor($new_Width, $new_height);

				

				if($value["type"]=="image/jpeg"){

					$rout = "../views/img/plantilla/icono.jpg";

					$origin = imagecreatefromjpeg($value["tmp_name"]);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $rout);



				}

				if($value["type"]=="image/png"){

					$rout = "../views/img/plantilla/icono.png";

					$origin = imagecreatefrompng($value["tmp_name"]);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $rout);



				}


				
			}

			$valueNew = substr($rout, 3);

		}

		$asnwer = ModelCommerce::mdlUpdateLogoIcono($table, $id, $item, $valueNew);

		return $asnwer;


	}


	/*=============================================
	=        ACTUALIZAR COLOR     =
	=============================================*/

	static public function ctrUpdateColors($datos){

		$table = "plantilla";

		$id= 1;

		$template = ModelCommerce::mdlUpdateColors($table, $id, $datos);

		return $template;



	}

	/*=============================================
	=        ACTUALIZAR SCRIPT     =
	=============================================*/

	static public function ctrUpdateScript($datos){

		$table = "plantilla";

		$id= 1;

		$template = ModelCommerce::mdlUpdateScript($table, $id, $datos);

		return $template;



	}

	/*=============================================
	=        SELECCIONAR COMERCIO    =
	=============================================*/
	static public function ctrSelectCommerce(){

		$table = "commerce";

		$asnwer = ModelCommerce::mdlSelectCommerce($table);


		return $asnwer;





	}

	/*====================================================
	// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN DEL COMERCIO
	=====================================================*/

	static public function ctrUpdateCommerce($datos){


		$table = "commerce";

		$id= 1;

		$commerce = ModelCommerce::mdlUpdateCommerce($table, $id, $datos);

		return $commerce;




	}

	
	
}