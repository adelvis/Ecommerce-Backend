<!-- =============================================
		NOTIFICACIONES
============================================== -->

<?php
    
    if($_SESSION["perfil"] != "administrador"){
        
       return;
    }

 $notifications = ControllerNotifications::ctrViewNotifications();

 $totalnotifications = $notifications["usersNew"] + $notifications["salesNew"] + $notifications["visitsNew"];

?>

<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">

	<!--dropdown-toggle-->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning"><?php  echo $totalnotifications; ?></span>
    </a>
	<!--dropdown-toggle-->

	<!--dropdown-menu-->

	<ul class="dropdown-menu">

        <li class="header">You have <?php  echo $totalnotifications; ?> notifications</li>

		<li>
			<!--menu-->
			<ul class="menu">

				<!--usuarios-->
				<li>
                    <a href="" class="actualizarNotificaciones" item="nuevosUsuarios">
                      <i class="fa fa-users text-aqua"></i> <?php  echo $notifications["usersNew"]; ?> nuevos usuarios registrados
                    </a>
                </li>
				<!--Ventas-->
                <li>
                   <a href="" class="actualizarNotificaciones" item="nuevasVentas">
                      <i class="fa fa-shopping-bag text-aqua"></i> <?php  echo $notifications["salesNew"]; ?> nuevas ventas
                    </a>
                </li>

                <!--Visitas-->
                <li>
                    <a href="" class="actualizarNotificaciones" item="nuevasVisitas">
                      <i class="fa fa-map-marker text-aqua"></i> <?php  echo $notifications["visitsNew"]; ?> nuevas visitas
                    </a>
                </li>


			</ul>
			<!--menu-->
		</li>	


	</ul>
	<!--dropdown-menu-->

</li>
<!-- Notifications: menu-->