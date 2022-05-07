<?php
    
    if($_SESSION["perfil"] != "administrador"){
        echo '<script>      

              window.location = "inicio";

              </script> ';

       return;
    }
?>

 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor comercio
      </h1>
      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor comercio</li>
      </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        
      <div class="row">
          
          <div class="col-md-6">
          <!--===============================================
          =                    BLOQUE 1                    =
          =============================================== -->

          <?php
              /*=============================================
              =         ADMINISTRACIÓN DE LOGO E ICOCO        =
              =============================================*/

              include "commerce/logotipo.php";

              /*=============================================
              =         ADMINISTRACIÓN DE COLORES    =
              =============================================*/

              include "commerce/colors.php";

              /*=============================================
              =         ADMINISTRACIÓN DE REDES SOCIALES    =
              =============================================*/

              include "commerce/socialNetworks.php";


          ?>

          </div>

          <div class="col-md-6 col-xs-12">

          <!--===============================================
          =                    BLOQUE 2                  =
          =============================================== -->  

            <?php

                  /*--===============================================
                  =         ADMINISTRADOR DE CODIGO             =
                  =============================================== */

                include "commerce/codes.php";

                /*--===============================================
                =         ADMINISTRADOR DE COMERCIO          =
                =============================================== */

                include "commerce/infoCommerce.php";


            ?>
              
       
                


          </div>



      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->