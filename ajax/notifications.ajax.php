<?php


require_once "../models/notifications.model.php";


Class AjaxNotifications {

	/*=============================================
	=            ACTUALIZAR NOTIFICACIONES         =
	=============================================*/

	public $item;

	public function ajaxUpdateNotifications()
	{
		# code...
		$item = $this->item;
		$value = 0;


		if($item == "nuevosUsuarios"){

			$item= "usersNew";
		}

		if($item == "nuevasVentas"){

			$item= "salesNew";
		}

		if($item == "nuevasVisitas"){

			$item= "visitsNew";
		}

		
		$aswner = ModelNotifications::mdlUpdateNotifications("notificaciones", $item, $value);

		echo $aswner;

	}


}

/*=============================================
=            ACTUALIZAR NOTIFICACIONES         =
=============================================*/

if(isset($_POST["item"])){

	$update = new AjaxNotifications();

	$update->item = $_POST["item"];

	$update->ajaxUpdateNotifications();



}