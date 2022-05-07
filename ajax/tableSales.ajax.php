<?php


require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";
require_once "../models/route.php";



/**
 * 
 */
class TableSales
{
	
	//$url = Route::ctrRoute();

	# =============================================
	# =           MOSTRAR TABLA VENTA       =
	# =============================================
	
	public function viewTable()
	{
		# code...

		$url = Route::ctrRoute();

		$sales = ControllerSales::ctrViewSales();

		//echo json_encode($sales);
		//return;

		$datosJson = '{

			"data": [';


		for ($i=0; $i < count($sales) ; $i++) { 

			# =============================================
			# =           MOSTRAR PRODUCTO       =
			# =============================================

			$item= "id";

			$value =$sales[$i]["id_product"];

			$setProduct = ControllerProducts::ctrViewProducts($item, $value);

			$product = $setProduct[0]["title"];

			$imgProduct = "<img class='img-thumbnail' src='".$setProduct[0]["frontImg"]."' width='100px'>";

			$typeProduct =$setProduct[0]["type"];


			# =============================================
			# =           MOSTRAR CLIENTE       =
			# =============================================

			$item2= "id";

			$value2 =$sales[$i]["id_user"];

			$setUser = ControllerUsers::ctrViewUsers($item2, $value2);

			
			$client = $setUser["name"];

			# =============================================
			# =           MOSTRAR FOTO CLIENTE       =
			# =============================================
			
			if($setUser["photo"] !=""){

				if($setUser["modo"] !="directo"){

					$imgClient = "<img class='img-circle' src='".$setUser["photo"]."' width='70px'>";

				}else{

					$imgClient = "<img class='img-circle' src='".$url.$setUser["photo"]."' width='70px'>";

				}

				
			}else{

				$imgClient = "<img class='img-circle' src='views/img/usuarios/default/anonymous.png' width='70px'>";
			}

			# =============================================
			# =           MOSTRAR EMAIL CLIENTE       =
			# =============================================
			
			if($sales[$i]["email"] ==""){

				$email = $setUser["email"];

			}else{

				$email = $sales[$i]["email"];

			}

			/*=============================================
			TRAER PROCESO DE ENVÍO
			=============================================*/

			if($sales[$i]["send"] == 0 && $typeProduct == "virtual"){

				$send = "<button class='btn btn-info btn-xs'>Entrega inmediata</button>";
			
			}else if($sales[$i]["send"] == 0 && $typeProduct == "fisico"){

				$send ="<button class='btn btn-danger btn-xs btnEnvio' idVenta='".$sales[$i]["id"]."' etapa='1'>Despachando el producto</button>";

			}else if($sales[$i]["send"] == 1 && $typeProduct == "fisico"){

				$send = "<button class='btn btn-warning btn-xs btnEnvio' idVenta='".$sales[$i]["id"]."' etapa='2'>Enviando el producto</button>";

			}else{

				$send = "<button class='btn btn-success btn-xs'>Producto entregado</button>";

			}

			/*=============================================
			LOGOS PAYPAL Y PAYU
			=============================================*/

			if($sales[$i]["method"] == "paypal"){

				$method = "<img class='img-responsive' src='views/img/plantilla/paypal.jpg' width='300px'>";
			
			}else if($sales[$i]["method"] == "payu"){

				$method = "<img class='img-responsive' src='views/img/plantilla/payu.jpg' width='300px'>";
			
			}else{

				$method = "GRATIS";

			}



		
			/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			$datosJson	 .= '[
				      		"'.($i+1).'",
				      		"'.$product.'",
				      		"'.$imgProduct.'",
				      		"'.$client.'",
				      		"'.$imgClient.'",
				      		"$ '.number_format(($sales[$i]["price"]*$sales[$i]["quantity"]) ,2).'",
				      		"'.$typeProduct.'",
				      		"'.$send.'",
				      		"'.$method.'",	
				      		"'.$email.'",
				      		"'.$sales[$i]["address"].'",
				      		"'.$sales[$i]["country"].'",
				      		"'.$sales[$i]["creationDate"].'"	
				      		],';


		}	

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 
	  	
	  	echo $datosJson;

	}
}

# =============================================
	# =       ACTIVAR TABLA VENTA       =
# =============================================

$activar = new TableSales();

$activar->viewTable();