<?php


	$template = ControllerCommerce::ctrSelectTemplate();


?>



<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <?php

      		echo '<span class="logo-mini"><img src="'.$template["icono"].'" class="img-responsive" style="padding: 10px; filter: contrast(200%);"></span>


      			 <!-- logo for regular state and mobile devices -->
     			 <span class="logo-lg"><img src="'.$template["logo"].'" class="img-responsive" style="padding: 10px 30px; filter: contrast(200%);"></span>



      		'



      ?>
     
     
    </a>
	<!-- Logo -->


	<!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">

    	<!-- Sidebar toggle button-->
	    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	        <span class="sr-only">Toggle navigation</span>
	    </a>
		<!-- navbar-custom-menu-->
		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">
				
				<?php

					include "header/notifications.php";

					include "header/user.php";

				?>
			</ul>


		</div>	
		<!-- /navbar-custom-menu-->
		

   </nav> 	
   <!-- /navbar-->	


</header>
