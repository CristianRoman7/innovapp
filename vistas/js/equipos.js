
/*=============================================
EDITAR EQUIPO
=============================================*/
$(".tablas").on("click", ".btnEditarEquipo", function(){

	var idEquipo = $(this).attr("idEquipo");
	
	var datos = new FormData();
	datos.append("idEquipo", idEquipo);

	$.ajax({

		url:"ajax/equipos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarCodigoEquipo").val(respuesta["codigoEquipo"]);
			$("#editarDescripcionEquipo").val(respuesta["descripcionEquipo"]);
			$("#editarModeloEquipo").val(respuesta["modeloEquipo"]);
			$("#editarCategoria").val(respuesta["categoria"]);
			$("#editarClasificacion").val(respuesta["clasificacion"]);
			$("#editarTipo").val(respuesta["tipo"]);		

		}

	});

})

/*=============================================
REVISAR SI EL CODIGO DE EQUIPO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoEquipo").change(function(){

	$(".alert").remove();

	var equipos = $(this).val();

	var datos = new FormData();
	datos.append("validarEquipo", equipos);

	 $.ajax({
	    url:"ajax/equipos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoEquipo").parent().after('<div class="alert alert-warning">Este código de equipo ya existe./div>');

	    		$("#nuevoEquipo").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR EQUIPO
=============================================*/
$(".tablas").on("click", ".btnEliminarEquipo", function(){

  var idEquipo = $(this).attr("idEquipo");
  var codigoEquipo = $(this).attr("codigoEquipo");
  var descripcionEquipo = $(this).attr("descripcionEquipo");
  var modeloEquipo = $(this).attr("modeloEquipo");
  var categoria = $(this).attr("categoria");
  var clasificacion = $(this).attr("clasificacion");
  var tipo = $(this).attr("tipo");
  
  swal({
    title: '¿Está seguro de borrar el Registro?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Registro!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=equipos&idEquipo="+idEquipo+"&equipos="+equipos;

    }

  })

})




