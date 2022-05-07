 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor Categorías
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor Categorías</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
            

            <button class="btn btn-primary"  data-toggle="modal" data-target="#modalAgregarCategoria">
              Agregar Categoría
            </button>  
        
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped tablaCategorias dt-responsive" width="100%">
              
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Categoría</th>
                      <th>Ruta</th>
                      <th>Estado</th>
                      <th>Descripción</th>
                      <th>Palabras Claves</th>
                      <th>Portada</th>
                      <th>Tipo de Oferta</th>
                      <th>Valor Oferta</th>
                      <th>Imagen Oferta</th>
                      <th>Fin Oferta</th>
                      <th>Acciones</th>

                  </tr>


                </thead>

              

            </table>



         
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--=================================================================
    MODAL AGREGAR CATEGORIA
  ===================================================================-->

  <div id="modalAgregarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content" >

        <form method="POST" enctype="multipart/form-data">

            <!--=================================================================
              CABECERA DEL MODAL
            ===================================================================-->           
            <div class="modal-header" style="background:#3c8dbc; color:white">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Agregar categoría</h4>

              
            </div>
             <!--=================================================================
              CUERPO DEL MODAL
            ===================================================================-->  
            <div class="modal-body">
              
              <div class="box-body">  
                <!--=================================================================
                  TITULO DE CATEGORIA
                ===================================================================-->    
                <div class="form-group">
                  
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>

                        <input type="text" name="tituloCategoria" class="form-control input-lg validarCategoria tituloCategoria" placeholder="Ingresar Categoría" required>
                    </div>

                </div>
                
                <!--=================================================================
                  RUTA CATEGORIA
                ===================================================================-->    
                <div class="form-group">
                  
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-link"></i></span>

                        <input type="text" name="rutaCategoria" class="form-control input-lg rutaCategoria" placeholder="Url de la Categoría" required readonly>
                    </div>

                </div>
              <!--=====================================
              ENTRADA PARA LA DESCRIPCIÓN DE LA CATEGORÍA
              ======================================-->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                  <textarea maxlength="120" class="form-control input-lg" name="descripcionCategoria"  rows="3" placeholder="Ingresar descripción categoría" required></textarea>

                </div> 

              </div>
              <!--=====================================
              ENTRADA PARA LAS PALABRAS CLAVES DE LA CATEGORÍA
              ======================================-->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves, seperadas por coma" name="pClavesCategoria" required> 

                </div> 

              </div>

              <!--=====================================
              ENTRADA PARA SUBIR FOTO DE PORTADA
              ======================================-->

              <div class="form-group">
                
                <div class="panel">SUBIR FOTO PORTADA</div>

                 <input type="file" class="fotoPortada" name="fotoPortada">

                 <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                  <img src="views/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

              </div>

              <!--=====================================
              ENTRADA PARA TIPO DE OFERTA
              ======================================-->

              <div class="form-group">
                
                <select name="selActivarOferta" class="form-control input-lg selActivarOferta">
                  
                  <option value="">No tiene oferta</option>
                  <option value="oferta">Activar oferta</option>

                </select>

              </div>

              <div class="datosOferta" style="display:none">
              
                <!--=====================================
                ENTRADA PARA EL VALOR DE LA OFERTA
                ======================================-->

                  <div class="form-group row">
                     
                    <div class="col-xs-6">
                      
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                        <input type="number" class="form-control input-lg valorOferta" id="precioOferta" name="precioOferta" min="0" step="any" placeholder="Precio"> 

                      </div>

                    </div>

                    <div class="col-xs-6">

                      <div class="input-group">
                          
                        <input type="number" class="form-control input-lg valorOferta" id="descuentoOferta" name="descuentoOferta" min="0" placeholder="Descuento"> 

                         <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                      </div>

                    </div>

                  </div>

                  <!--=====================================
                  ENTRADA PARA LA FECHA FIN OFERTA
                  ======================================-->

                  <div class="form-group">
                    
                    <div class="input-group date">
                      
                      <input type='text' class="form-control datepicker input-lg valorOferta" name="finOferta">

                      <span class="input-group-addon">
                            
                        <span class="glyphicon glyphicon-calendar"></span>
                        
                      </span>                  

                    </div>

                  </div>

                  <!--=====================================
                  ENTRADA PARA SUBIR FOTO DE OFERTA
                  ======================================-->

                  <div class="form-group">
                    
                    <div class="panel">SUBIR FOTO OFERTA</div>

                     <input type="file" class="fotoOferta" name="fotoOferta">

                     <p class="help-block">Tamaño recomendado 640px * 430px <br> Peso máximo de la foto 2MB</p>

                      <img src="views/img/ofertas/default/default.jpg" class="img-thumbnail previsualizarOferta" width="100px">

                  </div>

               </div>



              </div>
              

            </div>

            <!--=================================================================
              PIE DEL MODAL
            ===================================================================-->  
            <div class="modal-footer">
                
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                  <button type="submit" class="btn btn-primary">Guardar categoría</button>



            </div>
      
          
        </form>    

        <?php

        
        $crearCategoria = new ControllerCategories();
         $crearCategoria -> ctrCreateCategory();

        ?>

      </div>
      
    </div>

  </div>

  <!--=================================================================
    MODAL EDITAR CATEGORIA
  ===================================================================-->

  <div id="modalEditarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content" >

        <form method="POST" enctype="multipart/form-data">

            <!--=================================================================
              CABECERA DEL MODAL
            ===================================================================-->           
            <div class="modal-header" style="background:#3c8dbc; color:white">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Editar categoría</h4>

              
            </div>
             <!--=================================================================
              CUERPO DEL MODAL
            ===================================================================-->  
            <div class="modal-body">
              
              <div class="box-body">  
                <!--=================================================================
                  TITULO DE CATEGORIA
                ===================================================================-->    
                <div class="form-group">
                  
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>

                        <input type="text" name="editarTituloCategoria" class="form-control input-lg validarCategoria tituloCategoria" placeholder="Ingresar Categoría" required>


                        <input type="hidden" class="editarIdCategoria" name="editarIdCategoria">
                        <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">


                    </div>

                </div>
                
                <!--=================================================================
                  RUTA CATEGORIA
                ===================================================================-->    
                <div class="form-group">
                  
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-link"></i></span>

                        <input type="text" name="rutaCategoria" class="form-control input-lg rutaCategoria" placeholder="Url de la Categoría" required readonly>
                    </div>

                </div>
              <!--=====================================
              ENTRADA PARA LA DESCRIPCIÓN DE LA CATEGORÍA
              ======================================-->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                  <textarea maxlength="120" class="form-control input-lg descripcionCategoria" name="descripcionCategoria"  rows="3" placeholder="Ingresar descripción categoría" required></textarea>

                </div> 

              </div>
              <!--=====================================
              ENTRADA PARA LAS PALABRAS CLAVES DE LA CATEGORÍA
              ======================================-->

              <div class="form-group editarPalabrasClaves">



              </div>

             <!-- <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves, seperadas por coma" name="pClavesCategoria" required> 

                </div> 

              </div>

              <!--=====================================
              ENTRADA PARA SUBIR FOTO DE PORTADA
              ======================================-->

              <div class="form-group">
                
                <div class="panel">SUBIR FOTO PORTADA</div>

                 <input type="file" class="fotoPortada" name="fotoPortada">
                 <input type="hidden" name="antiguaFotoPortada" class="antiguaFotoPortada">

                 <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                  <img src="views/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

              </div>

              <!--=====================================
              ENTRADA PARA TIPO DE OFERTA
              ======================================-->

              <div class="form-group">
                
                <select name="selActivarOferta" class="form-control input-lg selActivarOferta">
                  
                  <option value="">No tiene oferta</option>
                  <option value="oferta">Activar oferta</option>

                </select>

              </div>

              <div class="datosOferta" style="display:none">
              
                <!--=====================================
                ENTRADA PARA EL VALOR DE LA OFERTA
                ======================================-->

                  <div class="form-group row">
                     
                    <div class="col-xs-6">
                      
                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                        <input type="number" class="form-control input-lg valorOferta" id="precioOferta" name="precioOferta" min="0" step="any" placeholder="Precio"> 

                      </div>

                    </div>

                    <div class="col-xs-6">

                      <div class="input-group">
                          
                        <input type="number" class="form-control input-lg valorOferta" id="descuentoOferta" name="descuentoOferta" min="0" placeholder="Descuento"> 

                         <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                      </div>

                    </div>

                  </div>

                  <!--=====================================
                  ENTRADA PARA LA FECHA FIN OFERTA
                  ======================================-->

                  <div class="form-group">
                    
                    <div class="input-group date">
                      
                      <input type='text' class="form-control datepicker input-lg valorOferta finOferta" name="finOferta">

                      <span class="input-group-addon">
                            
                        <span class="glyphicon glyphicon-calendar"></span>
                        
                      </span>                  

                    </div>

                  </div>

                  <!--=====================================
                  ENTRADA PARA SUBIR FOTO DE OFERTA
                  ======================================-->

                  <div class="form-group">
                    
                    <div class="panel">SUBIR FOTO OFERTA</div>

                     <input type="file" class="fotoOferta" name="fotoOferta">

                     <input type="hidden" name="antiguaFotoOferta" class="antiguaFotoOferta">


                     <p class="help-block">Tamaño recomendado 640px * 430px <br> Peso máximo de la foto 2MB</p>

                      <img src="views/img/ofertas/default/default.jpg" class="img-thumbnail previsualizarOferta" width="100px">

                  </div>

               </div>



              </div>
              

            </div>

            <!--=================================================================
              PIE DEL MODAL
            ===================================================================-->  
            <div class="modal-footer">
                
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                  <button type="submit" class="btn btn-primary">Guardar categoría</button>



            </div>
      
          
        </form>    

        <?php

        
           $editCategoria = new ControllerCategories();
           $editCategoria-> ctrEditCategory();

        ?>

       

      </div>
      
    </div>

  </div>


   <?php

        
        $eliminarCategoria = new ControllerCategories();
        $eliminarCategoria -> ctrDeleteCategory();

  ?>


<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
  
$(document).keydown(function(e){

  if(e.keyCode == 13){

    e.preventDefault();

  }



})



</script>
