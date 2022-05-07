<?php

/**
 * 
 */
class ControllerReports 
{
	
	public function ctrUnloadReport(){


		if(isset($_GET["reporte"])){

			$table =$_GET["reporte"];

			$report =  ModelReport::mdlUnloadReports($table);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$name.'"');
			header("Content-Transfer-Encoding: binary");

			/*=============================================
			REPORTE DE COMPRAS Y VENTAS
			=============================================*/

			if($_GET["reporte"] == "shopping"){	

				echo utf8_decode("

					<table border='0'> 
						<tr> 
							<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
							<td style='font-weight:bold; border:1px solid #eee;'>VENTA</td>
							<td style='font-weight:bold; border:1px solid #eee;'>TIPO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>PROCESO DE ENVÍO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>MÉTODO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>EMAIL</td>		
							<td style='font-weight:bold; border:1px solid #eee;'>DIRECCIÓN</td>		
							<td style='font-weight:bold; border:1px solid #eee;'>PAÍS</td	
							<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>
							
						</tr>");


				foreach ($report as $key => $value) {
					# code...

					/*=============================================
					TRAER PRODUCTO
					=============================================*/
					$item = "id";
					$value1 = $value["id_product"];

					$traerProducto = ControllerProducts::ctrViewProducts($item, $value1);


					/*=============================================
					TRAER CLIENTE
					=============================================*/

					$item2 = "id";
					$value2 = $value["id_user"];

					$traerCliente = ControllerUsers::ctrViewUsers($item2, $value2);

					 echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>".$traerProducto[0]["title"]."</td>
							<td style='border:1px solid #eee;'>".$traerCliente["name"]."</td>
							<td style='border:1px solid #eee;'>$ ".number_format(($value["price"]*$value["quantity"]),2)."</td>
							<td style='border:1px solid #eee;'>".$traerProducto[0]["type"]."</td>
							<td style='border:1px solid #eee;'>

					 ");

					 /*=============================================
					TRAER PROCESO DE ENVÍO
					=============================================*/

					if($value["send"] == 0 && $traerProducto[0]["type"] == "virtual"){

						$envio = "Entrega inmediata";
					
					}else if($value["send"] == 0 && $traerProducto[0]["type"] == "fisico"){

						$envio ="Despachando el producto";

					}else if($value["send"] == 1 && $traerProducto[0]["type"] == "fisico"){

						$envio = "Enviando el producto";

					}else{

						$envio = "Producto entregado";

					}

					 echo utf8_decode($envio."</td>
									<td style='border:1px solid #eee;'>".$value["method"]."</td>
									<td style='border:1px solid #eee;'>
					 ");

					/*=============================================
					TRAER EMAIL CLIENTE
					=============================================*/

					if($value["email"] == ""){

						$email = $traerCliente["email"];

					}else{

						$email = $value["email"];
					
					}

					echo utf8_decode($email."</td>
			 					  	 <td style='border:1px solid #eee;'>".$value["address"]."</td>
			 					  	 <td style='border:1px solid #eee;'>".$value["country"]."</td>
			 					  	 <td style='border:1px solid #eee;'>".$value["creationDate"]."</td>
			 					  	 </tr>"); 	




				} 


				echo utf8_decode("</table>

					");


			}
			/*=============================================
			REPORTE DE VISITAS
			=============================================*/

			if($_GET["reporte"] == "personVisits"){	

				echo utf8_decode("<table border='0'> 

						<tr> 
						<td style='font-weight:bold; border:1px solid #eee;'>IP</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>PAÍS</td>
						<td style='font-weight:bold; border:1px solid #eee;'>VISITAS</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>	
						</tr>");

				foreach ($report as $key => $value) {

					 echo utf8_decode("<tr>
				 			
				 						<td style='border:1px solid #eee;'>".$value["ip"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["country"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["visit"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["dateReg"]."</td>
			 					  	 
			 					  	 </tr>"); 		
							
				}
	
				echo "</table>";

			}


			/*=============================================
			REPORTE DE USUARIOS
			=============================================*/

			if($_GET["reporte"] == "users"){	

				echo utf8_decode("<table border='0'> 

						<tr> 
						<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>EMAIL</td>
						<td style='font-weight:bold; border:1px solid #eee;'>MODO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>	
						</tr>");

				foreach ($report as $key => $value) {

					 echo utf8_decode("<tr>
				 			
				 						<td style='border:1px solid #eee;'>".$value["name"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["email"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["modo"]."</td>
				 						<td style='border:1px solid #eee;'>");

					 /*=============================================
  					REVISAR ESTADO
  					=============================================*/

		  			if($value["modo"] == "directo"){

			  			if( $value["verification"] == 1){
			  				
		  					$state = "Desactivado";			  			

			  			}else{
			  				
			  				$state = "Activado";
			  			
			  			}		  			

			  		}else{

			  			$state = "Activado";

			  		}

				 	echo utf8_decode($state."</td>
				 					<td style='border:1px solid #eee;'>".$value["creationDate"]."</td>
			 					  	 
			 					  </tr>"); 		

				}


			echo "</table>";

			}




		}






	}
	
}

