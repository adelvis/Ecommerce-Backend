  <!-- =============================================== -->
<?php
    
    if($_SESSION["perfil"] != "administrador"){
        echo '<script>      

              window.location = "inicio";

              </script> ';

       return;
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor Ventas
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor ventas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">          
            <?php

                include "inicio/sales-graph.php";
            ?>
        </div>
        <div class="box-body">

              <div class="box-tools">

                <a href="views/modulos/reports.php?reporte=shopping">

                  <button class="btn btn-success">Descargar reporte en Excel</button>

                </a>

              </div>

               <br>

              <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">
        
                <thead>
                  
                  <tr>
                    
                    <th style="width:10px">#</th>
                    <th>Producto</th>
                    <th>Imagen Producto</th>
                    <th>Cliente</th>
                    <th>Foto Cliente</th>
                    <th>Venta</th>
                    <th>Tipo</th>  
                    <th>Proceso de envío</th>         
                    <th>Metodo</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>País</th>
                    <th>Fecha</th>

                  </tr>

                </thead> 


              </table>

        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
