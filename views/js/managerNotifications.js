

$(".actualizarNotificaciones").click(function(event) {
	/* Act on the event */

	event.preventDefault();

	var item = $(this).attr("item");

	var datos = new FormData();
 	datos.append("item", item );

 	$.ajax({
 		url: 'ajax/notifications.ajax.php',
 		method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
 	})
 	.done(function(respuesta) {
 		console.log('Línea 22. respuesta => ', respuesta);
 		console.log("success");

 		if(respuesta == "ok"){

      	    	if(item == "nuevosUsuarios"){

      	    		window.location = "users";
      	    	}

      	    	if(item == "nuevasVentas"){

      	    		window.location = "sales";
      	    	}

      	    	if(item == "nuevasVisitas"){

      	    		window.location = "visits";
      	    	}

      	 }
 	})
 	.fail(function() {
 		console.log("error");
 	});
 	

















});