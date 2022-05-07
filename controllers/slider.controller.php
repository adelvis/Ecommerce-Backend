<?php

/**
 * 
 */
class ControllerSlider
{
	
	/*=============================================
	=            MOSTRAR SLIDER          =
	=============================================*/
		
	static public function ctrViewSlider()
	{
		# code...
		$table = "slide";

		$aswner = ModelSlider::mdlViewSlider($table);

		return $aswner;
	}

	/*=============================================
	=           CREAR SLIDER          =
	=============================================*/

	static public function ctrCreateSlide($datos){

		

		$table = "slide";

		$getSlide =  ModelSlider::mdlViewSlider($table);



		foreach ($getSlide as $key => $value) {
			# code...
		}



		$orden = $value["orden"]+1;



		$aswner = ModelSlider::mdlCreateSlider($table, $datos, $orden);

		return $aswner;

	


	}

	/*=============================================
	=           Actualizar orden slide       =
	=============================================*/

	static public function ctrUpdateOrderSlide($datos){


		$table = "slide";

		$aswner = ModelSlider::mdlUpdateOrderSlide($table, $datos);

		return $aswner;






	}

	/*=============================================
	=           Actualizar  slide       =
	=============================================*/

	static public function ctrUpdateSlide($datos){

		$table = "slide";
		$route1=null;
		$route2=null;
		/*=================================================
		=     Si hay cambio del fondo de la imagen       =
		==================================================*/



		if($datos["fileBack"] != null){

			/*=================================================
			=  Borramos el fondo antiguo    =
			==================================================*/



			if($datos["imgBack"] != "views/img/slide/default/fondo.jpg"){

				unlink("../".$datos["imgBack"]);


			}

			/*=================================================
			=  Creamos el nuevo directorio  =
			==================================================*/

			
			$dir =  "../views/img/slide/slide".$datos["id"];

			if (!file_exists($dir)) {

			   if(!mkdir($dir, 0755, true)) {


					die('Fallo al crear las carpetas...');


					    
				}
			}

			
			

			/*=================================================
			= Capturamos el ancho y alto del fondo =
			==================================================*/

			list($width, $height) = getimagesize($datos["fileBack"]["tmp_name"]);

			$new_Width =1600;

			$new_height=520;

			$destiny = imagecreatetruecolor($new_Width, $new_height);

			if($datos["fileBack"]["type"]=="image/jpeg"){

					$route1 = $dir."/fondo.jpg";

					$origin = imagecreatefromjpeg($datos["fileBack"]["tmp_name"]);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $route1);



			}

			if($datos["fileBack"]["type"]=="image/png"){

					$route1 = $dir."/fondo.png";

					$origin = imagecreatefrompng($datos["fileBack"]["tmp_name"]);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $route1);



			}

			$routeBack = substr($route1, 3);




		}else{


			$routeBack = $datos["imgBack"];
		}

		/*=================================================
		=     Si hay cambio del fondo de la imagen       =
		==================================================*/

		if($datos["fileImgProduct"] != null){

			/*=================================================
			=  Creamos el nuevo directorio  =
			==================================================*/

			
			$dir =  "../views/img/slide/slide".$datos["id"];

			if (!file_exists($dir)) {

			   if(!mkdir($dir, 0755, true)) {


					die('Fallo al crear las carpetas...');


					    
				}
			}

			
			/*=================================================
			= Capturamos el ancho y alto del fondo =
			==================================================*/

			list($width, $height) = getimagesize($datos["fileImgProduct"]["tmp_name"]);

			$new_Width =600;

			$new_height=600;

			$destiny = imagecreatetruecolor($new_Width, $new_height);

			if($datos["fileImgProduct"]["type"]=="image/jpeg"){

					$route2 = $dir."/producto.jpg";

					$origin = imagecreatefromjpeg($datos["fileImgProduct"]["tmp_name"]);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $route2);



			}


			if($datos["fileImgProduct"]["type"]=="image/png"){

					$route2 = $dir."/producto.png";

					$origin = imagecreatefrompng($datos["fileImgProduct"]["tmp_name"]);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $route2);



			}

			$routeProduct = substr($route2, 3);

		} else{

			$routeProduct = $datos["imgProduct"];

		}

		$aswner = ModelSlider::mdlUpdateSlide($table, $datos, $routeBack, $routeProduct);

		return $aswner;


	}


	/*=============================================
	=           ELIMINAR SLIDER          =
	=============================================*/

	public function ctrDeleteSlide(){


		if(isset($_GET["idSlide"])){

			if($_GET["imgFondo"] !="views/img/slide/default/fondo.jpg"){


				unlink($_GET["imgFondo"]);


			}

			if($_GET["imgProducto"] !=""){

				unlink($_GET["imgProducto"]);

			}

			rmdir("views/img/slide/slide".$_GET["idSlide"]);

			$table = "slide";
			$id= $_GET["idSlide"];

			$aswner = ModelSlider::mdlDeleteSlide($table, $id);

			if($aswner =="ok"){

				echo '<script>

					
				swal({
				      title: "Cambios guardados",
				      text: "¡El Slide ha sido borrado correctamente!",
				      type: "success",
				      showConfirmButton: true,
				      confirmButtonText: "¡Cerrar!"
				    }).then((result)=>{

				    	if(result.value){

				    		window.location ="slider"; 
				    	}

				    })

				    </script>'; 


			}


		}




	}



}