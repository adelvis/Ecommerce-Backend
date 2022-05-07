<?php



/**
 * 
 */
class ControllerCategories
{
	/*==========================================
	=            Mostrar categorias            =
	==========================================*/
	
	
	static public function ctrViewCategories($item, $value){

		$table ="categories";

		$aswner = ModelCategories::mdlViewCategories($table, $item, $value);


		return $aswner;




	}

	/*==========================================
	=            Agregar categorias            =
	==========================================*/

	static public function ctrCreateCategory(){


		if(isset($_POST["tituloCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloCategoria"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionCategoria"]) ){

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

					$datos = array("categories"=>strtoupper($_POST["tituloCategoria"]),
								   "route"=>$_POST["rutaCategoria"],
								   "state"=> 1,
								   "title"=>$_POST["tituloCategoria"],
								   "description"=> $_POST["descripcionCategoria"],
								   "keywords"=>$_POST["pClavesCategoria"],
								   "image"=>$rutaPortada,
								   "offer"=>1,
								   "offerPrice"=>$_POST["precioOferta"],
								   "discountOffer"=>$_POST["descuentoOferta"],
								   "offerImagen"=>$routeOffer,								   
								   "endOffer"=>$_POST["finOferta"]);

				

				}else{


					$datos = array("categories"=>strtoupper($_POST["tituloCategoria"]),
								   "route"=>$_POST["rutaCategoria"],
								   "state"=> 1,
								   "title"=>$_POST["tituloCategoria"],
								   "description"=> $_POST["descripcionCategoria"],
								   "keywords"=>$_POST["pClavesCategoria"],
								   "image"=>$rutaPortada,
								   "offer"=>0,
								   "offerPrice"=>0,
								   "discountOffer"=>0,
								   "offerImagen"=>null,								   
								   "endOffer"=>null);



					//`categories`, `route`, `state`, `offer`, `offerPrice`, `discountOffer`, `offerImagen`, `endOffer`, 

					// (`id`, `route`, `title`, `description`, `keywords`, `image`, 

				}



				

				$aswner = ModelCategories::mdlInsertCategories("categories", $datos);


				if($aswner == "ok"){

					ModelHeader::mdlInsertHead("openGraph", $datos);

					echo'<script>

						swal({
							  type: "success",
							  title: "La categoría ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "categories";

								}
							})

						</script>';

				}else {

					echo'<script>

						swal({
							  type: "error",
							  title: "La categoría no ha sido guardada",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
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
	/*==========================================
	=            Editar categorias            =
	==========================================*/

	static public function ctrEditCategory(){

		if(isset($_POST["editarTituloCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloCategoria"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionCategoria"]) ){

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

					$datos = array("id"=>$_POST["editarIdCategoria"],
								   "categories"=>strtoupper($_POST["editarTituloCategoria"]),
								   "route"=>$_POST["rutaCategoria"],
								   "state"=> 1,
								   "idHead"=>$_POST["editarIdCabecera"],
								   "title"=>$_POST["editarTituloCategoria"],
								   "description"=> $_POST["descripcionCategoria"],
								   "keywords"=>$_POST["pClavesCategoria"],
								   "image"=>$rutaPortada,
								   "offer"=>1,
								   "offerPrice"=>$_POST["precioOferta"],
								   "discountOffer"=>$_POST["descuentoOferta"],
								   "offerImagen"=>$routeOffer,								   
								   "endOffer"=>$_POST["finOferta"]);



				}else{


					$datos = array("id"=>$_POST["editarIdCategoria"],
								   "categories"=>strtoupper($_POST["editarTituloCategoria"]),
								   "route"=>$_POST["rutaCategoria"],
								   "state"=> 1,
								   "idHead"=>$_POST["editarIdCabecera"],
								   "title"=>$_POST["editarTituloCategoria"],
								   "description"=> $_POST["descripcionCategoria"],
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

					



					//`categories`, `route`, `state`, `offer`, `offerPrice`, `discountOffer`, `offerImagen`, `endOffer`, 

					// (`id`, `route`, `title`, `description`, `keywords`, `image`, 

				}

				
				ModelSubCategories::mdlUpdateOfferSubCategories("subcategory", $datos, "offerByCategory");

				$products= ModelProducts::mdlViewProducts("products", "id_category", $datos["id"]);

				
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





					ModelProducts::mdlUpdateOfferProducts("products", $datos, "offeredByCategory", $priceOfferUpdate, $discountOfferUpdate, $value["id"]);


				 }

				
				
				ModelHeader::mdlUpdateHead("openGraph", $datos);

				$aswner = ModelCategories::mdlUpdateCategory("categories", $datos);

				if($aswner == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categories";

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

	/*==========================================
	=            Eliminar categorias            =
	==========================================*/

	static public function ctrDeleteCategory(){


		if(isset($_GET["idCategoria"])){


			/*=============================================
			ELIMINAR IMAGEN OFERTA
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

			/*=============================================
			QUITAR LAS CATEGORIAS DE LAS SUBCATEGORIAS
			=============================================*/

			ModelSubCategories::mdlUpdateSubCategories("subcategory", "id_categories", 0, "id_categories", $_GET["idCategoria"]);


			/*=============================================
			QUITAR LAS CATEGORIAS DE LOS PRODUCTOS
			=============================================*/

			ModelProducts::mdlUpdateProducts("products", "id_category",0, "id_category",$_GET["idCategoria"]);



			$aswner = ModelCategories::mdlDeleteCategory("categories", $_GET["idCategoria"]);

			if($aswner == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La categoría ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "categories";

								}
							})

				</script>';

			}	










		}




	}

	
}
