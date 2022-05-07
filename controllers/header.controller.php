<?php


/**
 * 
 */
class ControllerHeader
{
	
	static public function ctrViewHeader($item, $value)
	{
		# code...

		$table="openGraph";

		$aswner = ModelHeader::mdlViewHeader($table, $item, $value);

		return $aswner;



	}
}