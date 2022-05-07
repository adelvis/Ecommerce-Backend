/*=============================================
CARGAR LA TABLA DINÁMICA DE CATEGORÍAS
=============================================*/

$.ajax({

	url: "ajax/tableCategories.ajax.php",
	success: function (respuesta) {

		console.log("respuesta", respuesta);

	}

})

$(".tablaCategorias").DataTable({

	"ajax": "ajax/tableCategories2.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

/*=============================================
ACTIVAR CATEGORIA
=============================================*/

$(".tablaCategorias tbody").on('click', '.btnActivar', function (event) {
	/* Act on the event */
	var idCategorias = $(this).attr('idCategoria');
	console.log('Línea 71. idCategorias => ', idCategorias);
	var estadoCategoria = $(this).attr('estadoCategoria');

	var datos = new FormData();

	datos.append('activeId', idCategorias);
	datos.append('activeCategorie', estadoCategoria);

	$.ajax({
		url: 'ajax/categories.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
	})
		.done(function () {
			console.log("success");
		})
		.fail(function () {
			console.log("error");
		});


	if (estadoCategoria == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html("Desactivado");
		$(this).attr('estadoCategoria', 1);

	} else {
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html("Activado");
		$(this).attr('estadoCategoria', 0);

	}





});

/*=============================================
VALIDAR SI LA CATEGORIA EXISTE
=============================================*/

$(".validarCategoria").change(function (event) {
	/* Act on the event */
	$(".alert").remove();
	var category = $(this).val();
	console.log('Línea 124. category => ', category);

	var datos = new FormData();
	datos.append('category', category);

	$.ajax({
		url: 'ajax/categories.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
	})
		.done(function (respuesta) {
			console.log('Línea 138. respuesta => ', respuesta);
			console.log("success");
			if (respuesta != "false") {

				$(".validarCategoria").parent().after('<div class="alert alert-warning">Esta categoría ya existe en la Base de Datos</div>');
				$(".validarCategoria").val("");
				$(".rutaCategoria").val("");

			}
		})
		.fail(function () {
			console.log("error");
		});




});

/*=============================================
	RUTA CATEGORIA
=============================================*/

function limpiarUrl(texto) {

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

$(".tituloCategoria").change(function (event) {
	/* Act on the event */

	$(".rutaCategoria").val(limpiarUrl($(".tituloCategoria").val()));
});

/*=============================================
	subiendo la foto de portada
=============================================*/

$(".fotoPortada").change(function (event) {
	/* Act on the event */

	var imagen = this.files[0];

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGE
	=============================================*/
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".fotoPortada").val("");

		swal({

			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG",
			type: "error",
			confirmButtonText: "¡Cerrar!"

		});

		return;

	} else if (imagen["size"] > 2000000) {
		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
		===============================================================*/

		$(".fotoPortada").val("");

		swal({

			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"

		});

		return;


	} else {
		/*==============================================================
		=    PREVISUALIZAMOS LA IMAGE    =
		===============================================================*/

		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on('load', function (event) {
			var rutaImagen = event.target.result;

			$(".previsualizarPortada").attr('src', rutaImagen);
		});

	}

});

/*==============================================================
		=    ACTIVAR OFERTA   =
===============================================================*/

function activarOferta(event) {

	if (event == "oferta") {

		$(".datosOferta").show();
		$(".valorOferta").prop("required", true);
		$(".valorOferta").val("");


	} else {

		$(".datosOferta").hide();
		$(".valorOferta").prop("required", false);
		$(".valorOferta").val("");

	}


}

$(".selActivarOferta").change(function (event) {
	/* Act on the event */

	activarOferta($(this).val());


});

/*=============================================
VALOR OFERTA
=============================================*/
$(".valorOferta").change(function () {

	if ($(this).attr("id") == "precioOferta") {

		$("#precioOferta").prop("readonly", true);
		$("#descuentoOferta").prop("readonly", false);
		$("#descuentoOferta").val(0);

	}

	if ($(this).attr("id") == "descuentoOferta") {

		$("#descuentoOferta").prop("readonly", true);
		$("#precioOferta").prop("readonly", false);
		$("#precioOferta").val(0);

	}


});

/*=============================================
	subiendo la foto de oferta
=============================================*/

$(".fotoOferta").change(function (event) {
	/* Act on the event */

	var imagen = this.files[0];

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGE
	=============================================*/
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".fotoOferta").val("");

		swal({

			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG",
			type: "error",
			confirmButtonText: "¡Cerrar!"

		});

		return;

	} else if (imagen["size"] > 2000000) {
		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
		===============================================================*/

		$(".fotoOferta").val("");

		swal({

			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"

		});

		return;


	} else {
		/*==============================================================
		=    PREVISUALIZAMOS LA IMAGE    =
		===============================================================*/

		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on('load', function (event) {
			var rutaImagen = event.target.result;

			$(".previsualizarOferta").attr('src', rutaImagen);
		});

	}

});


/*=============================================
EDITAR CATEGORIA
=============================================*/

$(".tablaCategorias tbody").on('click', '.btnEditarCategoria', function () {

	var idCategoria = $(this).attr('idcategoria');

	var datos = new FormData();

	datos.append('idCategory', idCategoria);

	$.ajax({
		url: 'ajax/categories.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
	})
		.done(function (respuesta) {
			console.log('Línea 395. respuesta => ', respuesta);

			$("#modalEditarCategoria .tituloCategoria").val(respuesta["categories"]);
			$("#modalEditarCategoria .rutaCategoria").val(respuesta["route"]);

			$("#modalEditarCategoria .editarIdCategoria").val(respuesta["id"]);

			/*=============================================
			EDITAR NOMBRE CATEGORÍA Y RUTA
			=============================================*/

			$("#modalEditarCategoria .tituloCategoria").change(function () {

				$("#modalEditarCategoria .rutaCategoria").val(limpiarUrl($("#modalEditarCategoria .tituloCategoria").val()));

			})

			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/

			var datosCabecera = new FormData();
			datosCabecera.append("route", respuesta["route"]);

			$.ajax({
				url: "ajax/head.ajax.php",
				method: "POST",
				data: datosCabecera,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
			})
				.done(function (respuesta) {
					console.log('Línea 428. respuesta => ', respuesta);

					$("#modalEditarCategoria .editarIdCabecera").val(respuesta["id"]);
					/*=============================================
					TRAEMOS LA DESCRIPCIÒN
					=============================================*/
					$("#modalEditarCategoria .descripcionCategoria").val(respuesta["description"]);
					/*=============================================
					TRAEMOS LAS PALABRAS CLAVES
					=============================================*/
					if (respuesta["keywords"] != null) {

						$(".editarPalabrasClaves").html(

							'<div class="input-group">' +

							'<span class="input-group-addon"><i class="fa fa-key"></i></span>' +

							'<input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves, seperadas por coma" name="pClavesCategoria" value="' + respuesta["keywords"] + '" required>' +

							'</div>');

						$("#modalEditarCategoria .pClavesCategoria").tagsinput('items');




					} else {

						$(".editarPalabrasClaves").html(

							'<div class="input-group">' +

							'<span class="input-group-addon"><i class="fa fa-key"></i></span>' +

							'<input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves, seperadas por coma" name="pClavesCategoria" value="" required>' +

							'</div>');

						$("#modalEditarCategoria .pClavesCategoria").tagsinput('items');


					}
					/*=============================================
					CARGAMOS LA IMAGEN DE LA PORTADA
					=============================================*/
					$("#modalEditarCategoria .previsualizarPortada").attr("src", respuesta["image"]);

					$("#modalEditarCategoria .antiguaFotoPortada").val(respuesta["image"]);

				})
				.fail(function () {
					console.log("error");
				});


			/*=============================================
				PREGUNTAMOS POR LAS OFERTAS
			=============================================*/

			if (respuesta["offer"] != 0) {

				$("#modalEditarCategoria .selActivarOferta").val("oferta");

				$("#modalEditarCategoria .datosOferta").show();

				$("#modalEditarCategoria .valorOferta").prop("required", true);

				$("#modalEditarCategoria #precioOferta").val(respuesta["offerPrice"]);

				$("#modalEditarCategoria #descuentoOferta").val(respuesta["discountOffer"]);

				if (respuesta["offerPrice"] != 0) {

					$("#modalEditarCategoria #precioOferta").prop("readonly", true);

					$("#modalEditarCategoria #descuentoOferta").prop("readonly", false);
				}

				if (respuesta["discountOffer"] != 0) {

					$("#modalEditarCategoria #precioOferta").prop("readonly", false);

					$("#modalEditarCategoria #descuentoOferta").prop("readonly", true);
				}

				/*=============================================
				CARGAMOS LA IMAGEN DE LA OFERTA
				=============================================*/
				$("#modalEditarCategoria .previsualizarOferta").attr("src", respuesta["offerImagen"]);

				$("#modalEditarCategoria .antiguaFotoOferta").val(respuesta["offerImagen"]);

				$("#modalEditarCategoria .finOferta").val(respuesta["endOffer"]);


			} else {

				$("#modalEditarCategoria .selActivarOferta").val("");

				$("#modalEditarCategoria .datosOferta").hide();

				$("#modalEditarCategoria .valorOferta").prop("required", false);

				$("#modalEditarCategoria .previsualizarOferta").attr("src", "views/img/ofertas/default/default.jpg");

				$("#modalEditarCategoria .antiguaFotoOferta").val(respuesta["offerImagen"]);

			}

			/*=============================================
				AL EDITAR UNA OFERTA
			=============================================*/

			$("#modalEditarCategoria .selActivarOferta").change(function (event) {
				/* Act on the event */

				activarOferta($(this).val());


			});

			/*=============================================
			VALOR OFERTA
			=============================================*/
			$("#modalEditarCategoria .valorOferta").change(function () {

				if ($(this).attr("id") == "precioOferta") {

					$("#modalEditarCategoria #precioOferta").prop("readonly", true);
					$("#modalEditarCategoria #descuentoOferta").prop("readonly", false);
					$("#modalEditarCategoria #descuentoOferta").val(0);

				}

				if ($(this).attr("id") == "descuentoOferta") {

					$("#modalEditarCategoria #descuentoOferta").prop("readonly", true);
					$("#modalEditarCategoria #precioOferta").prop("readonly", false);
					$("#modalEditarCategoria #precioOferta").val(0);

				}


			});




		})
		.fail(function () {
			console.log("error");
		});






});

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablaCategorias tbody").on("click", ".btnEliminarCategoria", function () {

	var idCategoria = $(this).attr("idCategoria");
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
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=categories&idCategoria=" + idCategoria + "&imgOferta=" + imgOferta + "&rutaCabecera=" + rutaCabecera + "&imgPortada=" + imgPortada;

		}

	})

})
