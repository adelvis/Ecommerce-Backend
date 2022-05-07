<?php



require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";


require_once "../controllers/subCategories.controller.php";
require_once "../models/subCategories.model.php";

require_once "../controllers/header.controller.php";
require_once "../models/header.model.php";

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";



/**
 * 
 */
class AjaxProducts
{
	
	/*===================================================
		=  ACTIVAR PRODUCTOS        =
	===================================================*/

	public $activeProducts;

	public $activeId;


	public function ajaxActiveProducts(){


		$table ="products";

		$item1= "state"; 

		$value1 = $this->activeProducts;

		
		$item2= "id"; 

		$value2 = $this->activeId;		


		$aswner = ModelProducts::mdlUpdateProducts($table, $item1, $value1, $item2, $value2);

		echo $aswner;



	}

	/*===================================================
	=  VALIDAR LE EXISTENCIA DE UN PRODUCTO        =
	===================================================*/


	public $product;


	public function ajaxValidateProduct(){

		$item ="title";

		$value = $this->product;

		$aswner = ControllerProducts::ctrViewProducts($item, $value);

		echo json_encode($aswner);




	}

	/*===================================================
	=  SUBIR MULTIMEDIA        =
	===================================================*/

	public $imageMultimedia;

	public $routeMultimedia;


	public function ajaxSendMultimedia(){

		$datos = $this->imageMultimedia;

		$route = $this->routeMultimedia;

		$aswner = ControllerProducts::ctrSendImageMultimedia($datos, $route);

		echo $aswner;






	}

	/*===================================================
	=  GUARDAR PRODUCTOS       =
	===================================================*/
	public $tituloProducto;     	
	public $rutaProducto;    
	public $seleccionarTipo;     	
	public $detalles;     
	public $seleccionarCategoria;     
	public $seleccionarSubCategoria;    
	public $descripcionProducto;     
	public $pClavesProducto;     
	public $precio;     
	public $peso;
	public $entrega;    
	public $multimedia;    
	public $fotoPortada;   
    public $fotoPrincipal;    
	public $selActivarOferta;    
	public $precioOferta;     
	public $descuentoOferta;     
	public $finOferta;     
	public $fotoOferta;   

	public $id;
	public $antiguaFotoPortada; 
	public $antiguaFotoPrincipal;
	public $antiguaFotoOferta;
	public $idCabecera;  

	public function ajaxCreateProduct(){

		$datos = array(

			'id_category' =>$this->seleccionarCategoria, 
			'id_subcategory' =>$this->seleccionarSubCategoria,
			'type' =>$this->seleccionarTipo,
			'route' =>$this->rutaProducto,
			'title' =>$this->tituloProducto,
			'description'=>$this->descripcionProducto,
			'multimedia'=>$this->multimedia,
			'details' =>$this->detalles,
			'price' =>$this->precio,
			'frontImg'=>$this->fotoPrincipal,
			'offer'=>$this->selActivarOferta,
			'priceOffer'=>$this->precioOferta,
			'discountOffer'=>$this->descuentoOferta,
			'fotoOferta'=>$this->fotoOferta,
			'endOffer'=>$this->finOferta,
			'weight'=>$this->peso,
			'delivery'=>$this->entrega,
			'fotoPortada'=>$this->fotoPortada,
			'pClavesProducto'=>$this->pClavesProducto
		);
		
		$aswner = ControllerProducts::ctrCreateProduct($datos);

		echo $aswner;



	} 


	/*===================================================
	=  TRAER PRODUCTOS       =
	===================================================*/

	public $idProduct;


	public function ajaxViewProducts(){


		$item = "id";

		$value = $this->idProduct;

		$aswner = ControllerProducts::ctrViewProducts($item, $value);

		echo json_encode($aswner);


	}


	/*=======================================
	=            EDITAR PRODUCTO            =
	=======================================*/
	
	public function ajaxEditProduct(){

		$datos = array(
			"idProducto"=>$this->id,
			"tituloProducto"=>$this->tituloProducto,
			"rutaProducto"=>$this->rutaProducto,
			"tipo"=>$this->seleccionarTipo,
			"detalles"=>$this->detalles,					
			"categoria"=>$this->seleccionarCategoria,
			"subCategoria"=>$this->seleccionarSubCategoria,
			"descripcionProducto"=>$this->descripcionProducto,
			"pClavesProducto"=>$this->pClavesProducto,
			"precio"=>$this->precio,
			"peso"=>$this->peso,
			"entrega"=>$this->entrega,
			"multimedia"=>$this->multimedia,
			"fotoPortada"=>$this->fotoPortada,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"selActivarOferta"=>$this->selActivarOferta,
			"precioOferta"=>$this->precioOferta,
			"descuentoOferta"=>$this->descuentoOferta,
			"fotoOferta"=>$this->fotoOferta,
			"finOferta"=>$this->finOferta,
			"antiguaFotoPortada"=>$this->antiguaFotoPortada,
			"antiguaFotoPrincipal"=>$this->antiguaFotoPrincipal,
			"antiguaFotoOferta"=>$this->antiguaFotoOferta,
			"idCabecera"=>$this->idCabecera
			);
		
		//echo json_encode($datos);

		$aswner = ControllerProducts::ctrEditProduct($datos);

		echo $aswner;

		//echo json_encode($aswner);






	}
	
	



}

/*===================================================
	=  ACTIVAR PRODUCTOS        =
===================================================*/


if(isset($_POST["activeProduct"])){

	$active = new AjaxProducts();

	$active->activeProducts = $_POST["activeProduct"];

	$active->activeId = $_POST["activeId"];

	$active->ajaxActiveProducts();

}

/*===================================================
	=  VALIDAR LE EXISTENCIA DE UN PRODUCTO        =
===================================================*/


if(isset($_POST["product"])){


	$validate = new AjaxProducts();

	$validate->product = $_POST["product"];

	$validate->ajaxValidateProduct();





}

/*===================================================
	=  SUBIR MULTIMEDIA        =
===================================================*/

if(isset($_FILES["file"])){


	$multimedia = new AjaxProducts();

	$multimedia->imageMultimedia = $_FILES["file"];

	$multimedia->routeMultimedia = $_POST["route"];

	$multimedia->ajaxSendMultimedia();





}

/*===================================================
	=  GUARDAR PRODUCTOS       =
=================================================== */

if(isset($_POST["tituloProducto"])){


	$product = new AjaxProducts();

	$product->tituloProducto = $_POST["tituloProducto"];     	
	$product->rutaProducto= $_POST["rutaProducto"];    
	$product->seleccionarTipo= $_POST["seleccionarTipo"];     	
	$product->detalles= $_POST["detalles"];     
	$product->seleccionarCategoria= $_POST["seleccionarCategoria"];     
	$product->seleccionarSubCategoria= $_POST["seleccionarSubCategoria"];    
	$product->descripcionProducto= $_POST["descripcionProducto"];     
	$product->pClavesProducto= $_POST["pClavesProducto"];     
	$product->precio= $_POST["precio"];     
	$product->peso= $_POST["peso"];
	$product->entrega= $_POST["entrega"];    
	$product->multimedia= $_POST["multimedia"];    

	if(isset($_FILES["fotoPortada"])){

		$product->fotoPortada= $_FILES["fotoPortada"]; 

	}else{

		$product->fotoPortada= null;
	}	

	if(isset($_FILES["fotoPrincipal"])){

    	$product->fotoPrincipal= $_FILES["fotoPrincipal"]; 

	}else{

		$product->fotoPrincipal= null;

	}


	if(isset($_FILES["fotoOferta"])){

    	$product->fotoOferta= $_FILES["fotoOferta"];    
	}else{

		$product->fotoOferta= null;

	}

	
	$product->selActivarOferta= $_POST["selActivarOferta"];    
	$product->precioOferta= $_POST["precioOferta"];     
	$product->descuentoOferta= $_POST["descuentoOferta"];     
	$product->finOferta= $_POST["finOferta"];     
	


	$product->ajaxCreateProduct();
	


}


/*===================================================
	=  TRAER PRODUCTOS       =
===================================================*/

if(isset($_POST["idProduct"])){


	$viewProducts = new AjaxProducts();

	$viewProducts->idProduct = $_POST["idProduct"];

	$viewProducts->ajaxViewProducts();




}

/*===================================================
	=  EDITAR PRODUCTO     =
=================================================== */
if(isset($_POST["id"])){

	$editProduct = new AjaxProducts();

	
	$editProduct->id = $_POST["id"];
	$editProduct->tituloProducto = $_POST["editarProducto"];     	
	$editProduct->rutaProducto= $_POST["rutaProducto"];    
	$editProduct->seleccionarTipo= $_POST["seleccionarTipo"];     	
	$editProduct->detalles= $_POST["detalles"];     
	$editProduct->seleccionarCategoria= $_POST["seleccionarCategoria"];     
	$editProduct->seleccionarSubCategoria= $_POST["seleccionarSubCategoria"];    
	$editProduct->descripcionProducto= $_POST["descripcionProducto"];     
	$editProduct->pClavesProducto= $_POST["pClavesProducto"];     
	$editProduct->precio= $_POST["precio"];     
	$editProduct->peso= $_POST["peso"];
	$editProduct->entrega= $_POST["entrega"];    
	$editProduct->multimedia= $_POST["multimedia"];    

	if(isset($_FILES["fotoPortada"])){

		$editProduct->fotoPortada= $_FILES["fotoPortada"]; 

	}else{

		$editProduct->fotoPortada= null;
	}	

	if(isset($_FILES["fotoPrincipal"])){

    	$editProduct->fotoPrincipal= $_FILES["fotoPrincipal"]; 

	}else{

		$editProduct->fotoPrincipal= null;

	}


	if(isset($_FILES["fotoOferta"])){

    	$editProduct->fotoOferta= $_FILES["fotoOferta"];    
	}else{

		$editProduct->fotoOferta= null;

	}

	
	$editProduct->selActivarOferta= $_POST["selActivarOferta"];    
	$editProduct->precioOferta= $_POST["precioOferta"];     
	$editProduct->descuentoOferta= $_POST["descuentoOferta"];     
	$editProduct->finOferta= $_POST["finOferta"]; 


	$editProduct->antiguaFotoPortada= $_POST["antiguaFotoPortada"];
	$editProduct->antiguaFotoPrincipal= $_POST["antiguaFotoPrincipal"];
	$editProduct->antiguaFotoOferta= $_POST["antiguaFotoOferta"];
	$editProduct->idCabecera= $_POST["idCabecera"];   



	$editProduct->ajaxEditProduct();




}