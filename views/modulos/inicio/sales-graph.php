  <!-- =============================================
   Grafico de ventas
  ============================================== -->

<?php


  $salesByYearMonth = ControllerSales::ctrViewTotalSalesByYearMonth();

  $totalSales = ControllerSales::ctrViewTotalSales();

  $sales = ControllerSales::ctrViewSales();

  $totalPaypal =0;

  $totalPayu =0;

  $percentagePaypal = 0;

  $percentagePayu = 0;


  foreach ($sales as $key => $value) {
    # code...
    if($value["method"]!="gratis"){

        /*=============================================
        =           Porcentaje paypal          =
        =============================================*/

        if($value["method"]=="paypal"){

            $totalPaypal += $value["quantity"] * $value["price"];

            $percentagePaypal = ($totalPaypal* 100)/$totalSales["total"];

        }

         /*=============================================
        =           Porcentaje payu          =
        =============================================*/

        if($value["method"]=="payu"){

            $totalPayu += $value["quantity"] * $value["price"];

            $percentagePayu = $totalPayu* 100/ $totalSales["total"];

        }




    }

  }




?>




    <!-- solid sales graph -->
  <div class="box box-solid bg-teal-gradient">

  	<!--box-header -->
    <div class="box-header">

      <i class="fa fa-th"></i>

      <h3 class="box-title">Gráfico de Ventas</h3>

      <div class="box-tools pull-right">

        <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        
      </div>

    </div>
	<!--box-header -->

	<!--box-body -->
    <div class="box-body border-radius-none">

      <div class="chart" id="line-chart" style="height: 250px;"></div>

    </div>
    <!-- /.box-body -->

    <!--box-footer -->
    <div class="box-footer no-border">

      <div class="row">

        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">

          <input type="text" class="knob" data-readonly="true" value="<?php  echo round($percentagePaypal);  ?>" data-width="60" data-height="60"
                 data-fgColor="#39CCCC">

          <div class="knob-label">Paypal</div>

        </div>
        <!-- ./col -->

        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">

          <input type="text" class="knob" data-readonly="true" value="<?php  echo round($percentagePayu);  ?>" data-width="60" data-height="60"
                 data-fgColor="#39CCCC">

          <div class="knob-label">Payu</div>

        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
   <!-- Morris.js charts 
  <script src="views/bower_components/raphael/raphael.min.js"></script>
  <script src="views/bower_components/morris.js/morris.min.js"></script>  -->

  <script>
  /* Morris.js Charts */
  // Sales chart
   

		var line = new Morris.Line({
		    element          : 'line-chart',
		    resize           : true,
		    data             : [

          <?php

              foreach ($salesByYearMonth as $key => $value) {

                echo "{ y: '".$value["month_year"]."', ventas: ".$value["total"]." }," ;
                            

              }

              echo "{ y: '".$value["month_year"]."', ventas: ".$value["total"]." }" ;


          ?>

   	      
		    ],
		    xkey             : 'y',
		    ykeys            : ['ventas'],
		    labels           : ['ventas'],
		    lineColors       : ['#efefef'],
		    lineWidth        : 2,
		    hideHover        : 'auto',
		    gridTextColor    : '#fff',
		    gridStrokeWidth  : 0.4,
		    pointSize        : 4,
		    pointStrokeColors: ['#efefef'],
		    gridLineColor    : '#efefef',
		    gridTextFamily   : 'Open Sans',
        preUnits         : '$',
		    gridTextSize     : 10
		  });





  </script>