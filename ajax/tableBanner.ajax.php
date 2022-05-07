<?php

require_once "../controllers/banner.controller.php";

require_once "../models/banner.model.php";


/**
 * 
 */
class TableBanner
{
	
	/*=============================================
	=        MOSTRAR TABLA BANNER      =
	=============================================*/
	public function viewTable(){

		$item =null;

		$value = null;


		$banner= ControllerBanner::ctrViewBanner($item, $value);

		$datosJson = '{

			"data": [ ';

			for ($i=0; $i < count($banner) ; $i++) { 
				# code...
				/*=============================================
				=          REVISAR ESTADO       =
				=============================================*/
				
				if($banner[$i]["state"]==0){

					$colorState="btn-danger";
					$txtState ="Desactivado";
					$stateBanner = 1;

				}else{


					$colorState="btn-success";
					$txtState ="Activado";
					$stateBanner = 0;

				}
			

				$state	= "<button class='btn ".$colorState. " btn-xs btnActivar' estadoBanner='".$stateBanner."' idBanner='".$banner[$i]["id"]."'>".$txtState."</button>";

				/*=============================================
				=          REVISAR IMAGEN       =
				=============================================*/

				$imgBanner = "<img class='img-thumbnail imgBanner' src='".$banner[$i]["img"]. "' width='100px'>";

				/*=============================================
	  			CREAR LAS ACCIONES
	  			=============================================*/
		    
			    
				$action = "<div class='btn-group'><button class='btn btn-warning btnEditarBanner' idBanner='".$banner[$i]["id"]."' data-toggle='modal' data-target='#modalEditarBanner'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarBanner' idBanner='".$banner[$i]["id"]."' imgBanner='".$banner[$i]["img"]."'><i class='fa fa-times'></i></button></div>";


				$datosJson .= '[

					  "'.($i+1).'",
					  "'.$imgBanner.'",
				      "'.$state.'",
				      "'.$banner[$i]["route"].'",
				      "'.$banner[$i]["type"].'",
				      "'.$action.'"


				],';



			}


		$datosJson= substr($datosJson, 0, -1);
		

		$datosJson .= ']


		}';

		echo $datosJson;	





	}




}

/*=============================================
=           	ACTIVAR TABLA BANNER         =
=============================================*/

$active = new TableBanner();

$active->viewTable();





