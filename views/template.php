<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tienda Online | Panel de Control</title>

  <link rel="icon" href="views/img/plantilla/icono.png">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="views/dist/css/skins/skin-blue.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="views/plugins/iCheck/square/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="views/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
  <link rel="stylesheet" href="views/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  <link rel="stylesheet" href="views/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"> 
  <!-- bootstrap slider-->
  <link rel="stylesheet" href="views/plugins/bootstrap-slider/slider.css"> 
  <!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- Bootstrap tags input -->
  <link rel="stylesheet" href="views/plugins/tags/bootstrap-tagsinput.css">
  <!-- Bootstrap datapicker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Dropzone -->
  <link rel="stylesheet" href="views/plugins/dropzone/dropzone.css">



   <!-- CSS PERSONALIZADO -->
  <link rel="stylesheet" href="views/css/template.css"> 
  <link rel="stylesheet" href="views/css/slider.css"> 



  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4-->
  <script src="views/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="views/plugins/iCheck/icheck.min.js"></script>
   <!-- jQuery Knob Chart -->
  <script src="views/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- jvectormap -->
  <script src="views/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="views/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- ChartJS -->
  <script src="views/bower_components/chart.js/Chart.js"></script>

  <script src="views/morris.js"></script>
   <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  <script src="views/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- Bootstrap slider http://seiyria.com/bootstrap-slider/-->
  <script src="views/plugins/bootstrap-slider/bootstrap-slider.js"></script>
  <!-- DataTables -->
  <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- Bootstrap tags input -->
  <script src="views/plugins/tags/bootstrap-tagsinput.min.js"></script>
  <!-- Bootstrap datapicker -->
  <script src="views/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
   <!-- Dropzone -->
  <script src="views/plugins/dropzone/dropzone.js"></script>

  
</head>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse login-page">


  <?php


    


      if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

          //-- Site wrapper -->
          echo '<div class="wrapper">';

          /*===============================================
          =                   HEARDER                     =
          ===============================================*/

          include "modulos/header.php";

          /*===============================================
          =                    LATERAL                    =
          ===============================================*/

          include "modulos/sideMenu.php";

          /*===============================================
          =                   CONTENIDO                  =
          ===============================================*/

          if(isset($_GET["ruta"])){

              if($_GET["ruta"]=="inicio"  ||
                $_GET["ruta"]=="commerce"  ||
                $_GET["ruta"]=="slider"  ||
                $_GET["ruta"]=="categories"  ||
                $_GET["ruta"]=="subcategory"  ||
                $_GET["ruta"]=="products"  ||
                $_GET["ruta"]=="banner"  ||
                $_GET["ruta"]=="sales"  ||
                $_GET["ruta"]=="visits"  ||
                $_GET["ruta"]=="users"  ||
                $_GET["ruta"]=="messages"  ||
                $_GET["ruta"]=="profiles"  ||
                $_GET["ruta"]=="profile" ||
                $_GET["ruta"]=="logout")
              {

                  include "modulos/".$_GET["ruta"].".php";

              }

          }else{

            include "modulos/inicio.php";
          }

          /*===============================================
          =                  FOOTER                =
          ===============================================*/

          include "modulos/footer.php";
          echo '</div>';

      }else{ 

        include "modulos/login.php"; 

     }


  ?>
  <script src="views/js/template.js"></script>
  <script src="views/js/managerCommerce.js"></script>
  <script src="views/js/managerSlide.js"></script>
  <script src="views/js/managerCategories.js"></script>
  <script src="views/js/managerSubCategories.js"></script>
  <script src="views/js/managerProducts.js"></script>
  <script src="views/js/managerBanner.js"></script>
  <script src="views/js/managerSales.js"></script>
  <script src="views/js/managerVisit.js"></script>
  <script src="views/js/managerUsers.js"></script>
  <script src="views/js/managerAdministrators.js"></script>
  <script src="views/js/managerNotifications.js"></script>

  
</body>
</html>