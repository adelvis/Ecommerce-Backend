<?php


require_once "../controllers/banner.controller.php";

require_once "../models/banner.model.php";

require_once "../models/categories.model.php";

require_once "../models/subCategories.model.php";


/**
 * 
 */
class AjaxBanner
{
	
	/*=============================================
	=        ACTIVAR BANNER     =
	=============================================*/

	public $activeBanner;
	public $activeId;


	public function ajaxActiveBanner()
	{
		# code...
		$aswner = ModelBanner::mdlUpdateStateBanner("banner", "state", $this->activeBanner, "id", $this->activeId);

		echo $aswner;



	}

	/*=============================================
	=        TRAER RUTA DE ACUERDO A LA TABLA   =
	=============================================*/

	public $table;


	public function ajaxGetRouteBanner(){


		$table = $this->table;

		$item= null;

		$value= null;


		if($table=="categorias"){

			$aswner = ModelCategories::mdlViewCategories("categories", $item, $value);

			echo json_encode($aswner);
		}

		if($table=="subcategorias"){

			$aswner = ModelSubCategories::mdlViewSubCategories("subcategory", $item, $value);

			echo json_encode($aswner);
		}




	}


	/*=============================================
	=     VALIDAR RUTA BANNER  =
	=============================================*/

	public $validateRoute;

	public function ajaxValidateRoute(){


		$item= "route";

		$value = $this->validateRoute;

		$aswner = ControllerBanner::ctrViewBanner($item, $value);

		echo json_encode($aswner);




	}

	/*=============================================
	=    TRAE LOS DATOS DEL  BANNER  =
	=============================================*/

	public $idBanner;

	public function ajaxGetBanner(){


		$item = "id";
		$value = $this->idBanner;

		$aswner = ControllerBanner::ctrViewBanner($item, $value);

		echo json_encode($aswner);




	}


}

/*=============================================
	=        ACTIVAR BANNER     =
=============================================*/


if(isset($_POST["activeBanner"])){


	$active = new  AjaxBanner();

	$active->activeId = $_POST["activeId"];

	$active->activeBanner = $_POST["activeBanner"];

	$active->ajaxActiveBanner();





}


/*=============================================
	=        TRAER RUTA DE ACUERDO A LA TABLA   =
=============================================*/

if(isset($_POST["table"])){


	$getBanner = new AjaxBanner();


	$getBanner->table = $_POST["table"];

	$getBanner->ajaxGetRouteBanner();



}

/*=============================================
	=     VALIDAR RUTA BANNER  =
=============================================*/

if(isset($_POST["validateRoute"])){


	$validateRoute = new AjaxBanner();

	$validateRoute->validateRoute =$_POST["validateRoute"];

	$validateRoute->ajaxValidateRoute();




}

/*=============================================
	=    TRAE LOS DATOS DEL  BANNER  =
=============================================*/
if(isset($_POST["idBanner"])){

	$banner = new AjaxBanner();

	$banner->idBanner = $_POST["idBanner"];

	$banner->ajaxGetBanner();



}