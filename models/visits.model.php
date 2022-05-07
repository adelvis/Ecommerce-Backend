<?php

require_once "conexion.php";

/**
 * 
 */
class ModelVisits
{
	/*=============================================
	=         MOSTRAR TOTAL VISITAS           =
	=============================================*/

	static public function mdlViewTotalVisits($table)
	{
		

		$stmt = Conexion::conectar()->prepare("SELECT sum(quantity) as total FROM $table");

		
		$stmt->execute();

		return $stmt-> fetch();

		$stmt->close();

		$stmt =null;




	}

	/*=============================================
	=          MOSTRAR PAISES DE VISITAS          =
	=============================================*/

	static public function mdlViewCountries($table, $order)
	{
		

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY $order DESC");

		
		$stmt->execute();

		return $stmt-> fetchAll();

		$stmt->close();

		$stmt =null;




	}

	/*=============================================
	MOSTRAR VISITAS
	=============================================*/	

	static public function mdlViewVisits($table){

		$stmt = Conexion::conectar()->prepare("SELECT id, ip, country, visit, dateReg FROM $table ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}




}

