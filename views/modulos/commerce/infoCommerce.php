<?php

	
	$commerce = ControllerCommerce::ctrSelectCommerce();





?>

<div class="box box-info">

	<div class="box-header with-border">

		 <h3 class="box-title">INFORMACIÓN DEL COMERCIO</h3>

		 <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>

          </div>

	</div>
	
	<div class="box-body formularioInformacion">

		<!-- Correo -->
		<div class="form-group">
			
			<label for="urs">Nombre del Comercio</label>
			
			<div class="input-group">


				<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
				<input type="text" min="1" class="form-control cambioInformacion" id="nombre" value="<?php echo $commerce["name"]; ?>">

			</div>

		</div>

		<div class="form-group">
			
			<label for="urs">Email</label>
			
			<div class="input-group">


				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="email" min="1" class="form-control cambioInformacion" id="email" value="<?php echo $commerce["emailCommerce"]; ?>">

			</div>

		</div>

		<div class="form-group row">

			<div class="col-xs-6">

				<!-- IMPUESTO -->
					
				<label for="urs">Impuesto</label>
				
				<div class="input-group">
					
					<span class="input-group-addon"><i class="fa fa-percent"></i></span>
					<input type="number" min="1" class="form-control cambioInformacion" id="impuesto" value="<?php echo $commerce["tax"]; ?>">

				</div>
				



			</div>

			<div class="col-xs-6">


				<!-- ENVIO NACIONAL -->
					
				<label for="urs">Envío Nacional</label>
			
				<div class="input-group">
					
					<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
					<input type="number" min="1" class="form-control cambioInformacion" id="envioNacional" value="<?php echo $commerce["national_delivery"]; ?>">

				</div>


			</div>

		

		</div>

		<div class="form-group row">

			<div class="col-xs-6">

				<!-- ENVIO INTERNACIONAL -->
					
				<label for="urs">Envío Internacional</label>
			
				<div class="input-group">
					
					<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
					<input type="number" min="1" class="form-control cambioInformacion" id="envioInternacional" value="<?php echo $commerce["international_delivery"]; ?>">

				</div>



			</div>

			<div class="col-xs-6">


				<!-- TASA MINIMA NACIONAL -->
					
				<label for="urs">Tasa Mínima Nacional</label>
			
				<div class="input-group">
					
					<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
					<input type="number" min="1" class="form-control cambioInformacion" id="tasaMinimaNal" value="<?php echo $commerce["tax_min_nat"]; ?>">

				</div>

			</div>

		

		</div>

		<div class="form-group row">

			<div class="col-xs-6">

				<!-- TASAMA MINI INTERNACIONAL -->
					
				<label for="urs">Tasa Mínima Internacional</label>
			
				<div class="input-group">
					
					<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
					<input type="number" min="1" class="form-control cambioInformacion" id="tasaMinimaInt" value="<?php echo $commerce["tax_min_int"]; ?>">

				</div>



			</div>

			<div class="col-xs-6">


				<!-- PAISES -->
					
				<label for="sel1">Seleccione País</label>
			
				<input type="hidden" id="codigoPais" value="<?php echo $commerce["country"]; ?>">

				<select class="form-control cambioInformacion" id="seleccionarPais">
					
					<option id="paisSeleccionado"></option>
				</select>

			</div>

		

		</div>



		 <!-- PASARELA DE PAGO PAYPAL -->

		<div class="panel panel-default">
    
	  		<div class="panel-heading">

	      		<h4 class="text-uppercase">Configuración Paypal</h4>

	      	</div>

	      	<div class="panel-body">

	        	<div class="form-group row">
	          
	          		<div class="col-xs-3">
						
						<label>Modo:</label>

						 <?php

      					if($commerce["modoPaypal"] == "sandbox"){

      						echo '	<label class="checkbox">

      									<input class="cambioInformacion" type="radio" value="sandbox" name="modoPaypal" checked>Sandbox</label>
              					
          							<label class="checkbox">

          								<input class="cambioInformacion" type="radio" value="live" name="modoPaypal"> 

          								Live

          							</label>';
      					}else{

      						echo '	<label class="checkbox">

      									<input class="cambioInformacion" type="radio" value="sandbox" name="modoPaypal">  

      									Sandbox

      								</label>
              					
          							<label class="checkbox">

          								<input class="cambioInformacion" type="radio" value="live" name="modoPaypal" checked> 

          								Live

          							</label>';


      					}

      					?>



					</div>

					<div class="col-xs-4">
            
            			<label for="comment">Cliente:</label>
      
            			<input type="text" class="form-control cambioInformacion" id="clienteIdPaypal" value="<?php echo $commerce["clientIdPaypal"]; ?>">

          			</div>

      			 	<div class="col-xs-5">

		            	<label for="comment">Llave Secreta:</label>
		      
		            	<input type="text" class="form-control cambioInformacion" id="llaveSecretaPaypal" value="<?php echo $commerce["keySecretPaypal"]; ?>">

		         	</div>


	        	</div>

	      	</div>

    	</div>

		 <!-- PASARELA DE PAGO PAYU -->

		<div class="panel panel-default">
    
	  		<div class="panel-heading">

	      		<h4 class="text-uppercase">Configuración Payu Latam</h4>

	      	</div>

	      	<div class="panel-body">

	        	<div class="form-group row">
	          
	          		<div class="col-xs-3">

	          			<label>Modo:</label>
	            
				             <?php

				          if($commerce["modoPayu"] == "sandbox"){

				            echo '<label class="checkbox"><input class="cambioInformacion" type="radio" value="sandbox" name="modoPayu" checked>Sandbox</label>
				              <label class="checkbox"><input class="cambioInformacion" type="radio" value="live" name="modoPayu"> Live</label>';
				          
				          }else{

				            echo '<label class="checkbox"><input class="cambioInformacion" type="radio" value="sandbox" name="modoPayu">  Sandbox</label>
				              <label class="checkbox"><input class="cambioInformacion" type="radio" value="live" name="modoPayu" checked> Live</label>';

				          }

				          ?>

	          		</div>
	          
		          	<div class="col-xs-3">
		            
		            	<label for="comment">Merchant Id:</label>
		      
		            	<input type="text" class="form-control cambioInformacion" id="merchantIdPayu" value="<?php echo $commerce["merchantIdPayu"]; ?>" >

		          	</div>
	          
	          		<div class="col-xs-3">

	        			<label for="comment">Account Id:</label>
	      
	            		<input type="text" class="form-control cambioInformacion" id="accountIdPayu" value="<?php echo $commerce["accountIdPayu"]; ?>">

	     		 	</div>

	      			<div class="col-xs-3">

	            		<label for="comment">Api Key:</label>
	      
	             		<input type="text" class="form-control cambioInformacion" id="apiKeyPayu" value="<?php echo $commerce["apiKeyPayu"]; ?>">

	          		</div>

	        	</div>

	      	</div>

    	</div>
		

		<!-- INFORMACION DE CONCTATO -->

		<div class="panel panel-default">
    
	  		<div class="panel-heading">

	      		<h4 class="text-uppercase">Información de Contacto</h4>

	      	</div>

	      	<div class="panel-body">

	        	<div class="form-group row">
	          
	          		<div class="col-xs-6">


	          			<label for="urs">Telefono</label>
			
						<div class="input-group">


							<span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
							<input type="text" min="1" class="form-control cambioInformacion" id="telefono" value="<?php echo $commerce["phone"]; ?>">

						</div>
					            	
	          		</div>
	          
		          	<div class="col-xs-6">
		            	
		            	<label for="urs">Email de Contacto</label>
			
						<div class="input-group">


							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="email" min="1" class="form-control cambioInformacion" id="emailContacto" value="<?php echo $commerce["emailContact"]; ?>">

						</div>
					            	

		          	</div>
	          
	          		

	        	</div>

	        	<div class="form-group row">
	        		<div class="col-xs-12">
		        		
		        		<label for="urs">Dirección</label>
						
						<div class="input-group">


							<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							<textarea class="form-control cambioInformacion" rows="2" id="direccion"><?php echo ltrim($commerce["address"]);?></textarea>
							

						</div>
					</div>
	        	</div>

	      	</div>

    	</div>


		



	</div>	

	
	<div class="box-footer">
	 
		<button type="button" id="guardarInformacion" class="btn btn-primary pull-right">Guardar</button>


	</div>




</div>	
