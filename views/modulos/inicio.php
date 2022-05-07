<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero
    <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>

    </ol>

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">
    
    <!-- row -->
    <div class="row">

       <?php

        if($_SESSION["perfil"] == "administrador"){

        include "inicio/top-box.php";

        }
      
      ?>

    </div>
    <!-- row -->

    <!-- row -->
    <div class="row">

      
        
         <?php

         if($_SESSION["perfil"] == "administrador"){

          echo '<div class="col-lg-6">';
       
          include "inicio/sales-graph.php";
          include "inicio/most-selled-products.php";

          echo '</div>';

          }      

        ?>

     


        
         <?php

          if($_SESSION["perfil"] == "administrador"){

            echo ' <div class="col-lg-6">';
         
            include "inicio/graphic-visits.php";
            include "inicio/latest-users.php";

            echo '</div>'; 

          }else{

          echo ' <div class="col-lg-12">';
       
            include "inicio/graphic-visits.php";
            include "inicio/latest-users.php";

          echo '</div>';

          }         

        ?>

       <div class="col-lg-12">

        <?php

        include "inicio/recent-products.php";

        ?>

      </div>

    </div>
    <!-- row -->

 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->




  