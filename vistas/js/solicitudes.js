/*=============================================
EDITAR SOLICITUD
=============================================*/
$(".tablas").on("click", ".btnEditarSolicitud", function(){

	var idSolicitud = $(this).attr("idSolicitud");
	
	var datos = new FormData();
	datos.append("idSolicitud", idSolicitud);

	$.ajax({

		url:"ajax/solicitudes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNumeroSolicitud").val(respuesta["numeroSolicitud"]);
			$("#editarDescripcionSolicitud").val(respuesta["descripcionSolicitud"]);
			$("#editarReferencia").val(respuesta["referencia"]);
			$("#editarPrioridad").html(respuesta["prioridad"]);
			$("#editarPrioridad").val(respuesta["prioridad"]);
			$("#editarFechaCreacion").val(respuesta["fechaCreacion"]);
			$("#editarFechaIncidente").val(respuesta["fechaIncidente"]);
			$("#editarFechaProgramada").val(respuesta["fechaProgramada"]);
			$("#editarFechaCierre").val(respuesta["fechaCierre"]);
			$("#editarCliente").html(respuesta["idCliente"]);
			$("#editarCliente").val(respuesta["idCliente"]);
			$("#editarEquipo").html(respuesta["idEquipo"]);
			$("#editarEquipo").val(respuesta["idEquipo"]);
			$("#editarUbicacion").html(respuesta["idUbicacion"]);
			$("#editarUbicacion").val(respuesta["idUbicacion"]);
			$("#editarUsuarioCreador").html(respuesta["idUsuarioCreador"]);
			$("#editarUsuarioAsignado").val(respuesta["idUsuarioAsignado"]);

		}

	});

})


/*=============================================
ELIMINAR SOLICITUD
=============================================*/
$(".tablas").on("click", ".btnEliminarSolicitud", function(){

  var idSolicitud = $(this).attr("idSolicitud");
   var numeroSolicitud = $(this).attr("numeroSolicitud");

  swal({
    title: '¿Está seguro de borrar el registro?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar registro!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=solicitudes&idSolicitud="+idSolicitud+"&numeroSolicitud="+numeroSolicitud;

    }

  })

})




