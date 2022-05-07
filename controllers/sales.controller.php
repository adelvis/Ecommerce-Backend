<?php



/**
 * Ventas
 */
class ControllerSales
{
	
	/*=============================================
	=           MOSTRAR TOTAL VENTAS           =
	=============================================*/
	static public function ctrViewTotalSales(){

		$table = "shopping";


		$answer = ModelSales::mdlViewTotalSales($table);


		

		return $answer;


	}

	/*=============================================
	=           MOSTRAR VENTAS           =
	=============================================*/
	static public function ctrViewSales(){

		$table = "shopping";

		$answer = ModelSales::mdlViewSales($table);


		return $answer;



	}

	/*=============================================
	=    MOSTRAR VENTAS TOTAL POR AÑO -MES           =
	=============================================*/
	static public function ctrViewTotalSalesByYearMonth(){

		$table = "shopping";

		$answer = ModelSales::mdlViewTotalSalesByYearMonth($table);


		return $answer;



	}





}

