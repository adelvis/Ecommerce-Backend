<?php

require_once "../controllers/slider.controller.php";

require_once "../models/slider.model.php";


/**
 * 
 */
class AjaxSlide
{
	
	
	public $imgBack;
	public $typeSlide;
	public $styleTextSlide;
	public $styleImgProduct;
	public $title1;
	public $title2;
	public $title3;
	public $button;
	public $url;
	public $id;
    public $orden;
    public $name;
    public $fileBack;
    public $imgProduct;
    public $fileImgProduct;
    
	



	/*=============================================
	=           Crear slider         =
	=============================================*/

	public function ajaxCreateSlide(){

		$datos = array ("imgBack"=>$this->imgBack,
						"typeSlide"=>$this->typeSlide,
						"styleTextSlide"=>$this->styleTextSlide,
						"title1"=>$this->title1,
						"title2"=>$this->title2,
						"title3"=>$this->title3,
						"button"=>$this->button,
						"url"=>$this->url
						); 



		$aswer = ControllerSlider::ctrCreateSlide($datos);

		echo $aswer;

		


	}

	/*=============================================
	=           Actualizar orden slide       =
	=============================================*/

	

    public function ajaxUpdateOrderSlide(){

    	$datos = array ("id"=>$this->id,
						"orden"=>$this->orden
						); 



		$aswer = ControllerSlider::ctrUpdateOrderSlide($datos);

		echo $aswer;




    }

    /*=============================================
	=           Cambiar slide       =
	=============================================*/

	public function ajaxUpdateSlide(){

		$datos = array ("id"=>$this->id,
						"name"=>$this->name,
						"typeSlide"=>$this->typeSlide,
						"styleTextSlide"=>$this->styleTextSlide,
						"styleImgProduct"=>$this->styleImgProduct,
						"imgBack"=>$this->imgBack,
						"fileBack"=>$this->fileBack,
						"imgProduct"=>$this->imgProduct,
						"fileImgProduct"=>$this->fileImgProduct,
						"title1"=>$this->title1,
						"title2"=>$this->title2,
						"title3"=>$this->title3,
						"button"=>$this->button,
						"url"=>$this->url
						); 



		$aswer = ControllerSlider::ctrUpdateSlide($datos);

		echo $aswer;




	}

	
}

/*=============================================
	=           Crear slider         =
=============================================*/

if(isset($_POST["createSlide"])){

	$createSlide = new AjaxSlide();

	$createSlide->imgBack		= $_POST["imgBack"];
	$createSlide->typeSlide		= $_POST["typeSlide"];
	$createSlide->styleTextSlide= $_POST["styleTextSlide"];
	$createSlide->title1		= $_POST["title1"];
	$createSlide->title2		= $_POST["title2"];
	$createSlide->title3		= $_POST["title3"];
	$createSlide->button		= $_POST["button"];
	$createSlide->url			= $_POST["url"];


	$createSlide->ajaxCreateSlide();




}

/*=============================================
	=           Actualizar orden slide       =
=============================================*/


if(isset($_POST["idSlider"])){

	$orderSlide = new AjaxSlide();

	$orderSlide->id = 	 $_POST["idSlider"];
	$orderSlide->orden = $_POST["orden"];

	$orderSlide->ajaxUpdateOrderSlide();



}


/*=============================================
	=           Cambiar slide       =
============================================*/

if(isset($_POST["id"])){


	$slide = new AjaxSlide();

	$slide->id 		= $_POST["id"];

	$slide->name 	= $_POST["name"];

	$slide->typeSlide		= $_POST["typeSlide"];
	$slide->styleTextSlide	= $_POST["styleTextSlide"];
	$slide->styleImgProduct	= $_POST["styleImgProduct"];
	$slide->imgBack			= $_POST["imgBack"];

	if(isset($_FILES["fileBack"])){

		$slide->fileBack 	= $_FILES["fileBack"];

	}else{

		$slide->fileBack	= null;

	}

	$slide->imgProduct 		= $_POST["imgProduct"];


	
	if(isset($_FILES["fileImgProduct"])){

		$slide->fileImgProduct = $_FILES["fileImgProduct"];

	}else{

		$slide->fileImgProduct = null;

	} 

	$slide->title1 = $_POST["title1"];

	$slide->title2		= $_POST["title2"];
	$slide->title3		= $_POST["title3"];

	$slide->button		= $_POST["button"];
	$slide->url			= $_POST["url"];

	$slide->ajaxUpdateSlide();

}