<?php

  
  $slider = ControllerSlider::ctrViewSlider();



?>

 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor Slider
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor Slider</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary agregarSlide">
            
              Agregar Slider

          </button>

          
        </div>

        <div class="box-body">

            <ul class="todo-list">
          
              <?php

              foreach ($slider as $key => $value) {
                # code...
              $styleImgProduct = json_decode($value["styleImgProduct"],true);

              $textSlide = json_decode($value["styleTextSlide"],true);

              $title1 = json_decode($value["title1"],true);

              $title2 = json_decode($value["title2"],true);

              $title3 = json_decode($value["title3"],true);



              echo '<li class="itemSlide" id="'.$value["id"].'">


                    <div class="box-group" id="accordion">

                        <!--=====================================
                        =      CAJA GESTOR SLIDER     =
                        ======================================-->
                       
                        <div class="panel box box-info">
                              
                            <!--=====================================
                            =   CABECERA DE LA CAJA GESTOR SLIDER     =
                            ======================================-->
                
                            <div class="box-header with-border">

                                <span class="handle">
                                  <i class="fa fa-ellipsis-v"></i>
                                  <i class="fa fa-ellipsis-v"></i>
                                </span>

                              
                                 <h4 class="box-title">

                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value["id"].'">';
                                
                                  if($value["name"] != ""){

                                     echo '<p class="text-uppercase">'.$value["name"].'</p>';
                                  
                                  }else{

                                    echo 'Slide '.$value["id"];

                                  }

                                  echo '</a>

                                  </h4>
                              


                                  <div class="btn-group pull-right">

                                    <button class="btn btn-primary guardarSlide"
                                      id="'.$value["id"].'"
                                      nombreSlide="'.$value["name"].'"
                                      indice="'.$key.'"
                                      tipoSlide="'.$value["typeSlide"].'"
                                      estiloImgProductoTop="'.$styleImgProduct["top"].'"
                                      estiloImgProductoRight="'.$styleImgProduct["right"].'"
                                      estiloImgProductoLeft="'.$styleImgProduct["left"].'"
                                      estiloImgProductoWidth="'.$styleImgProduct["width"].'"
                                      estiloTextoSlideTop="'.$textSlide["top"].'" 
                                      estiloTextoSlideRight="'.$textSlide["right"].'" 
                                      estiloTextoSlideLeft="'.$textSlide["left"].'" 
                                      estiloTextoSlideWidth="'.$textSlide["width"].'"
                                      imgFondo="'.$value["imgBack"].'"
                                      rutaImgFondo="'.$value["imgBack"].'"
                                      imgProducto="'.$value["imgProduct"].'"
                                      rutaImgProducto="'.$value["imgProduct"].'"
                                      titulo1Texto="'.$title1["texto"].'"
                                      titulo1Color="'.$title1["color"].'"
                                      titulo2Texto="'.$title2["texto"].'"
                                      titulo2Color="'.$title2["color"].'"
                                      titulo3Texto="'.$title3["texto"].'"
                                      titulo3Color="'.$title3["color"].'"
                                      boton="'.$value["button"].'"
                                      url="'.$value["url"].'"

                                    > <i class="fa fa-floppy-o"></i></button>
                                    
                                    <button class="btn btn-danger eliminarSlide"
                                      id="'.$value["id"].'"
                                      imgFondo="'.$value["imgBack"].'"
                                      imgProducto="'.$value["imgProduct"].'"

                                    ><i class="fa fa-times"></i></button>
                              
                                  </div>

                            </div>

                            <!--=====================================
                            =     MODULO COLAPSABLES    =
                            ======================================-->

                            <div id="collapse'.$value["id"].'" class="panel-collapse collapse collapseSlide">
                                
                                <!--=====================================
                                  EDITOR SLIDE
                                ======================================-->    
                               
                              <div class="row">

                                  <div class="col-md-4 col-xs-12">

                                        <div class="box-body">

                                              <!--=====================================
                                              MODIFICAR NOMBRE SLIDE
                                              ======================================-->   

                                              <div class="form-group">
                          
                                                <label>Nombre del Slide:</label>

                                                <input type="text" class="form-control nombreSlide" indice="'.$key.'" value="'.$value["name"].'">

                                              </div>  

                                               <!--=====================================
                                                MODIFICAR EL TIPO DE SLIDE
                                                ======================================--> 

                                                <div class="form-group">

                                                  <input type="hidden" class="tipoSlide" value="'.$value["typeSlide"].'">

                                                  <label>Tipo de Slide:</label>

                                                  <label class="checkbox-inline selTipoSlide">
                                                  
                                                    <input class="tipoSlideIzq" type="radio" value="slideOpcion1" name="tipoSlide'.$key.'" indice="'.$key.'">

                                                    Izquierda

                                                  </label>

                                                  <label class="checkbox-inline selTipoSlide">
                                                  
                                                    <input class="tipoSlideDer" type="radio" value="slideOpcion2" name="tipoSlide'.$key.'" indice="'.$key.'">

                                                    Derecha

                                                  </label>

                                                </div> 
                                                <!--=====================================
                                                MODIFICAR EL FONDO DE SLIDE
                                                ======================================--> 
                                                <div class="form-group">

                                                    <label>Cambiar Imagen Fondo:</label>
        
                                                    <br>

                                                    <p class="help-block">
                                                        <img src="'.$value["imgBack"].'" class="img-thumbnail previsualizarFondo" width="200px">
                                                    </p>

                                                    <input type="file" class="subirFondo" indice="'.$key.'">

                                                    <p class="help-block">Tamaño recomendado 1600px* 520px </p>

                                                </div>

                                                <!--=====================================
                                                MODIFICAR EL BOTON DEL SLIDE
                                                ======================================--> 
                                                <div class="form-group">

                                                    <label>Texto del Botón:</label>
                                                    
                                                    <input type="text" class="form-control botonSlide" indice="'.$key.'" value="'.$value["button"].'" placeholder="EJEMPLO: IR AL PRODUCTO">

                                                </div>

                                                <div class="form-group">

                                                    <label>Url del Boton:</label>

                                                    <input type="text" class="form-control urlSlide" indice="'.$key.'" value="'.$value["url"].'" placeholder="EJEMPLO: http://wwww.google.com">
        
                                                </div>

                                        </div>

                                  </div>
                                <!--=====================================
                                  SEGUNDO BLOQUE
                                ======================================--> 
                                <div class="col-md-4 col-xs-12">

                                     <div class="box-body">
                                        
                                            <!--=====================================
                                            MODIFICAR LA IMAGEN DEl SLIDE
                                            ======================================--> 
                                            <div class="form-group">

                                                <label>Cambiar Imagen Producto:</label>

                                                <br>

                                                <p class="help-block">
                                                    <img src="'.$value["imgProduct"].'" class="img-thumbnail previsualizarProducto" width="200px">
                                                </p>

                                                <input type="file" class="subirImgProducto" indice="'.$key.'">

                                                <p class="help-block">Tamaño recomendado 600px* 600px </p>

                                            </div>
                                            <!--=====================================
                                            MODIFICAR LA POSICION DE LA IMAGEN DEl SLIDE
                                            ======================================--> 

                                            <div class="form-group">
                                                
                                                <label>Posición VERTICAL de la imagen del producto: </label>

                                                <input type="text" indice="'.$key.'" value="" class="slider form-control posVertical posVertical'.$key.'" 
                                                  data-slider-min="0" 
                                                  data-slider-max="50"
                                                  data-slider-step="5"
                                                  data-slider-value="'.$styleImgProduct["top"].'" 
                                                  data-slider-orientation="horizontal"
                                                  data-slider-selection="before" 
                                                  data-slider-tooltip="show" 
                                                  data-slider-id="red">

                                                 <label>Posición HORIZONTAL de la imagen del producto: </label>';

                                                 if($value["typeSlide"]=="slideOpcion1"){

                                                    echo ' <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontal posHorizontal'.$key.'" 
                                                      tipoSlide ="'.$value["typeSlide"].'"
                                                      data-slider-min="0" 
                                                      data-slider-max="50"
                                                      data-slider-step="5"
                                                      data-slider-value="'.$styleImgProduct["right"].'" 
                                                      data-slider-orientation="horizontal"
                                                      data-slider-selection="before" 
                                                      data-slider-tooltip="show" 
                                                      data-slider-id="blue">';




                                                 }else{

                                                     echo ' <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontal posHorizontal'.$key.'" 
                                                      tipoSlide ="'.$value["typeSlide"].'"
                                                      data-slider-min="0" 
                                                      data-slider-max="50"
                                                      data-slider-step="5"
                                                      data-slider-value="'.$styleImgProduct["left"].'" 
                                                      data-slider-orientation="horizontal"
                                                      data-slider-selection="before" 
                                                      data-slider-tooltip="show" 
                                                      data-slider-id="blue">';




                                                 }


                                     echo '      <label>ANCHO de la imagen del producto: </label>

                                                  <input type="text" indice="'.$key.'" value="" class="slider form-control anchoImagen anchoImagen'.$key.'" 
                                                  data-slider-min="0" 
                                                  data-slider-max="50"
                                                  data-slider-step="5"
                                                  data-slider-value="'.$styleImgProduct["width"].'" 
                                                  data-slider-orientation="horizontal"
                                                  data-slider-selection="before" 
                                                  data-slider-tooltip="show" 
                                                  data-slider-id="green">


                                          </div>

                                     </div>

                                </div>


                                <!--=====================================
                                  TERCER BLOQUE
                                ======================================--> 
                                <div class="col-md-4 col-xs-12">

                                     <div class="box-body">
                                        
                                            <!--=====================================
                                            MODIFICAR  TITULO 1 DEl SLIDE
                                            ======================================--> 
                                            <div class="form-group">

                                                <label>Titulo 1:</label>

                                                <input type="text" class="form-control cambioTituloTexto1" indice="'.$key.'" value="'.$title1["texto"].'">

                                                <div class="input-group my-colorpicker">
                  
                                                    <input type="text" class="form-control cambioColorTexto1" indice="'.$key.'"  value="'.$title1["color"].'">

                                                    <div class="input-group-addon">
                                                        <i></i>
                                                    </div>
                                                      
                                                </div>

                                            </div>

                                            <!--=====================================
                                            MODIFICAR  TITULO 2 DEl SLIDE
                                            ======================================--> 
                                            <div class="form-group">

                                                <label>Titulo 2:</label>

                                                <input type="text" class="form-control cambioTituloTexto2" indice="'.$key.'" value="'.$title2["texto"].'">

                                                <div class="input-group my-colorpicker">
                  
                                                    <input type="text" class="form-control cambioColorTexto2" indice="'.$key.'"  value="'.$title2["color"].'">

                                                    <div class="input-group-addon">
                                                        <i></i>
                                                    </div>
                                                      
                                                </div>

                                            </div>

                                             <!--=====================================
                                            MODIFICAR  TITULO 3 DEl SLIDE
                                            ======================================--> 
                                            <div class="form-group">

                                                <label>Titulo 3:</label>

                                                <input type="text" class="form-control cambioTituloTexto3" indice="'.$key.'" value="'.$title3["texto"].'">

                                                <div class="input-group my-colorpicker">
                  
                                                    <input type="text" class="form-control cambioColorTexto3" indice="'.$key.'"  value="'.$title3["color"].'">

                                                    <div class="input-group-addon">
                                                        <i></i>
                                                    </div>
                                                      
                                                </div>

                                            </div>
                                             <!--==========================================
                                            MODIFICAR LA POSICION DE LOS TITULOS DEl SLIDE
                                            ===============================================--> 
                                            <div class="form-group">
                                                
                                                <label>Posición VERTICAL del texto: </label>

                                                <input type="text" indice="'.$key.'" value="" class="slider form-control posVerticalTexto posVerticalTexto'.$key.'" 
                                                  data-slider-min="0" 
                                                  data-slider-max="50"
                                                  data-slider-step="5"
                                                  data-slider-value="'.$textSlide["top"].'" 
                                                  data-slider-orientation="horizontal"
                                                  data-slider-selection="before" 
                                                  data-slider-tooltip="show" 
                                                  data-slider-id="red">

                                                 <label>Posición HORIZONTAL del texto: </label>';

                                                 if($value["typeSlide"]=="slideOpcion1"){

                                                    echo ' <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontalTexto posHorizontalTexto'.$key.'" 
                                                      tipoSlide ="'.$value["typeSlide"].'"
                                                      data-slider-min="0" 
                                                      data-slider-max="50"
                                                      data-slider-step="5"
                                                      data-slider-value="'.$textSlide["left"].'" 
                                                      data-slider-orientation="horizontal"
                                                      data-slider-selection="before" 
                                                      data-slider-tooltip="show" 
                                                      data-slider-id="blue">';




                                                 }else{

                                                     echo ' <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontalTexto posHorizontalTexto'.$key.'" 
                                                      tipoSlide ="'.$value["typeSlide"].'"
                                                      data-slider-min="0" 
                                                      data-slider-max="50"
                                                      data-slider-step="5"
                                                      data-slider-value="'.$textSlide["right"].'" 
                                                      data-slider-orientation="horizontal"
                                                      data-slider-selection="before" 
                                                      data-slider-tooltip="show" 
                                                      data-slider-id="blue">';




                                                 }


                                     echo '      <label>ANCHO de la imagen del producto: </label>

                                                  <input type="text" indice="'.$key.'" value="" class="slider form-control anchoTexto anchoTexto'.$key.'" 
                                                  data-slider-min="0" 
                                                  data-slider-max="50"
                                                  data-slider-step="5"
                                                  data-slider-value="'.$textSlide["width"].'" 
                                                  data-slider-orientation="horizontal"
                                                  data-slider-selection="before" 
                                                  data-slider-tooltip="show" 
                                                  data-slider-id="green">


                                          </div>

                                     </div>

                                </div>



                              </div>
                                <!--=====================================
                                VISOR SLIDER
                                ======================================-->    
                                <div class="slide">


                                  <img class="cambiarFondo" src="'.$value["imgBack"].'">
                                
                                  <div class="slideOpciones '.$value["typeSlide"].'">

                                     
                                        <img class="imgProducto" src="'.$value["imgProduct"].'" style="top:'.$styleImgProduct["top"].'%; right:'.$styleImgProduct["right"].'%; width:'.$styleImgProduct["width"].'%; left:'.$styleImgProduct["left"].'%">

                                        <div class="textosSlide" style="top:'.$textSlide["top"].'%; left:'.$textSlide["left"].'%;width:'.$textSlide["width"].'%; right:'.$textSlide["right"].'%">

                                            <h1 style="color:'.$title1["color"].'">'.$title1["texto"].'</h1>
                                            
                                            <h2 style="color:'.$title2["color"].'">'.$title2["texto"].'</h2>

                                            <h3 style="color:'.$title3["color"].'">'.$title3["texto"].'</h3>';

                                            if($value["button"] != ""){

                                              echo '<a href="'.$value["url"].'">

                                                  <button class="btn btn-default backColor text-uppercase">

                                                  '.$value["button"].' <span class="fa fa-chevron-right"></span>

                                                  </button>


                                                 </a>';

                                            }
                                      echo '</div>

                                  </div>

                                </div>

                            </div>

                        </div>

                    </div>
                
                    </li>
                ';


              }





              ?>





            </ul>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    

    $eliminarSlide = new ControllerSlider();
    $eliminarSlide->ctrDeleteSlide();


?>