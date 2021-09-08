/*=============================================
EDITAR UBICACION
=============================================*/
$(".tablas").on("click", ".btnEditarUbicacion", function(){

	var idUbicacion = $(this).attr("idUbicacion");
	
	var datos = new FormData();
	datos.append("idUbicacion", idUbicacion);

	$.ajax({

		url:"ajax/ubicaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarCodigoUbicacion").val(respuesta["codigoUbicacion"]);
			$("#editarNombreUbicacion").val(respuesta["nombreUbicacion"]);

		}

	});

})

/*=============================================
REVISAR SI LA UBICACION YA ESTÁ REGISTRADA
=============================================*/

$("#nuevoCodigoUbicacion").change(function(){

	$(".alert").remove();

	var codigoUbicacion = $(this).val();

	var datos = new FormData();
	datos.append("validarCodigoUbicacion", codigoUbicacion);

	 $.ajax({
	    url:"ajax/ubicaciones.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevaUbicacion").parent().after('<div class="alert alert-warning">Este código de ubicación ya existe./div>');

	    		$("#nuevaUbicacion").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR UBICACION
=============================================*/
$(".tablas").on("click", ".btnEliminarUbicacion", function(){

  var idUbicacion = $(this).attr("idUbicacion");
  var codigoUbicacion = $(this).attr("codigoUbicacion");

  swal({
    title: '¿Está seguro de borrar el registro?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar registro!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=ubicaciones&idUbicacion="+idUbicacion+"&codigoUbicacion="+codigoUbicacion;

    }

  })

})




