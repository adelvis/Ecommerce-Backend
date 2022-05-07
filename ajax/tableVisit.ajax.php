
<?php


require_once "../controllers/visits.controller.php";
require_once "../models/visits.model.php";

class TableVisits{

 	/*=============================================
  	MOSTRAR LA TABLA DE VISITAS
  	=============================================*/ 

 	public function viewTable(){

 		$visits = ControllerVisits::ctrViewVisit();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($visits); $i++){

			/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$visits[$i]["ip"].'",
				      "'.$visits[$i]["country"].'",
				      "'.$visits[$i]["visit"].'",
				      "'.$visits[$i]["dateReg"].'"    
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
$activar = new TableVisits();
$activar -> viewTable();