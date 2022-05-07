 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor de Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
         
        </div>
        <div class="box-body">

            <div class="box-tools">

              <a href="views/modulos/reports.php?reporte=users">

                <button class="btn btn-success">Descargar reporte en Excel</button>

              </a>

            </div>

            <br>

            <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%">
        
                <thead>
                  
                  <tr>
                    
                    <th style="width:10px">#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Modo</th>
                    <th>Foto</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                  </tr>

                </thead> 


            </table>



          
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->