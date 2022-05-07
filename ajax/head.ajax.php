<?php


require_once "../controllers/header.controller.php";

require_once "../models/header.model.php";


/**
 * 
 */
class AjaxHeader
{
	/*=============================================
	EDITAR CATEGORIA
	=============================================*/
	public $route;

	public function ajaxEditHead()
	{
		# code...

		$item ="route";

		$value = $this->route;

		$aswner = ControllerHeader::ctrViewHeader($item, $value);

		echo json_encode($aswner);



	}







}

/*=============================================
	EDITAR CATEGORIA
=============================================*/

if(isset($_POST["route"])){


	$header = new AjaxHeader();

	$header->route=$_POST["route"];

	$header->ajaxEditHead();






}