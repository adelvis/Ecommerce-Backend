<?php


require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";


require_once "../controllers/subCategories.controller.php";
require_once "../models/subCategories.model.php";

require_once "../controllers/header.controller.php";
require_once "../models/header.model.php";

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";




/**
 * 
 */
class TableProducts
{
	
		/*===================================================
				=    MOSTRAR TABLA DE PRODUCTOS        =
		===================================================*/
		public function viewTable(){
		

			$item=null;

			$value=null;

			$products = ControllerProducts::ctrViewProducts($item, $value);

			
			$dataJson ='{
					  "data": [ ';


		    for ($i=0; $i < count($products); $i++) { 

		    	   	
		    	

		    	/*===================================================
					=    TRAER CATEGORIAS         =
				===================================================*/

				$item="id";

				$value=$products[$i]["id_category"];

				$categories = ControllerCategories::ctrViewCategories($item, $value);

				if($categories["categories"]=="") {


					$category ="SIN CATEGORIA";

				}else {
					# code...
					$category =$categories["categories"];


				}

		
				/*===================================================
					=    TRAER SUB CATEGORIAS         =
				===================================================*/

				$item2="id";

				$value2=$products[$i]["id_subcategory"];

			
				$subCategories = ControllerSubCategories::ctrViewSubCategories($item2, $value2);


				if($subCategories[0]["subcategory"]=="") {


					$subCategory ="SIN SUBCATEGORÍA";

				}else {
					# code...
					$subCategory =$subCategories[0]["subcategory"];


				}



				/*===================================================
				=     REVISAR ESTADO          =
				===================================================*/

				if($products[$i]["state"]==0){

					$colorState= "btn-danger";
					$textState ="Desactivado";
					$stateproducts =1;

				}else{

					$colorState= "btn-success";
					$textState ="Activado";
					$stateproducts =0;

				}


				$state = "<button class='btn ".$colorState." btn-xs btnActivar' estadoProducto='".$stateproducts."' idProducto='".$products[$i]["id"]."'>".$textState."</button>"; 

				/*===================================================
				=     REVISAR IMAGEN DE PORTADA       =
				===================================================*/

				$item3 = "route";
				$value3 = $products[$i]["route"];

				$header = ControllerHeader::ctrViewHeader($item3, $value3);

				if($header["image"] !=""){

					$img ="<img src='".$header["image"]."' class='img-thumbnail imgPortadaProductos' width='100px'>";

				}else{

					$img ="<img src='views/img/cabeceras/default/default.jpg' class='img-thumbnail imgPortadaProductos' width='100px'>";

				}	

				/*===================================================
				=     TRAER IMAGEN PRINCIPAL       =
				===================================================*/

				$imgMain ="<img src='".$products[$i]["frontImg"]."' class='img-thumbnail imgTablaPrincipal' width='100px'>";

				/*===================================================
				=     TRAER MULTIMEDIA       =
				===================================================*/

				if($products[$i]["multimedia"] !=null){

					$multimedia = json_decode($products[$i]["multimedia"],true);

					if($multimedia[0]["foto"] != ""){

						$viewMultimedia ="<img src='".$multimedia[0]["foto"]."' class='img-thumbnail imgTablaMultimedia' width='100px'>";


					}else{

						$viewMultimedia ="<img src='http://i3.ytimg.com/vi/".$products[$i]["multimedia"]."/hqdefault.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";


					}




				}else{

					$viewMultimedia ="<img src='views/img/multimedia/default/default.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";



				}

				/*=============================================
	  			TRAER DETALLES
	  			=============================================*/

	  			$details = json_decode($products[$i]["details"],true);

	  			if($products[$i]["type"] == "fisico"){

	  				$talla = json_encode($details["Talla"]);
					$color = json_encode($details["Color"]);
					$marca = json_encode($details["Marca"]);

					$viewdetails = "Talla: ".str_replace(array("[","]",'"'), "", $talla)." - Color: ".str_replace(array("[","]",'"'), "", $color)." - Marca: ".str_replace(array("[","]",'"'), "", $marca);


	  			}else{


					$viewdetails = "Clases: ".$details["Clases"].", Tiempo: ".$details["Tiempo"].", Nivel: ".$details["Nivel"].", Acceso: ".$details["Acceso"].", Dispositivo: ".$details["Dispositivo"].", Certificado: ".$details["Certificado"];

	  			}

	  			/*=============================================
	  			TRAER PRECIO
	  			=============================================*/

	  			if($products[$i]["price"] == 0){

	  				$price = "Gratis";
	  			
	  			}else{

	  				$price = "$ ".number_format($products[$i]["price"],2);

	  			}

	  			/*=============================================
	  			TRAER ENTREGA
	  			=============================================*/

	  			if($products[$i]["delivery"] == 0){

	  				$delivery = "Inmediata";
	  			
	  			}else{

	  				$delivery = $products[$i]["delivery"]. " días hábiles";

	  			}


	  			/*=============================================
	  			REVISAR SI HAY OFERTAS
	  			=============================================*/
	  			
				if($products[$i]["offer"] != 0){

					if($products[$i]["priceOffer"] != 0){	

						$typeOffer = "PRECIO";
						$valueOffer = "$ ".number_format($products[$i]["priceOffer"],2);

					}else{

						$typeOffer = "DESCUENTO";
						$valueOffer = $products[$i]["discountOffer"]." %";	

					}	

				}else{

					$typeOffer = "No tiene oferta";
					$valueOffer = 0;
					
				}


				/*=============================================
	  			TRAER IMAGEN OFERTA
	  			=============================================*/

	  			if($products[$i]["imgOffer"] != ""){

		  			$imgOffer = "<img src='".$products[$i]["imgOffer"]."' class='img-thumbnail imgTablaProductos' width='100px'>";

		  		}else{

		  			$imgOffer = "<img src='views/img/ofertas/default/default.jpg' class='img-thumbnail imgTablaProductos' width='100px'>";

		  		}


		  		/*=============================================
	  			TRAER LAS ACCIONES
	  			=============================================*/

	  			$action = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$products[$i]["id"]."' imgOferta='".$products[$i]["imgOffer"]."' rutaCabecera='".$products[$i]["route"]."' imgPortada='".$header["image"]."' imgPrincipal='".$products[$i]["frontImg"]."'><i class='fa fa-times'></i></button></div>";


  				$dataJson .='[
				
				"'.($i+1).'",
				"'.$products[$i]["title"].'",
				"'.$category.'",
				"'.$subCategory.'",
				"'.$products[$i]["route"].'",
				"'.$state.'",
				"'.$products[$i]["type"].'",
				"'.$header["description"].'",
			  	"'.$header["keywords"].'",
			  	"'.$img.'",
			  	"'.$imgMain.'",
		 	  	"'.$viewMultimedia.'",
			  	"'.$viewdetails.'",
	  			"'.$price.'",
			  	"'.$products[$i]["weight"].' kg",
			  	"'.$delivery.'",
			  	"'.$typeOffer.'",
			  	"'.$valueOffer.'",
			  	"'.$imgOffer.'",
			  	"'.$products[$i]["endOffer"].'",			
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

$activar = new TableProducts();

$activar->viewTable();
