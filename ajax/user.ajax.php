<?php

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";


class AjaxUser{

	/*=============================================
	ACTUALIZAR PROCESO DE ENVÍO
	=============================================*/

  	public $activarId;
  	public $activarUsuario;

  	public function ajaxActiveUser(){

  		$respuesta = ModelUsers::mdlActiveUser("users", "verification", $this->activarUsuario, "id", $this->activarId);

  		echo $respuesta;

	}

}

/*=============================================
ACTUALIZAR PROCESO DE ENVÍO
=============================================*/


if(isset($_POST["activarId"])){

	$sendSales = new AjaxUser();
	$sendSales -> activarId = $_POST["activarId"];
	$sendSales -> activarUsuario = $_POST["activarUsuario"];
	$sendSales -> ajaxActiveUser();

}
