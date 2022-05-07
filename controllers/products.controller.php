<?php


/**
 * 
 */
class ControllerProducts
{
	/*=============================================
	=         MOSTRAR TOTAL DE PRODUCTOS           =
	=============================================*/
	static public function ctrViewTotalProducts($order)
	{
		
			$table ="products";

			$asnwer = ModelProducts::mdlViewTotalProducts($table, $order);

			return $asnwer;



	}

	/*=============================================
	=         MOSTRAR SUMA VENTAS          =
	=============================================*/
	static public function ctrViewSumSales()
	{
		
			$table ="products";

			$asnwer = ModelProducts::mdlViewSumSales($table);

			return $asnwer;



	}

	/*=============================================
	=         MOSTRAR LOS PRIDUCTOS        =
	=============================================*/
	static public function ctrViewProducts($item, $value){


		$table ="products";

		$asnwer = ModelProducts::mdlViewProducts($table, $item, $value);

		return $asnwer;






	}

	/*===================================================
	=  SUBIR MULTIMEDIA        =
	===================================================*/

	static public function ctrSendImageMultimedia($datos, $route){


		if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

			/*====================================================
			=         Definimos medidad imagen      =
			====================================================*/
			list($width, $height) = getimagesize($datos["tmp_name"]);

			$new_Width =1000;

			$new_height=1000;

			/*===============================================================================
			=        Creamos el directorios donde vamos a guardar  la foto multimedia      =
			===============================================================================*/

			
			$directorio = "../views/img/multimedia/".$route;

			/*===============================================================================
			=       Preguntamos si existe un diectorio con esa ruta    =
			===============================================================================*/

			
			
			if (!file_exists($directorio)) {

			   if(!mkdir($directorio, 0755, true)) {


					die('Fallo al crear las carpetas...');


					    
				}
			}

			
			


			/*==================================================================================
			=    De acuerdo al tipo de la imagen aplicamos  las funciones por defecto         =
			===================================================================================*/

			if($datos["type"]=="image/jpeg"){

				/*==========================================
				=    Guardamos la imagen        =
				========================================== */

				$aleatorio = mt_rand(100,999);

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origin = imagecreatefromjpeg($datos["tmp_name"]);

				$destiny = imagecreatetruecolor($new_Width, $new_height);

				imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

				imagejpeg($destiny, $rutaMultimedia);



			} 

			if($datos["type"]=="image/png"){

				/*==========================================
				=    Guardamos la imagen        =
				==========================================*/

				$aleatorio = mt_rand(100,999);

				$rutaMultimedia =$directorio."/".$datos["name"];

				$origin = imagecreatefrompng($datos["tmp_name"]);

				$destiny = imagecreatetruecolor($new_Width, $new_height);

				imagealphablending($destiny, FALSE);

				imagesavealpha($destiny, TRUE);

				imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

				imagepng($destiny, $rutaMultimedia);


				
			}


			return $rutaMultimedia;


		 }


	}


	/*===================================================
	=  CREAR PRODUCTO        =
	===================================================*/

	static public function ctrCreateProduct($datos){

		if(isset($datos["title"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["title"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$datos["description"]) ){

				/*==========================================
				=          Validar imagen portada          =
				==========================================*/

				$rutaPortada ="../views/img/cabeceras/default/default.jpg";


				if(isset($datos["fotoPortada"]["tmp_name"]) && !empty($datos["fotoPortada"]["tmp_name"])){ 


					/*====================================================
					=         Definimos medidad imagen portada          =
					====================================================*/
					list($width, $height) = getimagesize($datos["fotoPortada"]["tmp_name"]);

					$new_Width =1280;

					$new_height=720;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($datos["fotoPortada"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */

						$rutaPortada ="../views/img/cabeceras/".$datos["route"].".jpg";

						$origin = imagecreatefromjpeg($datos["fotoPortada"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $rutaPortada);



					} 

					if($datos["fotoPortada"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/
						$rutaPortada ="../views/img/cabeceras/".$datos["route"].".png";

						$origin = imagecreatefrompng($datos["fotoPortada"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);

						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $rutaPortada);


						
					}
				}

				/*==========================================
				=          Validar imagen principal          =
				==========================================*/

				$rutaFotoPrincipal ="../views/img/productos/default/default.jpg";


				if(isset($datos["frontImg"]["tmp_name"]) && !empty($datos["frontImg"]["tmp_name"])){ 


					/*====================================================
					=         Definimos medidad imagen portada          =
					====================================================*/
					list($width, $height) = getimagesize($datos["frontImg"]["tmp_name"]);

					$new_Width =400;

					$new_height=450;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($datos["frontImg"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */

						$rutaFotoPrincipal ="../views/img/productos/".$datos["route"].".jpg";

						$origin = imagecreatefromjpeg($datos["frontImg"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $rutaFotoPrincipal);



					} 

					if($datos["frontImg"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/
						$rutaFotoPrincipal ="../views/img/productos/".$datos["route"].".png";

						$origin = imagecreatefrompng($datos["frontImg"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);

						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $rutaFotoPrincipal);


						
					}
				}


				/*==========================================
				=          Validar imagen oferta          =
				==========================================*/
				$routeOffer ="";

				if(isset($datos["fotoOferta"]["tmp_name"]) && !empty($datos["fotoOferta"]["tmp_name"])){


					/*=====================================================
					=         Definimos medidad imagen portada          =
					=======================================================*/
					list($width, $height) = getimagesize($datos["fotoOferta"]["tmp_name"]);

					$new_Width =640;

					$new_height=430;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($datos["fotoOferta"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/

						$routeOffer ="../views/img/ofertas/".$datos["route"].".jpg";

						$origin = imagecreatefromjpeg($datos["fotoOferta"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $routeOffer);



					}

					if($datos["fotoOferta"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */
						$routeOffer ="../views/img/ofertas/".$datos["route"].".png";

						$origin = imagecreatefrompng($datos["fotoOferta"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);

						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $routeOffer);
					

						
					} 

				}

				/*======================================================
				  =   preguntamos si viene oferta en camino       =
				========================================================*/
				if($datos["offer"]=="oferta"){

					$datosProduct = array(
									'id_category' =>$datos["id_category"], 
									'id_subcategory' =>$datos["id_subcategory"],
									'type' =>$datos["type"],
									'route' =>$datos["route"],
									'title' =>$datos["title"],
									'state' =>1,
									'headline' =>substr($datos["description"], 0, 255)."...",
									'description'=>$datos["description"],
									'multimedia'=>$datos["multimedia"],
									'details' =>$datos["details"],
									'price' =>$datos["price"],
									'frontImg'=>substr($rutaFotoPrincipal, 3),
									'offer'=>1,
									'priceOffer'=>$datos["priceOffer"],
									'discountOffer'=>$datos["discountOffer"],
									'fotoOferta'=>substr($routeOffer, 3),
									'endOffer'=>$datos["endOffer"],
									'weight'=>$datos["weight"],
									'delivery'=>$datos["delivery"],
									'image'=>substr($rutaPortada, 3),
									'keywords'=>str_replace('"', '', $datos["pClavesProducto"])
								  
								  );





				

				}else{

					$datosProduct = array(
									'id_category' =>$datos["id_category"], 
									'id_subcategory' =>$datos["id_subcategory"],
									'type' =>$datos["type"],
									'route' =>$datos["route"],
									'title' =>$datos["title"],
									'state' =>1,
									'headline' =>substr($datos["description"], 0, 255)."...",
									'description'=>$datos["description"],
									'multimedia'=>$datos["multimedia"],
									'details' =>$datos["details"],
									'price' =>$datos["price"],
									'frontImg'=>substr($rutaFotoPrincipal, 3),
									'offer'=>0,
									'priceOffer'=>0,
									'discountOffer'=>0,
									'fotoOferta'=>null,
									'endOffer'=>null,
									'weight'=>$datos["weight"],
									'delivery'=>$datos["delivery"],
									'image'=>substr($rutaPortada, 3),
									'keywords'=> $datos["pClavesProducto"]
								  
								  );

				


				}



				ModelHeader::mdlInsertHead("openGraph", $datosProduct);

				
				$asnwer = ModelProducts::mdlInsertProduct("products", $datosProduct);


				return $asnwer;




			}else{


				echo "error-validacion";

				return;

			

			}


		}









	}

	/*==========================================
	=           EDITAR UN PRODUCTO            =
	==========================================*/

	static public function ctrEditProduct($datos){


		if(isset($datos["idProducto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloProducto"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$datos["descripcionProducto"]) ){

				/*======================================================================
				=            ELIMINAR LAS FOTOS DE MULTIMEDIA DE LA CARPETA            =
				======================================================================*/
				
				if($datos["tipo"]=="fisico"){

					$item = "id";

					$value = $datos["idProducto"];

					$getProduct = ModelProducts::mdlViewProducts("products", $item, $value);




					foreach ($getProduct as $key => $value) {
						# code...

						$multimediaBD = json_decode($value["multimedia"], true);
						$multimediaEdit  = json_decode($datos["multimedia"], true);

						$objectMultimediaBD = array();
						$objectMultimediaEdit  = array();

						foreach ($multimediaBD as $key => $value) {
							# code...
							array_push($objectMultimediaBD, $value["foto"]);

						}

						foreach ($multimediaEdit as $key => $value) {
							# code...
							array_push($objectMultimediaEdit, $value["foto"]);
							
						}

						$deletePhoto = array_diff($objectMultimediaBD, $objectMultimediaEdit);




						/*function key_compare_func($key1, $key2){

							if($key1 == $key2)
								return 0;
							else if($key1 > $key2)
								return 1;
							else
								return -1;

						}

						$deletePhoto = array_diff_ukey($multimediaBD, $multimediaEdit, "key_compare_func");*/

						foreach ($deletePhoto as $key => $value) {
							# code...

							unlink("../".$value);

						}

						
					}

				}
					
				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$routaPortada = "../".$datos["antiguaFotoPortada"];

				if(isset($datos["fotoPortada"]["tmp_name"]) && !empty($datos["fotoPortada"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink("../".$datos["antiguaFotoPortada"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($width, $height) = getimagesize($datos["fotoPortada"]["tmp_name"]);	

					$new_Width = 1280;
					$new_height = 720;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPortada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						
						$routaPortada = "../views/img/cabeceras/".$datos["rutaProducto"].".jpg";

						$origin = imagecreatefromjpeg($datos["fotoPortada"]["tmp_name"]);						
						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $routaPortada);

					}

					if($datos["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$routaPortada = "../views/img/cabeceras/".$datos["rutaProducto"].".png";

						$origin = imagecreatefrompng($datos["fotoPortada"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);
				
						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $routaPortada);

					}

				}


				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../".$datos["antiguaFotoPrincipal"];

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PRINCIPAL
					=============================================*/

					unlink("../".$datos["antiguaFotoPrincipal"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($width, $height) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$new_Width = 400;
					$new_height = 450;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../views/img/productos/".$datos["rutaProducto"].".jpg";

						$origin = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../views/img/productos/".$datos["rutaProducto"].".png";

						$origin = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);
				
						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $rutaFotoPrincipal);

					}

				}

				/*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = "../".$datos["antiguaFotoOferta"];

				if(isset($datos["fotoOferta"]["tmp_name"]) && !empty($datos["fotoOferta"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO OFERTA
					=============================================*/

					if($datos["antiguaFotoOferta"] != ""){

						unlink("../".$datos["antiguaFotoOferta"]);

					}

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($width, $height) = getimagesize($datos["fotoOferta"]["tmp_name"]);

					$new_Width = 640;
					$new_height = 430;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "../views/img/ofertas/".$datos["rutaProducto"].".jpg";

						$origin = imagecreatefromjpeg($datos["fotoOferta"]["tmp_name"]);						
						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $rutaOferta);

					}

					if($datos["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "../views/img/ofertas/".$datos["rutaProducto"].".png";

						$origin = imagecreatefrompng($datos["fotoOferta"]["tmp_name"]);						
						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);
				
						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $rutaOferta);

					}

				}			


				/*=============================================
				PREGUNTAMOS SI VIENE OFERTE EN CAMINO
				=============================================*/

				if($datos["selActivarOferta"] == "oferta"){

					$datosProduct = array(
								   "id"=>$datos["idProducto"],
								   "title"=>$datos["tituloProducto"],
								   "id_category"=>$datos["categoria"],
								   "id_subcategory"=>$datos["subCategoria"],
								   "type"=>$datos["tipo"],
								   "details"=>$datos["detalles"],
								   "multimedia"=>$datos["multimedia"],
								   "route"=>$datos["rutaProducto"],
								   "state"=> 1,
								   "idHead"=>$datos["idCabecera"],
								   "headline"=> substr($datos["descripcionProducto"], 0, 225)."...",
								   "description"=> $datos["descripcionProducto"],
								   "keywords"=> $datos["pClavesProducto"],
								   "price"=> $datos["precio"],
								   "weight"=> $datos["peso"],
								   "delivery"=> $datos["entrega"],  
								   "frontImg"=>substr($rutaFotoPrincipal,3),
								   "image"=>substr($routaPortada,3),
								   "offer"=>1,
								   "priceOffer"=>$datos["precioOferta"],
								   "discountOffer"=>$datos["descuentoOferta"],
								   "fotoOferta"=>substr($rutaOferta,3),
								   "endOffer"=>$datos["finOferta"]
								   );


				}else{

					$datosProduct = array(
						 		   "id"=>$datos["idProducto"],
								   "title"=>$datos["tituloProducto"],
								   "id_category"=>$datos["categoria"],
								   "id_subcategory"=>$datos["subCategoria"],
								   "type"=>$datos["tipo"],
								   "details"=>$datos["detalles"],
								   "multimedia"=>$datos["multimedia"],
								   "route"=>$datos["rutaProducto"],
								   "state"=> 1,
								   "idHead"=>$datos["idCabecera"],
								   "headline"=> substr($datos["descripcionProducto"], 0, 225)."...",
								   "description"=> $datos["descripcionProducto"],
								   "keywords"=> $datos["pClavesProducto"],
								   "price"=> $datos["precio"],
								   "weight"=> $datos["peso"],
								   "delivery"=> $datos["entrega"],
								   "frontImg"=>substr($rutaFotoPrincipal,3),
								   "image"=>substr($routaPortada,3),
								   "offer"=>0,
								   "priceOffer"=>0,
								   "discountOffer"=>0,
								   "fotoOferta"=>null,								   
								   "endOffer"=>null
								   );

				}


				ModelHeader::mdlUpdateHead("openGraph", $datosProduct);

				$asnwer = ModelProducts::mdlEditProduct("products", $datosProduct);

				return $asnwer;






			}else{


				return "ErrorValTitulo";

				/*echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';*/


			}





		}







	}


	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/

	static public function ctrDeleteProduct(){

		if(isset($_GET["idProducto"])){

			$datos = $_GET["idProducto"];

			/*=============================================
			ELIMINAR MULTIMEDIA
			=============================================*/

			$borrar = glob("views/img/multimedia/".$_GET["rutaCabecera"]."/*");

				foreach($borrar as $file){

					unlink($file);

				}

			rmdir("views/img/multimedia/".$_GET["rutaCabecera"]);

			/*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

			if($_GET["imgPrincipal"] != "" && $_GET["imgPrincipal"] != "views/img/productos/default/default.jpg"){

				unlink($_GET["imgPrincipal"]);		

			}

			/*=============================================
			ELIMINAR OFERTA
			=============================================*/

			if($_GET["imgOferta"] != ""){

				unlink($_GET["imgOferta"]);		

			}

			/*=============================================
			ELIMINAR CABECERA
			=============================================*/

			if($_GET["imgPortada"] != "" && $_GET["imgPortada"] != "views/img/cabeceras/default/default.jpg"){

				unlink($_GET["imgPortada"]);		

			}

			ModelHeader::mdlDeleteHeader("openGraph", $_GET["rutaCabecera"]);

			$respuesta = ModelProducts::mdlDeleteProduct("products", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "products";

								}
							})

				</script>';

			}		



		}

	}
	
	
	

}