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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Perfiles
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Perfiles</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
           
            <button class="btn btn-primary" data-target="#modalAgregarPerfil" data-toggle="modal">
              Agregar perfil
            </button>
        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaPerfiles" width="100%">
              
              <thead>
                
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>

              </thead>

              <tbody>
                
                <?php

                      $item = null;
                      $value = null;

                      $perfiles = ControllerAdministrators::ctrViewAdministrators($item, $value);


                      foreach ($perfiles as $key => $value) {

                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["name"].'</td>
                                    <td>'.$value["email"].'</td>';


                            if($value["photo"] != ""){

                              echo '<td><img src="'.$value["photo"].'" class="img-thumbnail" width="40px"></td>';


                            }else{

                              echo '<td><img src="views/img/perfiles/default/anonymous.png" class="img-thumbnail" width="40px"></td>';


                            }   

                             echo '<td>'.$value["profile"].'</td>';

                             if($value["state"] != 0){

                              echo '<td><button class="btn btn-success btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="0">Activado</button></td>';

                            }else{

                              echo '<td><button class="btn btn-danger btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="1">Desactivado</button></td>';

                            } 

                             echo '<td>

                                  <div class="btn-group">
                                      
                                    <button class="btn btn-warning btnEditarPerfil" idPerfil="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-pencil"></i></button>

                                    <button class="btn btn-danger btnEliminarPerfil" idPerfil="'.$value["id"].'" fotoPerfil="'.$value["photo"].'"><i class="fa fa-times"></i></button>

                                  </div>  

                                </td>

                              </tr>';    





                       
                      }




                ?>




              </tbody>




            </table>

        </div>
        <!-- /.box-body -->
       
     </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!--=====================================
MODAL AGREGAR PERFIL
======================================-->

<div id="modalAgregarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" id="nuevoEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASE??A -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contrase??a" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="administrador">Administrador</option>

                  <option value="editor">Editor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso m??ximo de la foto 2MB</p>

              <img src="views/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Perfil</button>

        </div>

        <?php

          $crearPerfil = new ControllerAdministrators();
          $crearPerfil -> ctrCreateProfile();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                <input type="hidden" id="idPerfil" name="idPerfil">

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASE??A -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" id="editarPassword1" placeholder="Escriba la nueva contrase??a">

                <input type="hidden" id="editarPassword" name="editarPassword">
                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPerfil">
                  
                  <option value="" id="editarPerfil"></option>

                  <option value="administrador">Administrador</option>

                  <option value="editor">Editor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso m??ximo de la foto 2MB</p>

              <img src="views/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Perfil</button>

        </div>

     <?php

          $editarPerfil = new ControllerAdministrators();
          $editarPerfil -> ctrEditProfile();

      ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $deletePerfil = new ControllerAdministrators();
  $deletePerfil -> ctrDeletePerfil();

?> 
