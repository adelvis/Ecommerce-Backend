/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORÍAS
=============================================*/


/*$.ajax({

 	url:"ajax/tableSubCategories.ajax.php",

 	success:function(respuesta){
		
		console.log("respuesta", respuesta);

 	}

}); */


$(".tablaSubCategorias").DataTable({

	 "ajax": "ajax/tableSubCategories.ajax.php",
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

$(".tablaSubCategorias tbody").on('click', '.btnActivar', function(event) {
	/* Act on the event */
	var idSubCategorias = $(this).attr('idSubCategoria');
	console.log('Línea 59. idSubCategorias => ', idSubCategorias);
	
	var estadoSubCategoria = $(this).attr('estadoSubCategoria');

	var datos = new FormData();

	datos.append('activeId', idSubCategorias);
	datos.append('activeSubCategory', estadoSubCategoria);

	$.ajax({
		url: 'ajax/subCategories.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
	})
	.done(function(respuesta) {
		//console.log('Línea 77. respuesta => ', respuesta);
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	});
	

	if(estadoSubCategoria ==0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html("Desactivado");
		$(this).attr('estadoSubCategoria',1);

	}else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html("Activado");
		$(this).attr('estadoSubCategoria',0);

	}





});


/*=============================================
VALIDAR SI LA CATEGORIA EXISTE
=============================================*/

$(".validarSubCategoria").change(function(event) {
	/* Act on the event */
	$(".alert").remove();
	var subcategory = $(this).val();
	console.log('Línea 115. subcategory => ', subcategory);
	
	var datos = new FormData();
	datos.append('subcategory', subcategory);

	$.ajax({
		url: 'ajax/subCategories.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
	})
	.done(function(respuesta) {

		console.log('Línea 138. respuesta => ', respuesta);
		console.log('Línea 138. respuesta Longitud=> ', respuesta.length);
		console.log("success");

		if(respuesta.length !=2){

			$(".validarSubCategoria").parent().after('<div class="alert alert-warning">Esta subcategoría ya existe en la Base de Datos</div>');
			$(".validarSubCategoria").val("");
			
		}
	})
	.fail(function() {
		console.log("error");
	});
	



});	

/*=============================================
	RUTA CATEGORIA
=============================================*/

function limpiarUrl(texto){

	var texto = texto.toLowerCase();

	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, '-');

	return texto;





}

$(".tituloSubCategoria").change(function(event) {
	/* Act on the event */


	$(".rutaSubCategoria").val(limpiarUrl($(".tituloSubCategoria").val()));
});

/*=============================================
	subiendo la foto de portada
=============================================*/

$(".fotoPortada").change(function(event) {
	/* Act on the event */

	var imagen = this.files[0];

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGE
	=============================================*/
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ){

		$(".fotoPortada").val("");

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

		$(".fotoPortada").val("");

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

			$(".previsualizarPortada").attr('src', rutaImagen);
		});

	}

});
/*==============================================================
		=    ACTIVAR OFERTA   =
===============================================================*/

function activarOferta(event){

	if(event=="oferta"){

		$(".datosOferta").show();
		$(".valorOferta").prop("required", true);
		$(".valorOferta").val("");


	}else{

		$(".datosOferta").hide();
		$(".valorOferta").prop("required", false);
		$(".valorOferta").val("");

	}


}

$(".selActivarOferta").change(function(event) {
	/* Act on the event */

	activarOferta($(this).val());


});

/*=============================================
VALOR OFERTA
=============================================*/
$(".valorOferta").change(function(){

	if($(this).attr("id") == "precioOferta"){

		$("#precioOferta").prop("readonly",true);
		$("#descuentoOferta").prop("readonly",false);
		$("#descuentoOferta").val(0);

	}

	if($(this).attr("id") == "descuentoOferta"){

		$("#descuentoOferta").prop("readonly",true);
		$("#precioOferta").prop("readonly",false);
		$("#precioOferta").val(0);

	}


});

/*=============================================
	subiendo la foto de oferta
=============================================*/

$(".fotoOferta").change(function(event) {
	/* Act on the event */

	var imagen = this.files[0];

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGE
	=============================================*/
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ){

		$(".fotoOferta").val("");

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

		$(".fotoOferta").val("");

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

			$(".previsualizarOferta").attr('src', rutaImagen);
		});

	}

});



/*=============================================
EDITAR SUBCATEGORIA
=============================================*/

$(".tablaSubCategorias tbody").on('click', '.btnEditarSubCategoria', function() {

	var idSubCategoria = $(this).attr('idSubCategoria');
	console.log('Línea 377. idSubCategoria => ', idSubCategoria);

	var datos = new FormData();

	datos.append('idSubCategory', idSubCategoria);

	$.ajax({
		url: 'ajax/subCategories.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
	})
	.done(function(respuesta) {
		console.log('Línea 395. respuesta => ', respuesta);
		
		$("#modalEditarSubCategoria .tituloSubCategoria").val(respuesta[0]["subcategory"]);
		$("#modalEditarSubCategoria .rutaSubCategoria").val(respuesta[0]["route"]);

		$("#modalEditarSubCategoria .editarIdSubCategoria").val(respuesta[0]["id"]);		

			/*=============================================
			EDITAR NOMBRE SUBCATEGORÍA Y RUTA
			=============================================*/

			$("#modalEditarSubCategoria .tituloSubCategoria").change(function(){

				$("#modalEditarSubCategoria .rutaSubCategoria").val(limpiarUrl($("#modalEditarSubCategoria .tituloSubCategoria").val()));

			})

			/*=============================================
			TRAEMOS DATOS DE LA CATEGORIA
			=============================================*/

			if(respuesta[0]["id_categories"] !=0){


				var datosCategoria = new FormData();
				datosCategoria.append("idCategory", respuesta[0]["id_categories"]);

				$.ajax({
						url: 'ajax/categories.ajax.php',
						method: "POST",
						data: datosCategoria,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
				})
				.done(function(respuesta) {
				//	console.log('Línea 430. respuesta categorias => ', respuesta);
				//	console.log("success");

					$("#modalEditarSubCategoria .seleccionarCategoria").val(respuesta["id"]);

					$("#modalEditarSubCategoria .optionEditarCategoria").html(respuesta["categories"]);



				})
				.fail(function() {
					console.log("error");
				});
			
			}else{

			
				$("#modalEditarSubCategoria .optionEditarCategoria").html("SIN CATEGORÍA");	


			}



			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/
					
			var datosCabecera = new FormData();
			datosCabecera.append("route", respuesta[0]["route"]);

			$.ajax({
				url:"ajax/head.ajax.php",
				method: "POST",
				data: datosCabecera,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
			})
			.done(function(respuesta) {
				console.log('Línea 428. respuesta Head => ', respuesta);

				$("#modalEditarSubCategoria .editarIdCabecera").val(respuesta["id"]);	
				/*=============================================
				TRAEMOS LA DESCRIPCIÒN
				=============================================*/
				$("#modalEditarSubCategoria .descripcionSubCategoria").val(respuesta["description"]);
				/*=============================================
				TRAEMOS LAS PALABRAS CLAVES
				=============================================*/
				if(respuesta["keywords"] != null){

					$(".editarPalabrasClaves").html(

							 '<div class="input-group">'+
                  
				                  '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

				                  '<input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves, seperadas por coma" name="pClavesCategoria" value="'+respuesta["keywords"]+'" required>'+ 

              				  '</div>');

					$("#modalEditarSubCategoria .pClavesCategoria").tagsinput('items');




				}else{

					$(".editarPalabrasClaves").html(

							 '<div class="input-group">'+
                  
				                  '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

				                  '<input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves, seperadas por coma" name="pClavesCategoria" value="" required>'+ 

              				  '</div>');

					$("#modalEditarSubCategoria .pClavesCategoria").tagsinput('items');


				}
				/*=============================================
				CARGAMOS LA IMAGEN DE LA PORTADA
				=============================================*/
				$("#modalEditarSubCategoria .previsualizarPortada").attr("src", respuesta["image"]);

				$("#modalEditarSubCategoria .antiguaFotoPortada").val(respuesta["image"]);

			})
			.fail(function() {
				console.log("error");
			});
			

			/*=============================================
				PREGUNTAMOS POR LAS OFERTAS
			=============================================*/

			if(respuesta[0]["offer"] !=0){

				$("#modalEditarSubCategoria .selActivarOferta").val("oferta");

				$("#modalEditarSubCategoria .datosOferta").show();

				$("#modalEditarSubCategoria .valorOferta").prop("required", true);

				$("#modalEditarSubCategoria #precioOferta").val(respuesta[0]["offerPrice"]);

				$("#modalEditarSubCategoria #descuentoOferta").val(respuesta[0]["discountOffer"]);

				if(respuesta[0]["offerPrice"] !=0){

					$("#modalEditarSubCategoria #precioOferta").prop("readonly", true);

					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly", false);
				}

				if(respuesta[0]["discountOffer"] !=0){

					$("#modalEditarSubCategoria #precioOferta").prop("readonly", false);

					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly", true);
				}

				/*=============================================
				CARGAMOS LA IMAGEN DE LA OFERTA
				=============================================*/
				$("#modalEditarSubCategoria .previsualizarOferta").attr("src", respuesta[0]["offerImagen"]);

				$("#modalEditarSubCategoria .antiguaFotoOferta").val(respuesta[0]["offerImagen"]);

				$("#modalEditarSubCategoria .finOferta").val(respuesta[0]["endOffer"]);


			}else{

				$("#modalEditarSubCategoria .selActivarOferta").val("");

				$("#modalEditarSubCategoria .datosOferta").hide();

				$("#modalEditarSubCategoria .valorOferta").prop("required", false);

				$("#modalEditarSubCategoria .previsualizarOferta").attr("src", "views/img/ofertas/default/default.jpg");

				$("#modalEditarSubCategoria .antiguaFotoOferta").val(respuesta[0]["offerImagen"]);

			}

			/*=============================================
				AL EDITAR UNA OFERTA
			=============================================*/

			$("#modalEditarSubCategoria .selActivarOferta").change(function(event) {
				/* Act on the event */

				activarOferta($(this).val());


			});

			/*=============================================
			VALOR OFERTA
			=============================================*/
			$("#modalEditarSubCategoria .valorOferta").change(function(){

				if($(this).attr("id") == "precioOferta"){

					$("#modalEditarSubCategoria #precioOferta").prop("readonly",true);
					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly",false);
					$("#modalEditarSubCategoria #descuentoOferta").val(0);

				}

				if($(this).attr("id") == "descuentoOferta"){

					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly",true);
					$("#modalEditarSubCategoria #precioOferta").prop("readonly",false);
					$("#modalEditarSubCategoria #precioOferta").val(0);

				}


			});




	})
	.fail(function() {
		console.log("error");
	});
	





});

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablaSubCategorias tbody").on("click", ".btnEliminarSubCategoria", function(){

	var idSubCategoria = $(this).attr("idsubcategoria");
  	var imgOferta = $(this).attr("imgOferta");
  	var rutaCabecera = $(this).attr("rutaCabecera");
  	var imgPortada = $(this).attr("imgPortada");

  	swal({
    	title: '¿Está seguro de borrar la categoría?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

    	if(result.value){

      	window.location = "index.php?ruta=subcategory&idSubCategoria="+idSubCategoria+"&imgOferta="+imgOferta+"&rutaCabecera="+rutaCabecera+"&imgPortada="+imgPortada;

    	}

  	})

})

