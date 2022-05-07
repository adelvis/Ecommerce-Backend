
  <!-- =============================================
    Cajas Superiores
  ============================================== -->
<?php

	$sales = ControllerSales::ctrViewTotalSales();

	$visits = ControllerVisits::ctrViewTotalVisits();

	$users = ControllerUsers::ctrViewTotalUsers("id");

	$totalUsers= count($users);

	$products = ControllerProducts::ctrViewTotalProducts("id");

	$totalProducts= count($products);


?>

	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-aqua">
	    <div class="inner">
	      <h3>$<?php echo number_format($sales["total"]); ?></h3>

	      <p>Ventas</p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-bag"></i>
	    </div>
	    <a href="sales" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div>
	<!-- ./col -->

	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-green">
	    <div class="inner">
	      <h3><?php echo number_format($visits["total"]); ?></h3>

	      <p>Visitas</p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-stats-bars"></i>
	    </div>
	    <a href="visits" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div>
	<!-- ./col -->

	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-yellow">
	    <div class="inner">
	      <h3><?php echo $totalUsers; ?></h3>

	      <p>Usuarios</p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-person-add"></i>
	    </div>
	    <a href="users" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div>
	<!-- ./col -->

	
	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-red">
	    <div class="inner">
	      <h3><?php echo $totalProducts; ?></h3>

	      <p>Productos</p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-pie-graph"></i>
	    </div>
	    <a href="products" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div>
	<!-- ./col -->
