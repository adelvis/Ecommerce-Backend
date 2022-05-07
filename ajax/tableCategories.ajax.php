<?php

require_once "../controllers/categories.controller.php";
require_once "../controllers/header.controller.php";
require_once "../models/categories.model.php";
require_once "../models/header.model.php";

/**
 * MOSTRAR TABLA CATEGORIAS
 */
class TableCategories{
	
	
	public function viewTable(){


		$item=null;

		$value=null;

		$categories = ControllerCategories::ctrViewCategories($item, $value);

		if($categories){

			$dataJson ='{
				"data": [ ';


			for ($i=0; $i < count($categories) ; $i++) { 
				# code...

				/*===================================================
				=     REVISAR ESTADO          =
				===================================================*/

				if($categories[$i]["state"]==0){

					$colorState= "btn-danger";
					$textState ="Desactivado";
					$stateCategories =1;

				}else{

					$colorState= "btn-success";
					$textState ="Activado";
					$stateCategories =0;

				}


				$state = "<button class='btn ".$colorState." btn-xs btnActivar' estadoCategoria='".$stateCategories."' idCategoria='".$categories[$i]["id"]."'>".$textState."</button>"; 
				/*===================================================
				=     REVISAR IMAGEN DE PORTADA       =
				===================================================*/

				$item = "route";
				$value = $categories[$i]["route"];

				$header = ControllerHeader::ctrViewHeader($item, $value);
				

				if($header["image"] !=""){

					$img ="<img src='".$header["image"]."' class='img-thumbnail imgPortadaCategorias' width='100px'>";

				}else{

					$img ="<img src='views/img/cabeceras/default/default.jpg' class='img-thumbnail imgPortadaCategorias' width='100px'>";

				}	

				/*===================================================
				=     REVISAR OFERTA       =
				===================================================*/

				if ($categories[$i]["offer"] !=0){

					if($categories[$i]["offerPrice"] !=0){

						$typeDiscount= "PRECIO";

						$valueOffert= "$ ".number_format($categories[$i]["offerPrice"],2);

					}else{

						$typeDiscount= "DESCUENTO";

						$valueOffert= $categories[$i]["discountOffer"]. " %";


					}

				}else{

					$typeDiscount= "No tiene Oferta";

					$valueOffert= 0;


				}

				if($categories[$i]["offerImagen"] != ""){

					$imgOffer ="<img src='".$categories[$i]["offerImagen"]."' class='img-thumbnail imgOfertasCategorias' width='100px'>";

				}else{

					$imgOffer ="<img src='views/img/ofertas/default/default.jpg' class='img-thumbnail imgOfertasCategorias' width='100px'>";


				}
		
				/*=============================================
				CREAR LAS ACCIONES
				=============================================*/
			
				
				$action = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$categories[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='".$categories[$i]["id"]."' imgPortada='".$header["image"]."'  rutaCabecera='".$categories[$i]["route"]."' imgOferta='".$categories[$i]["offerImagen"]."'><i class='fa fa-times'></i></button></div>";

				$dataJson .='
						[
						"'.($i+1).'",
						"'.$categories[$i]["categories"].'",
						"'.$categories[$i]["route"].'",
						"'.$state.'",
						"'.$header["description"].'",
						"'.$header["keywords"].'",
						"'.$img.'",
						"'.$typeDiscount.'",
						"'.$valueOffert.'",
						"'.$imgOffer.'",
						"'.$categories[$i]["endOffer"].'",
						"'.$action.'"
						],';
			}	  

			$dataJson = substr($dataJson,0, -1);

			$dataJson .=']
						}';


			echo $dataJson;

		}	



	}





}

/*===================================================
=     ACTIVAR TABLA DE CATEGORIAS            =
===================================================*/

$activar = new TableCategories();

$activar->viewTable();






