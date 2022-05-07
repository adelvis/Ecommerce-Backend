<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor Subcategorías
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor Subcategorías</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
            

            <button class="btn btn-primary"  data-toggle="modal" data-target="#modalAgregarSubCategoria">
              Agregar subcategoría
            </button>  
        
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped tablaSubCategorias dt-responsive" width="100%">
              
                <thead>
                  <tr>
                      <th style="width: 100%">#</th>
                      <th>Subcategoría</th>
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
    MODAL AGREGAR SUBCATEGORIA
  ===================================================================-->

  <div id="modalAgregarSubCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content" >

        <form method="POST" enctype="multipart/form-data">

            <!--=================================================================
              CABECERA DEL MODAL
            ===================================================================-->           
            <div class="modal-header" style="background:#3c8dbc; color:white">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Agregar subcategoría</h4>

              
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

                        <input type="text" name="tituloSubCategoria" class="form-control input-lg validarSubCategoria tituloSubCategoria" placeholder="Ingresar Subcategoría" required>
                    </div>

                </div>
                
              <!--=================================================================
                RUTA SUBCATEGORIA
              ===================================================================-->    
              <div class="form-group">
                
                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-link"></i></span>

                      <input type="text" name="rutaSubCategoria" class="form-control input-lg rutaSubCategoria" placeholder="Url de la Subcategoría" required readonly>
                  </div>

              </div>

              <!--=================================================================
                  SELECCION DE LA CATEGORIA
              ===================================================================-->    
               <div class="form-group">
                
                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>

                      <select class="form-control input-lg seleccionarCategoria" name="seleccionarCategoria" required>
                        
                        <option value="">Seleccionar caregoría</option>
                        
                        <?php

                              $item= null;

                              $value= null;

                              $categoria = ControllerCategories::ctrViewCategories($item, $value);

                              foreach ($categoria as $key => $value) {
                                # code...
                                echo '<option value="'.$value["id"].'">'.$value["categories"].'</option>';

                              }

                        ?>
                      </select>
                  </div>

              </div>


              <!--=====================================
              ENTRADA PARA LA DESCRIPCIÓN DE LA SUBCATEGORÍA
              ======================================-->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                  <textarea maxlength="120" class="form-control input-lg" name="descripcionSubCategoria"  rows="3" placeholder="Ingresar descripción Subcategoría" required></textarea>

                </div> 

              </div>
              <!--=====================================
              ENTRADA PARA LAS PALABRAS CLAVES DE LA SUBCATEGORÍA
              ======================================-->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg  tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves, seperadas por coma" name="pClavesSubCategoria" required> 

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

        
         $crearSubCategoria = new ControllerSubCategories();
         $crearSubCategoria -> ctrCreateSubCategory();

        ?>

      </div>
      
    </div>

  </div>




 <!--=================================================================
    MODAL EDITAR SUBCATEGORIA
  ===================================================================-->

  <div id="modalEditarSubCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content" >

        <form method="POST" enctype="multipart/form-data">

            <!--=================================================================
              CABECERA DEL MODAL
            ===================================================================-->           
            <div class="modal-header" style="background:#3c8dbc; color:white">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Editar subcategoría</h4>

              
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

                        <input type="text" name="editartituloSubCategoria" class="form-control input-lg validarSubCategoria tituloSubCategoria" placeholder="Ingresar Subcategoría" required>
                        

                        <input type="hidden" class="editarIdSubCategoria" name="editarIdSubCategoria">
                        <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">




                    </div>

                </div>
                
              <!--=================================================================
                RUTA SUBCATEGORIA
              ===================================================================-->    
              <div class="form-group">
                
                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-link"></i></span>

                      <input type="text" name="rutaSubCategoria" class="form-control input-lg rutaSubCategoria" placeholder="Url de la Subcategoría" required readonly>
                  </div>

              </div>

              <!--=================================================================
                  SELECCION DE LA CATEGORIA
              ===================================================================-->    
               <div class="form-group">
                
                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>

                      <select class="form-control input-lg seleccionarCategoria" name="seleccionarCategoria" required>
                        
                        <option class="optionEditarCategoria"></option>
                        
                        <?php

                              $item= null;

                              $value= null;

                              $categoria = ControllerCategories::ctrViewCategories($item, $value);

                              foreach ($categoria as $key => $value) {
                                # code...
                                echo '<option value="'.$value["id"].'">'.$value["categories"].'</option>';

                              }

                        ?>
                      </select>
                  </div>

              </div>


              <!--=====================================
              ENTRADA PARA LA DESCRIPCIÓN DE LA SUBCATEGORÍA
              ======================================-->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                  <textarea maxlength="120" class="form-control input-lg descripcionSubCategoria" name="descripcionSubCategoria"  rows="3" placeholder="Ingresar descripción Subcategoría" required></textarea>

                </div> 

              </div>
              <!--=====================================
              ENTRADA PARA LAS PALABRAS CLAVES DE LA SUBCATEGORÍA
              ======================================-->

              <div class="form-group editarPalabrasClaves">
                
              
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

        
         $editarSubCategoria = new ControllerSubCategories();
         $editarSubCategoria -> ctrUpdateSubCategory();

        ?>

      </div>
      
    </div>

  </div>


  <?php

  
   $eliminarSubCategoria = new ControllerSubCategories();
   $eliminarSubCategoria -> ctrDeleteSubCategory();

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
