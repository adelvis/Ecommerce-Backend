<?php

/**
 * 
 */
class ControllerUsers
{
	/*=============================================
	=         MOSTRAR TOTAL DE USUARIOS           =
	=============================================*/	
	static public function ctrViewTotalUsers($order)
	{
		
		$table = "users";

		$answer = ModelUsers::mdlViewTotalUsers($table, $order);

		return $answer;



	}

	/*=============================================
	=         MOSTRAR  USUARIOS           =
	=============================================*/	
	static public function ctrViewUsers($item, $value)
	{
		
		$table = "users";

		$answer = ModelUsers::mdlViewUsers($table, $item, $value);

		return $answer;



	}
}