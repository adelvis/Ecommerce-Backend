 <!-- =============================================
    Ultimos productor registrados
 ============================================== -->
 <?php

 	$products = ControllerProducts::ctrViewTotalProducts("creationDate");


 ?>

<!-- box PRODUCT LISY -->
<div class="box box-primary">


	<!-- box-header -->
	<div class="box-header with-border">

      	<h3 class="box-title">Productos agregados recientemente</h3>

	    <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	        </button>
	    </div>
    </div>
	<!-- /. box-header -->

	<!-- /.box-body -->
	<div class="box-body">

		<ul class="products-list product-list-in-box">

			<?php

				for ($i=0; $i <5; $i++) { 
					# code...
					echo '<li class="item">
							  <div class="product-img">
							    <img src="'.$products[$i]["frontImg"].'" alt="Product Image">
							  </div>
							  <div class="product-info">
							    <a href="" class="product-title">'.$products[$i]["title"];

							    if($products[$i]["price"]==0) {

							    	echo '<span class="label label-success pull-right">GRATIS</span></a>';


							    }else{

							    	echo '<span class="label label-warning pull-right">$'.$products[$i]["price"].'</span></a>';

							    }

							
							    
					echo ' </div>
							</li>';
				}



			?>


		</ul>
	</div>
	<!-- /.box-body -->

	<div class="box-footer text-center">
      <a href="products" class="uppercase">Ver todos los productos</a>
    </div>
    <!-- /.box-footer -->



</div>
