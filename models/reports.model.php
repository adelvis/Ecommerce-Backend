<?php

require_once "conexion.php";


/**
 * 
 */
class ModelReport
{
	/*=============================================
	=        VENTAS      =
	=============================================*/	
	
	static public function mdlUnloadReports($table)
	{
		

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY id DESC");

				
		$stmt->execute();

		return $stmt-> fetchAll();

		$stmt->close();

		$stmt =null;




	}
	
}