<?php


require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";


require_once "../controllers/subCategories.controller.php";
require_once "../models/subCategories.model.php";

require_once "../controllers/header.controller.php";
require_once "../models/header.model.php";


/**
 * 
 */
class TableSubCategories
{
	

	public function viewTable(){

		/*===================================================
				=    MOSTRAR TABLA DE SUB CATEGORIA          =
		===================================================*/

		$item=null;

		$value=null;

		$subCategories = ControllerSubCategories::ctrViewSubCategories($item, $value);

		$dataJson ='{
				  "data": [ ';


		for ($i=0; $i < count($subCategories) ; $i++) { 
			# code...
			/*===================================================
				=    TRAER CATEGORIAS         =
			===================================================*/

			$item="id";

			$value=$subCategories[$i]["id_categories"];

			$categories = ControllerCategories::ctrViewCategories($item, $value);

			if($categories["categories"]=="") {


				$category ="SIN CATEGORIA";

			}else {
				# code...
				$category =$categories["categories"];


			}


			/*===================================================
			=     REVISAR ESTADO          =
			===================================================*/

			if($subCategories[$i]["state"]==0){

				$colorState= "btn-danger";
				$textState ="Desactivado";
				$stateSubCategories =1;

			}else{

				$colorState= "btn-success";
				$textState ="Activado";
				$stateSubCategories =0;

			}


			$state = "<button class='btn ".$colorState." btn-xs btnActivar' estadoSubCategoria='".$stateSubCategories."' idSubCategoria='".$subCategories[$i]["id"]."'>".$textState."</button>"; 

			/*===================================================
			=     REVISAR IMAGEN DE PORTADA       =
			===================================================*/

			$item2 = "route";
			$value2 = $subCategories[$i]["route"];
			$headerImage = null;
			$headerDescription = null;
			$headerKeyword = null;


			$img ="<img src='views/img/cabeceras/default/default.jpg' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";

			$header = ControllerHeader::ctrViewHeader($item2, $value2);

			if(is_array($header)){

				if($header["image"] !=""){
					$img ="<img src='".$header["image"]."' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
				}

				$headerImage =$header["image"];
				$headerDescription = $header["description"];
				$headerKeyword = $header["keywords"];
			}


			/*===================================================
			=     REVISAR OFERTA       =
			===================================================*/

			if ($subCategories[$i]["offer"] !=0){

				if($subCategories[$i]["offerPrice"] !=0){

					$typeDiscount= "PRECIO";

					$valueOffert= "$ ".number_format($subCategories[$i]["offerPrice"],2);

				}else{

					$typeDiscount= "DESCUENTO";

					$valueOffert= $subCategories[$i]["discountOffer"]. " %";


				}

			}else{

				$typeDiscount= "No tiene Oferta";

				$valueOffert= 0;


			}

			if($subCategories[$i]["offerImagen"] != ""){

				$imgOffer ="<img src='".$subCategories[$i]["offerImagen"]."' class='img-thumbnail imgTablaSubCategorias' width='100px'>";

			}else{

				$imgOffer ="<img src='views/img/ofertas/default/default.jpg' class='img-thumbnail imgTablaSubCategorias' width='100px'>";


			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    
			$action = "<div class='btn-group'><button class='btn btn-warning btnEditarSubCategoria' idSubCategoria='".$subCategories[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubCategoria' idSubCategoria='".$subCategories[$i]["id"]."' imgPortada='".$headerImage."'  rutaCabecera='".$subCategories[$i]["route"]."' imgOferta='".$subCategories[$i]["offerImagen"]."'><i class='fa fa-times'></i></button></div>";


			$dataJson .='
				    [
				      "'.($i+1).'",
				      "'.$subCategories[$i]["subcategory"].'",
				      "'.$category.'",
				      "'.$subCategories[$i]["route"].'",
				      "'.$state.'",
				      "'.$headerDescription.'",
				      "'.$headerKeyword.'",
				      "'.$img.'",
				      "'.$typeDiscount.'",
				      "'.$valueOffert.'",
				      "'.$imgOffer.'",
				      "'.$subCategories[$i]["endOffer"].'",
				      "'.$action.'"
				    ],';

		}

		$dataJson = substr($dataJson,0, -1);

		$dataJson .=']
					}';


		echo $dataJson;



	}






}


/*===================================================
=     ACTIVAR TABLA DE SUBCATEGORIAS            =
===================================================*/

$activar = new TableSubCategories();

$activar->viewTable();


