<?php


require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";
require_once "../models/route.php";

class TableUsers{

 	/*=============================================
  	MOSTRAR LA TABLA DE VISITAS
  	=============================================*/ 

 	public function viewTable(){

 		$item = null;

 		$value = null;

 		$url = Route::ctrRoute();

 	
 		$users = ControllerUsers::ctrViewUsers($item, $value);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($users); $i++){

	 		# =============================================
			# =           MOSTRAR FOTO CLIENTE       =
			# =============================================
			
			if($users[$i]["photo"] !=""){

				if($users[$i]["modo"] !="directo"){

					$photo = "<img class='img-circle' src='".$users[$i]["photo"]."' width='70px'>";

				}else{

					$photo = "<img class='img-circle' src='".$url.$users[$i]["photo"]."' width='70px'>";

				}

				
			}else{

				$photo = "<img class='img-circle' src='views/img/usuarios/default/anonymous.png' width='70px'>";
			}

			/*=============================================
  			REVISAR state
  			=============================================*/

  			if($users[$i]["modo"] == "directo"){

	  			if( $users[$i]["verification"] == 1){

	  				$colorState = "btn-danger";
	  				$textoState = "Desactivado";
	  				$stateUser = 0;

	  			}else{

	  				$colorState = "btn-success";
	  				$textoState = "Activado";
	  				$stateUser = 1;

	  			}

	  			$state = "<button class='btn btn-xs btnActivar ".$colorState."' idUsuario='". $users[$i]["id"]."' estadoUsuario='".$stateUser."'>".$textoState."</button>";

	  		}else{

	  			$state = "<button class='btn btn-xs btn-info'>Activado</button>";

	  		}

			/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$users[$i]["name"].'",
				      "'.$users[$i]["email"].'",
				      "'.$users[$i]["modo"].'",
				      "'.$photo.'",
				      "'.$state.'",
				      "'.$users[$i]["creationDate"].'"    
				    ],';

		}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
		  
		}'; 

		echo $datosJson;

 	}


}

/*=============================================
ACTIVAR TABLA DE VISITAS
=============================================*/ 
$activar = new TableUsers();
$activar -> viewTable();