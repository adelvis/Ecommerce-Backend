<?php

require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";


class AjaxSales{

	/*=============================================
	ACTUALIZAR PROCESO DE ENVÍO
	=============================================*/
	

  	public $idSale;
  	public $etapa;

  	public function ajaxEnvioVenta(){

  		$respuesta = ModelSales::mdlUpdateSales("shopping", "send", $this->etapa, "id", $this->idSale);

  		echo $respuesta;

	}

}

/*=============================================
ACTUALIZAR PROCESO DE ENVÍO
=============================================*/


if(isset($_POST["idSale"])){

	$sendSales = new AjaxSales();
	$sendSales -> idSale = $_POST["idSale"];
	$sendSales -> etapa = $_POST["etapa"];
	$sendSales -> ajaxEnvioVenta();

}
