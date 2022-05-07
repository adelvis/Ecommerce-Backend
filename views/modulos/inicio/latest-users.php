 <!-- =============================================
    Ultimos usuarios registrados
  ============================================== -->
<?php

	$users = ControllerUsers::ctrViewTotalUsers("creationDate");

	$url = Route::ctrRoute();

	$server = Route::ctrRouteServer();




?>

<!-- box USER LISY -->
<div class="box box-danger">

	<!-- box-header -->
	<div class="box-header with-border">

      	<h3 class="box-title">Últimos usuarios registrados</h3>

	    <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	        </button>
	    </div>
    </div>
	<!-- /. box-header -->
	
	<!-- box-body -->
	<div class="box-body no-padding">

		<!-- users-list -->
	    <ul class="users-list clearfix">

			<?php 

				if(count($users)>8){

					$totalUsers = 8;
				}else{

					$totalUsers= count($users);

				}


				for ($i=0; $i < $totalUsers; $i++) { 

					if($users[$i]["photo"]!=""){

						if($users[$i]["modo"]!="directo"){

							
								echo ' <li>
						          <img src="'.$users[$i]["photo"].'" alt="User Image" style="width:100px">
						          <a class="users-list-name" href="">'.$users[$i]["name"].'</a>
						          <span class="users-list-date">'.$users[$i]["creationDate"].'</span>
						       </li>';

						}else{

							

								echo ' <li>
								          <img src="'.$url.$users[$i]["photo"].'" alt="User Image" style="width:100px">
								          <a class="users-list-name" href="">'.$users[$i]["name"].'</a>
								          <span class="users-list-date">'.$users[$i]["creationDate"].'</span>
								       </li>';

						}		       
					}else{

							echo ' <li>
							          <img src="'.$server.'views/img/usuarios/default/anonymous.png" class="img-thumbnail style="width:100px"></img>
							          <a class="users-list-name" href="">'.$users[$i]["name"].'</a>
							          <span class="users-list-date">'.$users[$i]["creationDate"].'</span>
							       </li>';
					}

				}

				



			 ?>

	     

	      </ul>
	      <!-- /.users-list -->
		  
		  <!-- /.box-footer -->
	      <div class="box-footer text-center">
          	<a href="users" class="uppercase">Ver todos los usuarios</a>
          </div>
          <!-- /.box-footer -->

	</div>
	<!-- /.box-body -->







</div>	
<!-- box USER LISY -->