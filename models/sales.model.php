<?php

require_once "conexion.php";


/**
 * 
 */
class ModelSales
{
	/*=============================================
	=           MOSTRAR TOTAL VENTAS           =
	=============================================*/
	static public function mdlViewTotalSales($table)
	{
	
		$stmt = Conexion::conectar()->prepare("SELECT sum(`quantity`*`price`) as total FROM $table");

		
		$stmt->execute();

		return $stmt-> fetch();

		$stmt->close();

		$stmt =null;



	}


	/*=============================================
	=           MOSTRAR VENTAS           =
	=============================================*/
	static public function mdlViewSales($table)
	{
	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY id DESC");

		
		$stmt->execute();

		return $stmt-> fetchAll();

		$stmt->close();

		$stmt =null;



	}

	/*=============================================
	=     MOSTRAR VENTAS TOTAL POR AÑO -MES        =
	=============================================*/

	static public function mdlViewTotalSalesByYearMonth($table)
	{
	
		$stmt = Conexion::conectar()->prepare("SELECT SUM(`quantity`*`price`) AS total, date_format(`creationDate`, '%Y-%m') AS `month_year` FROM $table GROUP BY `month_year`");

		
		$stmt->execute();

		return $stmt-> fetchAll();

		$stmt->close();

		$stmt =null;



	}


	/*===================================================
	=            ACTUALIZAR PROCESO DE ENVIO            =
	===================================================*/

	static public function mdlUpdateSales($table, $item1, $value1, $item2, $value2){

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);

		
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;

	}




}