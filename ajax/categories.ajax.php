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
class AjaxCategories
{
	/*=============================================
	ACTIVAR CATEGORIA
	=============================================*/

	public $activeId;
	public $activeCategorie;

	public function ajaxActiveCategories(){


		ModelSubCategories::mdlUpdateSubCategories("subcategory", "state", $this->activeCategorie, "id_categories", $this->activeId);

		ModelProducts::mdlUpdateProducts("products", "state", $this->activeCategorie, "id_category", $this->activeId);


		$aswner= ModelCategories::mdlUpdateCategories("categories", "state", $this->activeCategorie, "id", $this->activeId);

		return $aswner;


	}

	/*=============================================
	VALIDAR EXISTENCIA DE LA CATEGORIA
	=============================================*/
	public $category;


	public function ajaxValidateCategory(){

		$item= "categories";

		$value =$this->category;

		$aswner = ControllerCategories::ctrViewCategories($item, $value); 

		echo json_encode($aswner);




	}

	/*=============================================
	CONSULTA LA CATEGORIA PARA EDICIÒN
	=============================================*/

	public $idCategory;

	public function ajaxEditViewCategory(){


		$item = "id";

		$value= $this->idCategory;

		$aswner = ControllerCategories::ctrViewCategories($item, $value); 

		echo json_encode($aswner);


	}





	
}


/*=============================================
	ACTIVAR CATEGORIA
=============================================*/
if(isset($_POST["activeCategorie"])){

	$activeCategories = new AjaxCategories();

	$activeCategories->activeCategorie= $_POST["activeCategorie"];

	$activeCategories->activeId=$_POST["activeId"];

	$activeCategories->ajaxActiveCategories();



}

/*=============================================
	VALIDAR EXISTENCIA DE LA CATEGORIA
=============================================*/
if(isset($_POST["category"])){

	$valCategory = new AjaxCategories();

	$valCategory->category = $_POST["category"];

	$valCategory->ajaxValidateCategory();




}

/*=============================================
	CONSULTA LA CATEGORIA PARA EDICIÒN
=============================================*/

if(isset($_POST["idCategory"])){

	$editViewCategory = new AjaxCategories();

	$editViewCategory->idCategory = $_POST["idCategory"];

	$editViewCategory->ajaxEditViewCategory();




}