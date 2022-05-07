<?php

require_once "../controllers/commerce.controller.php";

require_once "../models/commerce.model.php";

/**
 * 
 */
class AjaxCommerce
{
	
	/*=========================================
			=   CAMBIAR EL LOGO	     =
	=========================================*/


	public $imagenLogo;

	public function ajaxChangeLogotipo(){

		$item= "logo";

		$value= $this->imagenLogo;

		
		$asnwer = ControllerCommerce::ctrUpdateLogoIcono($item, $value);

		echo $asnwer;



	}


	/*=========================================
			=   CAMBIAR EL ICONO	     =
	=========================================*/


	public $imagenIcono;

	public function ajaxChangeIcono(){

		$item= "icono";

		$value= $this->imagenIcono;

		
		$asnwer = ControllerCommerce::ctrUpdateLogoIcono($item, $value);

		echo $asnwer;



	}

	/*=========================================
			=   CAMBIAR COLOR 	     =
	=========================================*/

	public $barraSuperior;

	public $textoSuperior;

	public $colorFondo;

	public $colorTexto;

	public function ajaxChangeColor(){

		$datos  = array('barraSuperior' =>$this->barraSuperior,
						'textoSuperior' =>$this->textoSuperior,
						'colorFondo' 	=>$this->colorFondo,
						'colorTexto' 	=>$this->colorTexto);

		$asnwer = ControllerCommerce::ctrUpdateColors($datos);

		echo $asnwer;




	}

	/*================================================
	=     GUARDAR REDES SOCIALES    =
	=================================================*/

	public $socialNetwork;

	public function ajaxChangeSocialNetwork(){


		$item= "redesSociales";

		$value= $this->socialNetwork;

		
		$asnwer = ControllerCommerce::ctrUpdateLogoIcono($item, $value);

		echo $asnwer;




	}

	/*================================================
	=     GUARDAR CÓDIGOS    =
	=================================================*/

	public $apiFacebook;

	public $pixelFacebook;

	public $googleAnalytics;	

	public function ajaxChangeCode(){


		$datos  = array('apiFacebook' 		=>$this->apiFacebook,
						'pixelFacebook' 	=>$this->pixelFacebook,
						'googleAnalytics' 	=>$this->googleAnalytics);

		$asnwer = ControllerCommerce::ctrUpdateScript($datos);

		echo $asnwer;


	}

	/*====================================================
	// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN DEL COMERCIO
	=====================================================*/

	public $impuesto;
	public $envioNacional;
	public $envioInternacional;
	public $tasaMinimaNal;
	public $tasaMinimaInt;
	public $seleccionarPais;
	public $modoPaypal;
	public $clienteIdPaypal;
	public $llaveSecretaPaypal;
	public $modoPayu;
	public $merchantIdPayu;
	public $accountIdPayu;
	public $apiKeyPayu;
	public $email;

	public $name;
	public $phone;
	public $emailContact;
	public $address;


	public function ajaxChangeCommerce(){

		$datos = array('impuesto' =>$this->impuesto,
						'envioNacional'=>$this->envioNacional,
						'envioInternacional'=>$this->envioInternacional,
						'tasaMinimaNal'=>$this->tasaMinimaNal,
						'tasaMinimaInt'=>$this->tasaMinimaInt,
						'seleccionarPais'=>$this->seleccionarPais,
						'modoPaypal'=>$this->modoPaypal,
						'clienteIdPaypal'=>$this->clienteIdPaypal,
						'llaveSecretaPaypal'=>$this->llaveSecretaPaypal,
						'modoPayu'=>$this->modoPayu,
						'merchantIdPayu'=>$this->merchantIdPayu,
						'accountIdPayu'=>$this->accountIdPayu,
						'apiKeyPayu'=>$this->apiKeyPayu,
						'email'=>$this->email,
						'name' =>$this->name,
						'phone' =>$this->phone,
						'emailContact' =>$this->emailContact,
						'address' =>$this->address

						);

		$asnwer = ControllerCommerce::ctrUpdateCommerce($datos);

		echo $asnwer;


	}



}

/*=========================================
			=   CAMBIAR EL LOGO	     =
=========================================*/

if(isset($_FILES["imagenLogo"])){


	$logotipo = new AjaxCommerce();

	$logotipo->imagenLogo=$_FILES["imagenLogo"];

	$logotipo->ajaxChangeLogotipo();



}

/*=========================================
			=   CAMBIAR EL ICONO    =
=========================================*/

if(isset($_FILES["imagenIcono"])){


	$logotipo = new AjaxCommerce();

	$logotipo->imagenIcono=$_FILES["imagenIcono"];

	$logotipo->ajaxChangeIcono();



}

/*=========================================
			=   CAMBIAR COLOR 	     =
=========================================*/

if(isset($_POST["barraSuperior"])){

	$color = new AjaxCommerce();

	$color->barraSuperior	= $_POST["barraSuperior"];

	$color->textoSuperior	= $_POST["textoSuperior"];

	$color->colorFondo		= $_POST["colorFondo"];

	$color->colorTexto		= $_POST["colorTexto"];

	$color->ajaxChangeColor();






}

/*================================================
=     GUARDAR REDES SOCIALES    =
=================================================*/

if(isset($_POST["redesSociales"])){


	$network = new AjaxCommerce();

	$network->socialNetwork = $_POST["redesSociales"];

	$network->ajaxChangeSocialNetwork();


}

/*================================================
=     GUARDAR CÓDIGOS    =
=================================================*/

if (isset($_POST["apiFacebook"])) {

	$code = new AjaxCommerce();

	$code->apiFacebook = $_POST["apiFacebook"];

	$code->pixelFacebook = $_POST["pixelFacebook"];

	$code->googleAnalytics = $_POST["googleAnalytics"];


	$code->ajaxChangeCode();



}

/*=============================================
	// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/
if(isset($_POST["impuesto"])){


	$commerce = new AjaxCommerce();

	$commerce->impuesto				= $_POST["impuesto"];
	$commerce->envioNacional        = $_POST["envioNacional"];
	$commerce->envioInternacional	= $_POST["envioInternacional"];
	$commerce->tasaMinimaNal		= $_POST["tasaMinimaNal"];
	$commerce->tasaMinimaInt		= $_POST["tasaMinimaInt"];
	$commerce->seleccionarPais		= $_POST["seleccionarPais"];
	$commerce->modoPaypal			= $_POST["modoPaypal"];
	$commerce->clienteIdPaypal		= $_POST["clienteIdPaypal"];
	$commerce->llaveSecretaPaypal	= $_POST["llaveSecretaPaypal"];
	$commerce->modoPayu				= $_POST["modoPayu"];
	$commerce->merchantIdPayu		= $_POST["merchantIdPayu"];
	$commerce->accountIdPayu		= $_POST["accountIdPayu"];
	$commerce->apiKeyPayu			= $_POST["apiKeyPayu"];
	$commerce->email     			= $_POST["email"];

	$commerce->name     			= $_POST["name"];
	$commerce->phone     			= $_POST["phone"];
	$commerce->emailContact  		= $_POST["emailContact"];
	$commerce->address     			= $_POST["address"];

	$commerce->ajaxChangeCommerce();







}