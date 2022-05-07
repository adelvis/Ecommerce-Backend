/*=============================================
CARGAR LA TABLA DINÁMICA DE CATEGORÍAS
=============================================*/

/*$.ajax({

 	url:"ajax/tableBanner.ajax.php",
 	success:function(respuesta){
		
		console.log("respuesta", respuesta);

 	}

})
*/

$(".tablaBanner").DataTable({

	 "ajax": "ajax/tableBanner.ajax.php",
	 "deferRender":true,
	 "retrieve": true,
	 "processing":true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	 }

});


/*=============================================
ACTIVAR CATEGORIA
=============================================*/

$(".tablaBanner tbody").on('click', '.btnActivar', function() {
	/* Act on the event */
	var idBanner = $(this).attr('idBanner');
	
	var estadoBanner = $(this).attr('estadoBanner');

	var datos = new FormData();

	datos.append('activeId', idBanner);
	datos.append('activeBanner', estadoBanner);

	$.ajax({
		url: 'ajax/banner.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
	})
	.done(function(respuesta) {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	});
	
	if(estadoBanner ==0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html("Desactivado");
		$(this).attr('estadoBanner',1);

	}else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html("Activado");
		$(this).attr('estadoBanner',0);

	}





});

/*=============================================
	SUBIENDO LA IMAGEN DEL BANNER
=============================================*/

$(".fotoBanner").change(function(event) {
	/* Act on the event */

	var imagen = this.files[0];

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGE
	=============================================*/
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ){

		$(".fotoBanner").val("");

		swal({

			title: "Error al subir la imagen",
			text : "¡La imagen debe estar en formato JPG o PNG",
			type : "error",
			confirmButtonText: "¡Cerrar!"

		});

		return;

	}else if(imagen["size"]> 2000000){
		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
		===============================================================*/

		$(".fotoBanner").val("");

		swal({

			title: "Error al subir la imagen",
			text : "¡La imagen no debe pesar más de 2MB!",
			type : "error",
			confirmButtonText: "¡Cerrar!"

		});

		return;


	}else{
		/*==============================================================
		=    PREVISUALIZAMOS LA IMAGE    =
		===============================================================*/

		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on('load', function(event) {
			var rutaImagen = event.target.result;

			$(".previsualizarBanner").attr('src', rutaImagen);
		});

	}

});


/*==============================================================
		=    SELECCIONAR RUTA DEL BANNER    =
===============================================================*/

$(".seleccionarTipoBanner").change(function() {
	/* Act on the event */

	var tipoBanner =  $(this).val();

	
	$(".seleccionarRutaBanner").html();


	if(tipoBanner != "sin-categoria"){

		$(".seleccionarRutaBanner").attr('name', 'rutaBanner');

		var datos = new FormData();

		datos.append('table', tipoBanner);


		$.ajax({
			url: 'ajax/banner.ajax.php',
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			})
		.done(function(respuesta) {
			
			//console.log("success");

			$(".entradaRutaBanner").show();

			$(".seleccionarRutaBanner").html(

				'<option value="">Selecciona la ruta</option>'

			);


			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index){

				$(".seleccionarRutaBanner").append(

					'<option value="'+item["route"]+'">'+item["route"]+'</option>'


				)


			}




		})
		.fail(function() {
			console.log("error");
		});
		




	}else{


		$(".entradaRutaBanner").hide();



	}


});

/*==============================================================
		=  REVISAR SI LA RUTA YA EXISTE    =
===============================================================*/

$(document).on('change', '#modalAgregarBanner .seleccionarRutaBanner, #modalAgregarBanner .seleccionarTipoBanner', function() {
	
	$(".alert").remove();


	var ruta = $(this).val();

	var datos = new FormData();

	datos.append('validateRoute', ruta);

	$.ajax({
		url: 'ajax/banner.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		
	})
	.done(function(respuesta) {
		console.log('Línea 276. respuesta => ', respuesta);
		console.log("success");

		if(respuesta != "false"){

			if(ruta == "sin-categoria"){

				$(".seleccionarTipoBanner").parent().after('<div class="alert alert-warning">Esta ruta ya existe en la Base de Datos</div>');
				$(".seleccionarTipoBanner").val("");


			}else{

				$(".seleccionarRutaBanner").parent().after('<div class="alert alert-warning">Esta ruta ya existe en la Base de Datos</div>');
				$(".seleccionarRutaBanner").val("");


			}

			
			
		}
	})
	.fail(function() {
		console.log("error");
	});
	



});


/*=============================================
EDITAR BANNER
=============================================*/

$(".tablaBanner tbody").on("click", ".btnEditarBanner", function(){



	var idBanner = $(this).attr("idBanner");


	var datos = new FormData();
	datos.append("idBanner", idBanner);


	$.ajax({
		url: 'ajax/banner.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
	})
	.done(function(respuesta) {
		
		//console.log("success");
		$("#modalEditarBanner .idBanner").val(respuesta["id"]);

		/*=============================================
		CARGAMOS LA IMAGEN DE BANNER
		=============================================*/

		$("#modalEditarBanner .previsualizarBanner").attr("src", respuesta["img"]);
		$("#modalEditarBanner .antiguaFotoBanner").val(respuesta["img"]);

		/*=============================================
		CARGAMOS EL TIPO DE BANNER
		=============================================*/

		$("#modalEditarBanner .seleccionarTipoBanner").val(respuesta["type"]);


		$("#modalEditarBanner .optionEditarTipoBanner").html(respuesta["type"]);

		/*=============================================
		CARGAMOS LA RUTA DEL BANNER
		=============================================*/

		if(respuesta["type"] != "sin-categoria"){

			$("#modalEditarBanner .entradaRutaBanner").show();

			$("#modalEditarBanner .seleccionarRutaBanner").html(

				'<option class="optionEditarRutaBanner"></option>'
			);
			$("#modalEditarBanner .optionEditarRutaBanner").val(respuesta["route"]);

			$("#modalEditarBanner .optionEditarRutaBanner").html(respuesta["route"]);

			$("#modalEditarBanner .seleccionarRutaBanner").attr("name","rutaBanner");

		
			var datos = new FormData();
			datos.append("table", respuesta["type"]);
			
			$.ajax({
				url: 'ajax/banner.ajax.php',
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
			})
			.done(function(respuesta) {
				
				respuesta.forEach(funcionForEach);

		        function funcionForEach(item, index){

		        	$("#modalEditarBanner .seleccionarRutaBanner").append(

	    				'<option value="'+item["route"]+'">'+item["route"]+'</option>'

	    			)

		        }



			})
			.fail(function() {
				console.log("error");
			});
			


		}else{

			$("#modalEditarBanner .entradaRutaBanner").hide();


		}


	})
	.fail(function() {
		console.log("error");
	});
	








})


/*=============================================
ELIMINAR BANNER
=============================================*/
$(".tablaBanner tbody").on("click", ".btnEliminarBanner", function(){

	var idBanner = $(this).attr("idBanner");
  	var imgBanner = $(this).attr("imgBanner");

	swal({
    	title: '¿Está seguro de borrar el banner?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar banner!'
	 	}).then(function(result){

    	if(result.value){

      	window.location = "index.php?ruta=banner&idBanner="+idBanner+"&imgBanner="+imgBanner;

    	}

  	})



})
