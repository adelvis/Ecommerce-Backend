<?php

require_once "../controllers/categories.controller.php";
require_once "../controllers/subCategories.controller.php";	
require_once "../controllers/products.controller.php";

require_once "../models/categories.model.php";
require_once "../models/subCategories.model.php";
require_once "../models/products.model.php";

/**
 * 
 */
class AjaxSubCategories
{
	
	/*=============================================
	ACTIVAR CATEGORIA
	=============================================*/
	public $activeId;

	public $activeSubCategory;

	public function ajaxActiveSubCategories(){

		$table ="subcategory";

		$item1="state";

		$value1= $this->activeSubCategory;


		$item2="id";

		$value2= $this->activeId;


		ModelProducts::mdlUpdateProducts("products", $item1, $value1, "id_subcategory", $value2);


		$aswner= ModelSubCategories::mdlUpdateSubCategories($table, $item1, $value1, $item2, $value2);

		return $aswner;


	}

	/*=============================================
	VALIDAR EXISTENCIA DE LA CATEGORIA
	=============================================*/
	public $subcategory;


	public function ajaxValidateSubCategory(){

		$item= "subcategory";

		$value =$this->subcategory;

		$aswner = ControllerSubCategories::ctrViewSubCategories($item, $value); 

		echo json_encode($aswner);

	}	

	/*=============================================
	CONSULTA LA SUBCATEGORIA PARA EDICIÒN
	=============================================*/

	public $idSubCategory;

	public function ajaxEditViewSubCategory(){


		$item = "id";

		$value= $this->idSubCategory;

		$aswner = ControllerSubCategories::ctrViewSubCategories($item, $value); 

		echo json_encode($aswner);


	}

	/*=============================================
	CONSULTA LAS SUBCATEGORIA DE UNA CATEGORIA
	=============================================*/
	public $id_categories;

	public function ajaxViewSubCategories(){


		$item = "id_categories";

		$value= $this->id_categories;

		$aswner = ControllerSubCategories::ctrViewSubCategories($item, $value); 

		echo json_encode($aswner);






	}



}

/*=============================================
	ACTIVAR CATEGORIA
=============================================*/

if(isset($_POST["activeSubCategory"])){


	$activeSubCategories = new AjaxSubCategories();

	$activeSubCategories->activeId = $_POST["activeId"];

	$activeSubCategories->activeSubCategory = $_POST["activeSubCategory"];


	$activeSubCategories->ajaxActiveSubCategories();


}

/*=============================================
	VALIDAR EXISTENCIA DE LA SUBCATEGORIA
=============================================*/
if(isset($_POST["subcategory"])){

	$valSubCategory = new AjaxSubCategories();

	$valSubCategory->subcategory = $_POST["subcategory"];

	$valSubCategory->ajaxValidateSubCategory();




}



/*=============================================
	CONSULTA LA SUBCATEGORIA PARA EDICIÒN
=============================================*/

if(isset($_POST["idSubCategory"])){

	$editViewCategory = new AjaxSubCategories();

	$editViewCategory->idSubCategory = $_POST["idSubCategory"];

	$editViewCategory->ajaxEditViewSubCategory();




}

/*=============================================
CONSULTA LAS SUBCATEGORIA DE UNA CATEGORIA
=============================================*/

if(isset($_POST["idCategories"])){

	$ViewSubCategory = new AjaxSubCategories();

	$ViewSubCategory->id_categories = $_POST["idCategories"];

	$ViewSubCategory->ajaxViewSubCategories();




}