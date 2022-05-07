<?php




/**
 * 
 */
class ControllerSubCategories
{
	
	/*===================================================
			=    MOSTRAR  SUB CATEGORIA          =
	===================================================*/
	static public function ctrViewSubCategories($item, $value){


		$table = "subcategory";

		$aswner = ModelSubCategories::mdlViewSubCategories($table, $item, $value);


		return $aswner;





	}

	/*===================================================
			=    CREAR  SUB CATEGORIA          =
	===================================================*/

	static public function ctrCreateSubCategory(){

		if(isset($_POST["tituloSubCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloSubCategoria"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionSubCategoria"]) ){


				/*==========================================
				=          Validar imagen portada          =
				==========================================*/

				$rutaPortada ="views/img/cabeceras/default/default.jpg";


				if(isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])){ 


					/*====================================================
					=         Definimos medidad imagen portada          =
					====================================================*/
					list($width, $height) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$new_Width =1280;

					$new_height=720;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($_FILES["fotoPortada"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */

						$rutaPortada ="views/img/cabeceras/".$_POST["rutaCategoria"].".jpg";

						$origin = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $rutaPortada);



					} 

					if($_FILES["fotoPortada"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/
						$rutaPortada ="views/img/cabeceras/".$_POST["rutaCategoria"].".png";

						$origin = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);

						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $rutaPortada);


						
					}
				}


				/*==========================================
				=          Validar imagen oferta          =
				==========================================*/
				$routeOffer ="";

				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){


					/*=====================================================
					=         Definimos medidad imagen portada          =
					=======================================================*/
					list($width, $height) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);

					$new_Width =640;

					$new_height=430;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($_FILES["fotoOferta"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/

						$routeOffer ="views/img/ofertas/".$_POST["rutaCategoria"].".jpg";

						$origin = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $routeOffer);



					}

					if($_FILES["fotoOferta"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */
						$routeOffer ="views/img/ofertas/".$_POST["rutaCategoria"].".png";

						$origin = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);

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
				if($_POST["selActivarOferta"]=="oferta"){

					$datos = array("subcategory"=>$_POST["tituloSubCategoria"],
								   "id_categories"=>$_POST["seleccionarCategoria"],
								   "route"=>$_POST["rutaSubCategoria"],
								   "state"=> 1,
								   "offerByCategory"=>0,
								   "title"=>$_POST["tituloSubCategoria"],
								   "description"=> $_POST["descripcionSubCategoria"],
								   "keywords"=>$_POST["pClavesSubCategoria"],
								   "image"=>$rutaPortada,
								   "offer"=>1,
								   "offerPrice"=>$_POST["precioOferta"],
								   "discountOffer"=>$_POST["descuentoOferta"],
								   "offerImagen"=>$routeOffer,								   
								   "endOffer"=>$_POST["finOferta"]);

				

				}else{


					$datos = array("subcategory"=>$_POST["tituloSubCategoria"],
								   "id_categories"=>$_POST["seleccionarCategoria"],
								   "route"=>$_POST["rutaSubCategoria"],
								   "state"=> 1,
								   "offerByCategory"=>0,
								   "title"=>$_POST["tituloSubCategoria"],
								   "description"=> $_POST["descripcionSubCategoria"],
								   "keywords"=>$_POST["pClavesSubCategoria"],
								   "image"=>$rutaPortada,
								   "offer"=>0,
								   "offerPrice"=>0,
								   "discountOffer"=>0,
								   "offerImagen"=>null,								   
								   "endOffer"=>null);


					// `id`, `id_categories`, `subcategory`, `route`, `state`, `offerByCategory`, `offer`, `offerPrice`, `discountOffer`, `offerImagen`, `endOffer`, `dateReg`

					// (`id`, `route`, `title`, `description`, `keywords`, `image`, 

				}



				$aswner = ModelSubCategories::mdlInsertSubCategories("subcategory", $datos);


				if($aswner == "ok"){

					ModelHeader::mdlInsertHead("openGraph", $datos);

					echo'<script>

						swal({
							  type: "success",
							  title: "La Subcategoría ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "subcategory";

								}
							})

						</script>';

				}else {

					echo'<script>

						swal({

								title: "Error",
								text : "¡La categoría no pudo guardarse!",
								type : "error",
								showConfirmButton:"Cerrar"
								confirmButtonText: "¡Cerrar!"

							});

						</script>';

				}







			}else{

				echo '<script>

							swal({

								title: "Error",
								text : "¡La categoría no puede ir vacía o llevar caracteres especiales!",
								type : "error",
								showConfirmButton:"Cerrar"
								confirmButtonText: "¡Cerrar!"

							});




					</script>
				';

				return;







			}





		}





	}


	/*===================================================
			=    EDITAR  SUB CATEGORIA          =
	===================================================*/

	static public function ctrUpdateSubCategory(){


		if(isset($_POST["editartituloSubCategoria"])){


			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartituloSubCategoria"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionSubCategoria"]) ){


				/*==========================================
				=          Validar imagen portada          =
				==========================================*/

				$rutaPortada =$_POST["antiguaFotoPortada"];

				if(isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])){ 

					/*==========================================
					=         Borrar antigua imagen portada          =
					=========================================*/
					unlink($_POST["antiguaFotoPortada"]);

					/*====================================================
					=         Definimos medidad imagen portada          =
					====================================================*/
					list($width, $height) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$new_Width =1280;

					$new_height=720;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($_FILES["fotoPortada"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */

						$rutaPortada ="views/img/cabeceras/".$_POST["rutaSubCategoria"].".jpg";

						$origin = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $rutaPortada);



					} 

					if($_FILES["fotoPortada"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/
						$rutaPortada ="views/img/cabeceras/".$_POST["rutaSubCategoria"].".png";

						$origin = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);

						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $rutaPortada);


						
					}
				}

					/*==========================================
				=          Validar imagen oferta          =
				==========================================*/
				$routeOffer =$_POST["antiguaFotoOferta"];

				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){

					/*=====================================================
					=        Borramos antigua foto oferta         =
					=======================================================*/

					unlink($_POST["antiguaFotoOferta"]);

					/*=====================================================
					=         Definimos medidad imagen portada          =
					=======================================================*/
					list($width, $height) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);

					$new_Width =640;

					$new_height=430;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($_FILES["fotoOferta"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/

						$routeOffer ="views/img/ofertas/".$_POST["rutaSubCategoria"].".jpg";

						$origin = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $routeOffer);



					}

					if($_FILES["fotoOferta"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */
						$routeOffer ="views/img/ofertas/".$_POST["rutaSubCategoria"].".png";

						$origin = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);

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
				if($_POST["selActivarOferta"]=="oferta"){

					$datos = array("id"=>$_POST["editarIdSubCategoria"],
								   "subcategory"=>$_POST["editartituloSubCategoria"],
								   "id_categories"=>$_POST["seleccionarCategoria"],
								   "route"=>$_POST["rutaSubCategoria"],
								   "state"=> 1,
								   "title"=>$_POST["editartituloSubCategoria"],
								   "idHead"=>$_POST["editarIdCabecera"],
								   "description"=> $_POST["descripcionSubCategoria"],
								   "keywords"=>$_POST["pClavesCategoria"],
								   "image"=>$rutaPortada,
								   "offer"=>1,
								   "offerPrice"=>$_POST["precioOferta"],
								   "discountOffer"=>$_POST["descuentoOferta"],
								   "offerImagen"=>$routeOffer,								   
								   "endOffer"=>$_POST["finOferta"]);

				

				}else{


					$datos = array("id"=>$_POST["editarIdSubCategoria"],
								   "subcategory"=>$_POST["editartituloSubCategoria"],
								   "id_categories"=>$_POST["seleccionarCategoria"],
								   "route"=>$_POST["rutaSubCategoria"],
								   "state"=> 1,
								   "title"=>$_POST["editartituloSubCategoria"],
								   "idHead"=>$_POST["editarIdCabecera"],
								   "description"=> $_POST["descripcionSubCategoria"],
								   "keywords"=>$_POST["pClavesCategoria"],
								   "image"=>$rutaPortada,
								   "offer"=>0,
								   "offerPrice"=>0,
								   "discountOffer"=>0,
								   "offerImagen"=>null,								   
								   "endOffer"=>null);


					if($_POST["antiguaFotoOferta"] !=""){

						unlink($_POST["antiguaFotoOferta"]);


					}



					// `id`, `id_categories`, `subcategory`, `route`, `state`, `offerByCategory`, `offer`, `offerPrice`, `discountOffer`, `offerImagen`, `endOffer`, `dateReg`

					// (`id`, `route`, `title`, `description`, `keywords`, `image`, 

				}


				$products= ModelProducts::mdlViewProducts("products", "id_subcategory", $datos["id"]);

				foreach ($products as $key => $value) {

			 	# code...
				 	$priceOfferUpdate = 0;
					$discountOfferUpdate = 0;

				 	if($datos["offer"]!=0 && $datos["offerPrice"]==0){

				 		if($value["price"] != 0){

							$priceOfferUpdate = $value["price"]-($value["price"]*$datos["discountOffer"]/100);
							$discountOfferUpdate = $datos["discountOffer"];

						}else{

							$priceOfferUpdate = 0;
							$discountOfferUpdate = 0;

						}



				 	}


					if($datos["offer"] != 0 && $datos["discountOffer"] == 0){

						if($value["price"] != 0){

							$priceOfferUpdate = $datos["offerPrice"];
							$discountOfferUpdate = 100 - ($datos["offerPrice"]*100/$value["price"]);


						}else{

							$priceOfferUpdate = 0;
							$discountOfferUpdate = 0;

						}
						
					}


					ModelProducts::mdlUpdateOfferProducts("products", $datos, "offeredBySubCategory", $priceOfferUpdate, $discountOfferUpdate, $value["id"]);



				}


			
				ModelHeader::mdlUpdateHead("openGraph", $datos);

				

				$aswner = ModelSubCategories::mdlUpdateSubCategory("subcategory", $datos);


				if($aswner == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategory";

							}
						})

					</script>';

				}



				}else{


					echo '<script>

							swal({

								title: "Error",
								text : "¡La categoría no puede ir vacía o llevar caracteres especiales!",
								type : "error",
								showConfirmButton:"Cerrar"
								confirmButtonText: "¡Cerrar!"

							});




					</script>
					';

				return;


			}	




		}






	}

	/*===================================================
			=    ELIMINAR  SUB CATEGORIA          =
	===================================================*/
	static public function ctrDeleteSubCategory(){

		if(isset($_GET["idSubCategoria"])){

			$datos = $_GET["idSubCategoria"];

			/*=============================================
			ELIMINAR IMAGEN OFERTA
			=============================================*/

			if($_GET["imgOferta"] != ""){

				unlink($_GET["imgOferta"]);		

			}

			/*=============================================
			ELIMINAR CABECERA
			=============================================*/

			if($_GET["imgPortada"] != "" && $_GET["imgPortada"] != "vistas/img/cabeceras/default/default.jpg"){

				unlink($_GET["imgPortada"]);		

			}

			ModelHeader::mdlDeleteHeader("openGraph", $_GET["rutaCabecera"]);

			/*=============================================
			QUITAR LAS SUBATEGORIAS DE LOS PRODUCTOS
			=============================================*/


			ModelProducts::mdlUpdateProducts("products", "id_subcategory",0, "id_subcategory",$datos);

			$aswner = ModelSubCategories::mdlDeleteSubCategory("subcategory", $datos);


			if($aswner == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La subcategoría ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategory";

								}
							})

				</script>';

			}		













		}





	}



}