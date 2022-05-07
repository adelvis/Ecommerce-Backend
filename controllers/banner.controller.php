<?php

/**
 * 
 */
class ControllerBanner
{
	
	static public function ctrViewBanner($item, $value)
	{
		# code...

		$table = "banner";

		$aswner = ModelBanner::mdlViewBanner($table, $item, $value);

		return $aswner;



	}

	/*=============================================
	=     CREAR BANNER  =
	=============================================*/
	static public function ctrCreateBanner(){

		if(isset($_POST["tipoBanner"])){

			/*=============================================
			=     VALIDAR IMAGEN BANNER  =
			=============================================*/

			$rutaBanner ="";

			if(isset($_FILES["fotoBanner"]["tmp_name"]) && !empty($_FILES["fotoBanner"]["tmp_name"])){ 


				/*====================================================
				=         Definimos medidad imagen portada          =
				====================================================*/
				list($width, $height) = getimagesize($_FILES["fotoBanner"]["tmp_name"]);

				$new_Width =1600;

				$new_height=550;

				/*==================================================================================
				=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
				===================================================================================*/

				if($_FILES["fotoBanner"]["type"]=="image/jpeg"){

					/*==========================================
					=    Guardamos la imagen        =
					========================================== */

					$rutaBanner ="views/img/banner/".$_POST["rutaBanner"].".jpg";

					$origin = imagecreatefromjpeg($_FILES["fotoBanner"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $rutaBanner);
					


				} 
				if($_FILES["fotoBanner"]["type"]=="image/png"){

					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$rutaBanner ="views/img/banner/".$_POST["rutaBanner"].".png";

					$origin = imagecreatefrompng($_FILES["fotoBanner"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $rutaBanner);


						
				}


				$datos = array("img"=>$rutaBanner,
								"state"=>1,
								"type"=>$_POST["tipoBanner"],
								"route"=>$_POST["rutaBanner"]
						);

				
				$aswner = ModelBanner::mdlInsertBanner("banner", $datos);

				if($aswner == "ok"){

					
					echo'<script>

						swal({
							  type: "success",
							  title: "El Banner  ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "banner";

								}
							})

						</script>';

				}else {

					echo'<script>

						swal({
							  type: "error",
							  title: "El banner no ha sido guardado",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  })

						</script>';

				}





			}





		}






	}



	/*=============================================
	=     EDITAR BANNER  =
	=============================================*/
	static public function ctrEditBanner(){

		if(isset($_POST["editarTipoBanner"])){

			/*=============================================
			VALIDAR IMAGEN BANNER
			=============================================*/

			$rutaBanner = $_POST["antiguaFotoBanner"];


			if(isset($_FILES["fotoBanner"]["tmp_name"]) && !empty($_FILES["fotoBanner"]["tmp_name"])){

				/*=============================================
				BORRAMOS ANTIGUA FOTO PORTADA
				=============================================*/

				unlink($_POST["antiguaFotoBanner"]);


				/*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/
				list($width, $height) = getimagesize($_FILES["fotoBanner"]["tmp_name"]);

				$new_Width =1600;

				$new_height=550;

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/	

				if($_FILES["fotoBanner"]["type"]=="image/jpeg"){

					/*==========================================
					=    Guardamos la imagen        =
					========================================== */

					$rutaBanner ="views/img/banner/".$_POST["rutaBanner"].".jpg";

					$origin = imagecreatefromjpeg($_FILES["fotoBanner"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $rutaBanner);
					


				}

				if($_FILES["fotoBanner"]["type"]=="image/png"){

					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$rutaBanner ="views/img/banner/".$_POST["rutaBanner"].".png";

					$origin = imagecreatefrompng($_FILES["fotoBanner"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $rutaBanner);


						
				}



			}

			$datos = array("id"=>$_POST["idBanner"],
						   "img"=>$rutaBanner,
						   "type"=>$_POST["editarTipoBanner"],
						   "route"=>$_POST["rutaBanner"]);

			$aswner = ModelBanner::mdlEditBanner("banner", $datos);

			if($aswner == "ok"){

				
				echo'<script>

					swal({
						  type: "success",
						  title: "El Banner  ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "banner";

							}
						})

					</script>';


			}else{


					echo'<script>

					swal({
						  type: "error",
						  title: "El banner no ha sido guardado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

					</script>';

			}





		}

	}


	/*=============================================
	ELIMINAR BANNER
	=============================================*/

	static public function ctrDeleteBanner(){

		if(isset($_GET["idBanner"])){


			/*=============================================
			ELIMINAR IMAGEN BANNER
			=============================================*/

			if($_GET["imgBanner"] != ""){

				unlink($_GET["imgBanner"]);		

			}

			$aswner = ModelBanner::mdlDeleteBanner("banner", $_GET["idBanner"]);

			if($aswner == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El banner ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "banner";

								}
							})

				</script>';

			}		










		}



	}






}







