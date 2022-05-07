/*=====================================
=            SUBIR LOGOTIPO           =
======================================*/

$("#subirLogo").change(function() {
	/* Act on the event */

	var imagenLogo = this.files[0];

	/*==============================================================
	=    VALIDAMOS EL FORMATO  DE LA IMAGE SEA JPG O PNG	     =
	===============================================================*/

	if(imagenLogo["type"] !="image/jpeg" && imagenLogo["type"] !="image/png"){

		$("#subirLogo").val();

		swal({

			title: "Error al subir la imagen",
			text : "¡La imagen debe estar en formato JPG o PNG",
			type : "error",
			confirmButtonText: "¡Cerrar!"

		});

		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
		===============================================================*/

	}else if(imagenLogo["size"]> 2000000){

		$("#subirLogo").val();

		swal({

			title: "Error al subir la imagen",
			text : "¡La imagen no debe pesar más de 2MB!",
			type : "error",
			confirmButtonText: "¡Cerrar!"

		});



	}else{

		/*==============================================================
		=    PREVISUALIZAMOS LA IMAGE    =
		===============================================================*/

		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagenLogo);

		$(datosImagen).on('load', function(event) {
			var rutaImagen = event.target.result;

			$(".previsualizarLogo").attr('src', rutaImagen);
		});


	}

	/*==============================================================
				=   GUARDAR EL LOGO	     =
	===============================================================*/
	 $("#guardarLogo").click(function(){

  		var datos = new FormData();
  		datos.append("imagenLogo", imagenLogo);


  		$.ajax({
  			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
  		})
  		.done(function() {
  			console.log("success");
  			swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
  		})
  		.fail(function() {
  			console.log("error");
  		});
  		




  	})



});


/*=====================================
=            SUBIR ICONO          =
======================================*/

$("#subirIcono").change(function() {
	/* Act on the event */

	var imagenIcono = this.files[0];

	/*==============================================================
	=    VALIDAMOS EL FORMATO  DE LA IMAGE SEA JPG O PNG	     =
	===============================================================*/

	if(imagenIcono["type"] !="image/jpeg" && imagenIcono["type"] !="image/png"){

		$("#subirIcono").val();

		swal({

			title: "Error al subir la imagen",
			text : "¡La imagen debe estar en formato JPG o PNG",
			type : "error",
			confirmButtonText: "¡Cerrar!"

		});

		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
		===============================================================*/

	}else if(imagenIcono["size"]> 2000000){

		$("#subirIcono").val();

		swal({

			title: "Error al subir la imagen",
			text : "¡La imagen no debe pesar más de 2MB!",
			type : "error",
			confirmButtonText: "¡Cerrar!"

		});



	}else{

		/*==============================================================
		=    PREVISUALIZAMOS LA IMAGE    =
		===============================================================*/

		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagenIcono);

		$(datosImagen).on('load', function(event) {
			var rutaImagen = event.target.result;

			$(".previsualizarIcono").attr('src', rutaImagen);
		});


	}

	/*==============================================================
				=   GUARDAR EL ICONO	     =
	===============================================================*/
	 $("#guardarIcono").click(function(){

  		var datos = new FormData();
  		datos.append("imagenIcono", imagenIcono);


  		$.ajax({

  			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
  		})
  		.done(function() {
  			console.log("success");
  			swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
  		})
  		.fail(function() {
  			console.log("error");
  		});
  		

  		

  	})



});

/*=====================================
=        CAMBIAR COLOR       =
======================================*/

$(".cambioColor").change(function() {

	alert("cambioColor chage");
	/* Act on the event */
	var barraSuperior = $("#barraSuperior").val();

	var textoSuperior = $("#textoSuperior").val();

	var colorFondo = $("#colorFondo").val();

	var colorTexto = $("#colorTexto").val();

	$("#guardarColores").click(function() {
		
		/* Act on the event */
		var datos = new FormData();

		datos.append('barraSuperior', barraSuperior);
		datos.append('textoSuperior', textoSuperior);
		datos.append('colorFondo', colorFondo);
		datos.append('colorTexto', colorTexto);


		$.ajax({
			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
		})
		.done(function() {
			console.log("success");
			swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
		})
		.fail(function() {
			console.log("error");
		});
		




	});




});

/*================================================
=        CAMBIAR COLOR DE REDES SOCIALES     =
=================================================*/
var checkBox=  $(".seleccionarRed");

$("input[name='colorRedSocial']").on("ifChecked", function() {
		/* Act on the event */
	var color = $(this).val();
	var colorNet= null;

	var iconos = $(".redSocial");
	var network = ["facebook", "youtube", "twitter", "google-plus", "instagram"];


	if(color == "color"){

		colorNet= "Color";

	}else if (color=="blanco"){

		colorNet= "Blanco";

	}else{

		colorNet= "Negro";

	}

	for (var i = 0; i < iconos.length; i++) {
		$(iconos[i]).attr("class", "fa fa-"+network[i]+" "+network[i]+colorNet+" redSocial");
		$(checkBox[i]).attr('estilo', network[i]+colorNet);

	}

	crearDatosJsonRedes();



});

/*================================================
=        CAMBIAR URL DE REDES SOCIALES     =
=================================================*/

$(".cambiarUrlRed").change(function() {
	/* Act on the event */

	var cambiarUrlRed = $(".cambiarUrlRed");

	for (var i = 0; i < cambiarUrlRed.length; i++) {
		$(checkBox[i]).attr("ruta", $(cambiarUrlRed[i]).val());
	}

	crearDatosJsonRedes();



});

/*================================================
=        QUITAR RED SOCIAL     =
=================================================*/

$(".seleccionarRed").on('ifUnchecked',  function() {

	
	/* Act on the event */
	$(this).attr('validarRed', '');

	crearDatosJsonRedes();


});




/*================================================
=        AGREGAR RED SOCIAL     =
=================================================*/
$(".seleccionarRed").on('ifChecked',  function() {

	/* Act on the event */
	$(this).attr('validarRed', $(this).attr('red'));

	crearDatosJsonRedes();


});


/*================================================
=       CREAR DATOS JSON PARA ALMACENAR EN BD    =
=================================================*/

function crearDatosJsonRedes(){

	var redesSociales= [];

	for (var i = 0; i < checkBox.length; i++) {
		
		if($(checkBox[i]).attr('validarRed') !=""){


			redesSociales.push({"red": $(checkBox[i]).attr('red'),
								"estilo": $(checkBox[i]).attr('estilo'),
								"url": $(checkBox[i]).attr('ruta'),
								"activo": 1});


		}else{

			redesSociales.push({"red": $(checkBox[i]).attr('red'),
								"estilo": $(checkBox[i]).attr('estilo'),
								"url": $(checkBox[i]).attr('ruta'),
								"activo": 0});




		}


		$("#valorRedesSociales").val(JSON.stringify(redesSociales));



	}







}

/*================================================
=     GUARDAR REDES SOCIALES    =
=================================================*/

$("#guardarRedesSociales").click(function() {
	/* Act on the event */
	var valorRedesSociales = $("#valorRedesSociales").val();

	if(valorRedesSociales !=""){

		
			var datos = new FormData();

			datos.append('redesSociales', valorRedesSociales);


			$.ajax({

				url:"ajax/commerce.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
			})
			.done(function() {
				console.log("success");

				swal({
			      title: "Cambios guardados",
			      text: "¡La plantilla ha sido actualizada correctamente!",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });

			})
			.fail(function() {
				console.log("error");

				swal({
			      title: "¡Error!",
			      text: "¡La plantilla no ha sido actualizada!",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });

			});
		





		
	}



});
/*================================================
=     CAMBIAR CÓDIGOS    =
=================================================*/

$(".cambioScript").change(function() {
	/* Act on the event */
	var apiFacebook = $("#apiFacebook").val();

	var pixelFacebook = $("#pixelFacebook").val();

	var googleAnalytics = $("#googleAnalytics").val();	


	$("#guardarScript").click(function() {

		var datos = new FormData();

		datos.append('apiFacebook', apiFacebook);
		datos.append('pixelFacebook', pixelFacebook);
		datos.append('googleAnalytics', googleAnalytics);


		$.ajax({
			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
		})
		.done(function() {
			console.log("success");
			swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
		})
		.fail(function() {
			console.log("error");
		});
		


	
		
	});

	


});


/*=============================================
SELECCIONAR PAIS
=============================================*/

$.ajax({
	url:"views/js/countries.json",
	type: "GET",
	cache: false,
	contentType: false,
	processData:false,
	dataType:"json",
	success: function(respuesta){

		respuesta.forEach(seleccionarPais);

		function seleccionarPais(item, index){

			var pais = item.name;
			var codPais = item.code;

			if($("#codigoPais").val() == codPais){

				$("#paisSeleccionado").attr("value",codPais);
				$("#paisSeleccionado").html(pais);

			}

			$("#seleccionarPais").append('<option value="'+codPais+'">'+pais+'</option>');

		}

	}

})

/*=============================================
CAMBIAR INFORMACIÓN
=============================================*/

var impuesto = $("#impuesto").val();
var envioNacional = $("#envioNacional").val();
var envioInternacional = $("#envioInternacional").val();
var tasaMinimaNal = $("#tasaMinimaNal").val();
var tasaMinimaInt = $("#tasaMinimaInt").val();
var seleccionarPais = $("#codigoPais").val();
var clienteIdPaypal = $("#clienteIdPaypal").val();
var llaveSecretaPaypal = $("#llaveSecretaPaypal").val();
var merchantIdPayu = $("#merchantIdPayu").val();
var accountIdPayu = $("#accountIdPayu").val();
var apiKeyPayu = $("#apiKeyPayu").val();
var email = $("#email").val();
var name = $("#nombre").val();
var phone = $("#telefono").val();
var emailContact = $("#emailContacto").val();
var address = $("#direccion").val();



var validaEmail = validarEmail($("#emailContacto").val(), "emailContact");

/*=============================================
CAMBIAR MODO PAYPAL
=============================================*/
$("input[name='modoPaypal']").on("ifChecked",function(){

	var modoPaypal = $(this).val();
	var modoPayu = $("input[name='modoPayu']:checked").val();

	$("#guardarInformacion").click(function(){

		
		cambiarInformacion(modoPaypal, modoPayu);

	});

})
/*=============================================
CAMBIAR MODO PAYU
=============================================*/
$("input[name='modoPayu']").on("ifChecked",function(){

	var modoPayu = $(this).val();
	var modoPaypal = $("input[name='modoPaypal']:checked").val();

	$("#guardarInformacion").click(function(){

		
		cambiarInformacion(modoPaypal, modoPayu);

	});

})


/*=============================================
GUARDAR LA INFORMACION
=============================================*/
$(".cambioInformacion").change(function(event) {
	/* Act on the event */

	impuesto = $("#impuesto").val();

	envioNacional = $("#envioNacional").val();

	envioInternacional = $("#envioInternacional").val();

	tasaMinimaNal = $("#tasaMinimaNal").val();

	tasaMinimaInt = $("#tasaMinimaInt").val();

	seleccionarPais = $("#seleccionarPais").val();

	modoPaypal = $("input[name='modoPaypal']:checked").val();

	clienteIdPaypal = $("#clienteIdPaypal").val();

	llaveSecretaPaypal = $("#llaveSecretaPaypal").val();

	modoPayu = $("input[name='modoPayu']:checked").val();

	merchantIdPayu = $("#merchantIdPayu").val();

	accountIdPayu = $("#accountIdPayu").val();

	apiKeyPayu = $("#apiKeyPayu").val();
	
	email = $("#email").val();

	name = $("#nombre").val();

	phone = $("#telefono").val();

	emailContact = $("#emailContacto").val();
	
	address = $("#direccion").val();
	
	
	$("#guardarInformacion").click(function(){



		cambiarInformacion(modoPaypal, modoPayu);
	
	})	

});



/*=============================================
// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/

function cambiarInformacion(modoPaypal, modoPayu){

	


	var datos = new FormData();
	datos.append("impuesto", impuesto);
	datos.append("envioNacional", envioNacional);
	datos.append("envioInternacional", envioInternacional);
	datos.append("tasaMinimaNal", tasaMinimaNal);
	datos.append("tasaMinimaInt", tasaMinimaInt);
	datos.append("seleccionarPais", seleccionarPais);
	datos.append("modoPaypal", modoPaypal);	
	datos.append("clienteIdPaypal", clienteIdPaypal);
	datos.append("llaveSecretaPaypal", llaveSecretaPaypal);
	datos.append("modoPayu", modoPayu);	
	datos.append("merchantIdPayu", merchantIdPayu);
	datos.append("accountIdPayu", accountIdPayu);
	datos.append("apiKeyPayu", apiKeyPayu);
	datos.append('name', name);
	datos.append("phone", phone);
	datos.append("emailContact", emailContact);
	datos.append("address", address);




	if(email=="" || validaEmail==false ){
		email= " ";
	};

	datos.append("email", email);


	$.ajax({
		url:"ajax/commerce.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
	})
	.done(function() {
		console.log("success");
		swal({
			      title: "Cambios guardados",
			      text: "¡El comercio ha sido actualizado correctamente!",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });
	})
	.fail(function() {
		console.log("error");
	});
	
	




}

/*=============================================
FORMATEAR LOS INPUT
=============================================*/

$("#email").focus(function(){

	$(".alert").remove();
})

$("#emailContacto").focus(function(){

	$(".alert").remove();
})

/*=============================================
VALIDA EMAIL CUANDO PIERDE EL ENFOQUE
=============================================*/

$("#email").blur(function(){
    		
    validaEmail= validarEmail($("#email").val(), "email");
	console.log('Línea 622. validaEmail => ', validaEmail);		
});

$("#emailContacto").blur(function(){
    		
    validaEmail= validarEmail($("#emailContacto").val(), "emailContact");
	
});


/*===================================================
	=         Validar Email         =
===================================================*/


function validarEmail($mailval, $type) {

	/* Act on tevent */

	if($mailval != ""){

		var expresion= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(! expresion.test($mailval)){

			

			if($type == "email"){

				$("#email").parent().after('<div class="alert alert-warning"><strong>Error! </strong>No es un correo valido</div>');
		
			}

			if($type == "emailContact"){

				$("#emailContacto").parent().after('<div class="alert alert-warning"><strong>Error! </strong>No es un correo valido</div>');
		
			}

			
			return false;


		}else{

			return true;

		}

	
	}else{



		return true;

	}



};
