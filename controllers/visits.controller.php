<?php



/**
 * 
 */
class ControllerVisits
{
	/*=============================================
	=         MOSTRAR TOTAL VISITAS           =
	=============================================*/
		
	static public function ctrViewTotalVisits()
	{
		
		$table ="countryVisits";


		$answer = ModelVisits::mdlViewTotalVisits($table);


		return $answer;



	}


	/*=============================================
	=         MOSTRAR PAISES DE VISITAS           =
	=============================================*/
	static public function ctrViewCountries($order)
	{
		
		$table ="countryVisits";


		$answer = ModelVisits::mdlViewCountries($table, $order);


		return $answer;



	}


	/*=============================================
	=         MOSTRAR VISITAS           =
	=============================================*/
	static public function ctrViewVisit()
	{
		
		$table ="personVisits";


		$answer = ModelVisits::mdlViewVisits($table);


		return $answer;



	}


}