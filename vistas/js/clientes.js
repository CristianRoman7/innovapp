
/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	var datos = new FormData();
	datos.append("idCliente", idCliente);

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarRazonSocial").val(respuesta["razonSocial"]);
			$("#editarRutCliente").val(respuesta["rutCliente"]);
			$("#editarGiro").val(respuesta["giro"]);
			$("#editarDireccion").val(respuesta["direccion"]);
			$("#editarCiudad").val(respuesta["ciudad"]);
			$("#editarNombreContacto").val(respuesta["nombreContacto"]);
			$("#editarTelefono").val(respuesta["telefono"]);
			$("#editarEmail").val(respuesta["email"]);			

		}

	});

})

/*=============================================
REVISAR SI EL CLIENTE YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCliente").change(function(){

	$(".alert").remove();

	var clientes = $(this).val();

	var datos = new FormData();
	datos.append("validarCliente", clientes);

	 $.ajax({
	    url:"ajax/clientes.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoCliente").parent().after('<div class="alert alert-warning">Este cliente ya existe./div>');

	    		$("#nuevoCliente").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

  var idCliente = $(this).attr("idCliente");
  var razonSocial = $(this).attr("razonSocial");
  var rutCliente = $(this).attr("rutCliente");
  var giro = $(this).attr("giro");
  var direccion = $(this).attr("direccion");
  var ciudad = $(this).attr("ciudad");
  var nombreContacto = $(this).attr("nombreContacto");
  var telefono = $(this).attr("telefono");
  var email = $(this).attr("email");
  

  swal({
    title: '¿Está seguro de borrar el Cliente?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Cliente!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=clientes&idCliente="+idCliente+"&cliente="+clientes;

    }

  })

})




