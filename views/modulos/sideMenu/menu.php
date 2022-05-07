
<!-- ========================================
		MENU
============================================ -->

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">

	<!-- Sidebar user panel 
      <div class="user-panel">
      	
	        <div class="pull-left image">
	          <img src="views/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	        </div>

	        <div class="pull-left info">
	          <p>Alexander Pierce</p>
	          <a href="#"><i class="fa fa-circle text-success"></i>
	          	Online</a>
	        </div>
	   
       
      </div>

      <!-- Sidebar user panel -->


	<li class="active"><a href="inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>

	<?php

		if($_SESSION["perfil"] =="administrador"){

			echo '<li><a href="commerce"><i class="fa fa-files-o"></i> <span>Gestor Comercio</span></a></li>';

		}
		

	?>

	

	<li><a href="slider"><i class="fa fa-edit"></i> <span>Gestor Slider</span></a></li>


	<li class="treeview">

          <a href="#">
            <i class="fa fa-th"></i> <span>Gestor Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="categories"><i class="fa fa-circle-o"></i> Categorías</a></li>
            <li><a href="subcategory"><i class="fa fa-circle-o"></i> Sub-categorías</a></li>
 
          </ul>
    </li>


	<li><a href="products"><i class="fa fa-product-hunt"></i> <span>Gestor Productos</span></a></li>

	<li><a href="banner"><i class="fa fa-map-o"></i> <span>Gestor Banner</span></a></li>

	<?php

		if($_SESSION["perfil"] =="administrador"){

			echo '<li><a href="sales"><i class="fa fa-shopping-cart"></i> <span>Gestor Ventas</span></a></li>';

		}
		

	?>

	

	<li><a href="visits"><i class="fa fa-map-marker"></i> <span>Gestor Visitas</span></a></li>

	<li><a href="users"><i class="fa fa-users"></i> <span>Gestor Usuarios</span></a></li>

	<?php

		if($_SESSION["perfil"] =="administrador"){

			echo '<li><a href="profiles"><i class="fa fa-key"></i> <span>Gestor Perfiles</span></a></li>';

		}
		

	?>

	


</ul>	



