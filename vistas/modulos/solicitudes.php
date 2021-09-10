<?php
if ($_SESSION["perfil"] == "Operativo") {
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>Administrar Solicitudes</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Solicitudes</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSolicitud">
          Agregar Solicitudes
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>N°Solicitud</th>
              <th>Descripción</th>
             
              <th>Prioridad</th>
              <th>Estado</th>
              
              <th>Incidente</th>
              <th>Programada</th>
              
              <th>Cliente</th>
              <th>Equipo</th>
              <th>Ubicación</th>
              
              <th>Asignado a</th>
              <th></th>
            </tr>
          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $solicitudes = ControladorSolicitudes::ctrMostrarSolicitudes($item, $valor);
           
            
                        
            foreach ($solicitudes as $key => $value){
         
              echo ' <tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["numeroSolicitud"].'</td>
                      <td>'.$value["descripcionSolicitud"].'</td>
                      
                      <td>'.$value["prioridad"].'</td>
                      <td>'.$value["estado"].'</td>
                      
                      <td>'.$value["fechaIncidente"].'</td>
                      <td>'.$value["fechaProgramada"].'</td>
                     
                      <td>'.$value["idCliente"].'</td>

                      <td>'.$value["idEquipo"].'</td>
                      <td>'.$value["idUbicacion"].'</td>
                      
                      <td>'.$value["idUsuarioAsignado"].'</td>
    
                      <td>    
                        <div class="btn-group">                            
                          <button class="btn btn-success btnEditarSolicitud" idSolicitud="'.$value["idSolicitud"].'" data-toggle="modal" data-target="#modalEditarSolicitud"><i class="fa fa-eye"></i></button>    
                          <button class="btn btn-danger btnEliminarSolicitud" idSolicitud="'.$value["idSolicitud"].'"><i class="fa fa-times"></i></button>    
                        </div>      
                      </td>  
                    </tr>';
            }
            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR SOLICITUD
======================================-->

<div id="modalAgregarSolicitud" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar nueva Solicitud</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL Nro SOLICITUD -->            
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-bars"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoNumeroSolicitud" placeholder="Ingrese N° Solicitud" required>
              </div>
            </div>

            <!-- ENTRADA PARA DESCRIPCION -->

             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-comment"></i></span> 
                <textarea name='nuevaDescripcionSolicitud' class='form-control input-lg' onClick='this.value=""'>Escriba la descripción aquí... </textarea>
              </div>
            </div>

            <!-- ENTRADA PARA LA REFERENCIA -->

             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaReferencia" placeholder="Ingrese Referencia" required>
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

            <div class="form-group">
              <div class="input-group">           
                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span> 
                <select class="form-control input-lg" name="nuevoEstado">                
                  <option value="">Seleccione Estado</option>
                  <option value="abierto">Abierto</option>
                  <option value="pendiente">Pendiente</option>
                  <option value="cerrado">Cerrado</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA CREACIÓN -->

            <div class="form-group">    
            <label>Fecha Creación</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" name="nuevaFechaCreacion" value="<?php echo date("Y-m-d");?>" readonly>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA INCIDENTE -->

            <div class="form-group">    
            <label>Fecha del Incidente</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" name="nuevaFechaIncidente" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA PROGRAMADA -->

            <div class="form-group">    
            <label>Fecha Programada de Atención</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" name="nuevaFechaProgramada">
              </div>
            </div>

             <!-- ENTRADA PARA LA FECHA CIERRE -->

             <div class="form-group">    
            <label>Fecha de Cierre</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" name="NuevaFechaCierre">
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR SU CLIENTE -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control input-lg" name="nuevoPerfil">                  
                  <option value="">Seleccione el Cliente</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["razonSocial"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR SU EQUIPO -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-wrench"></i></span> 
                <select class="form-control input-lg" name="nuevoEquipo">                  
                  <option value="">Seleccione el Equipo a Intervenir</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorEquipos::ctrMostrarEquipo($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["codigoEquipo"].$value["descripcionEquipo"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

             <!-- ENTRADA PARA SELECCIONAR SU UBICACION -->

             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <select class="form-control input-lg" name="nuevaUbicacion">                  
                  <option value="">Seleccione la Ubicación</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorUbicaciones::ctrMostrarUbicaciones($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["nombreUbicacion"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR USUARIO CREADOR -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 
                <select class="form-control input-lg" name="nuevoUsuarioCreador">                  
                  <option value="">Solicitud realizada por:</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["nombre"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR USUARIO ASIGNADO -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 
                <select class="form-control input-lg" name="nuevoUsuarioAsignado">                  
                  <option value="">Solicitud asignada a:</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["nombre"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <?php
          $crearSolicitud = new ControladorSolicitudes();
          $crearSolicitud -> ctrCrearSolicitud();
        ?>

      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR SOLICITUD
======================================-->

<div id="modalEditarSolicitud" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Detalles de la Solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL Nro SOLICITUD -->            
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-bars"></i></span> 
                <input type="text" class="form-control input-lg" id="editarNumeroSolicitud" name="editarNumeroSolicitud" value="">
              </div>
            </div>

            <!-- ENTRADA PARA DESCRIPCION -->

             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-comment"></i></span> 
                <textarea class='form-control input-lg' id='editarDescripcionSolicitud' name='editarDescripcionSolicitud' value=""></textarea>
              </div>
            </div>

            <!-- ENTRADA PARA LA REFERENCIA -->

             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span> 
                <input type="text" class="form-control input-lg" id="editarReferencia" name="editarReferencia" value="">
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

            <div class="form-group">
              <div class="input-group">           
                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span> 
                <select class="form-control input-lg" name="editarEstado">                
                  <option value="" id="editarEstado"></option>
                  <option value="abierto">Abierto</option>
                  <option value="pendiente">Pendiente</option>
                  <option value="cerrado">Cerrado</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA CREACIÓN -->

            <div class="form-group">    
            <label>Fecha Creación</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" id="EditarFechaCreacion" name="EditarFechaCreacion" value="" readonly>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA INCIDENTE -->

            <div class="form-group">    
            <label>Fecha del Incidente</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" id="editarFechaIncidente" name="editarFechaIncidente">
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA PROGRAMADA -->

            <div class="form-group">    
            <label>Fecha Programada de Atención</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" id="editarFechaProgramada" name="editarFechaProgramada">
              </div>
            </div>

             <!-- ENTRADA PARA LA FECHA CIERRE -->

             <div class="form-group">    
            <label>Fecha de Cierre</label>          
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                <input type="date" class="form-control input-lg" id="editarFechaCierre" name="editarFechaCierre">
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR SU CLIENTE -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control input-lg" id="editarPerfil" name="editarPerfil">                  
                  <option value=""></option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["razonSocial"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR SU EQUIPO -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-wrench"></i></span> 
                <select class="form-control input-lg" id="editarEquipo" name="editarEquipo">                  
                  <option value=""></option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorEquipos::ctrMostrarEquipo($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["codigoEquipo"].$value["descripcionEquipo"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

             <!-- ENTRADA PARA SELECCIONAR SU UBICACION -->

             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <select class="form-control input-lg" id="editarUbicacion" name="editarUbicacion">                  
                  <option value=""></option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorUbicaciones::ctrMostrarUbicaciones($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["nombreUbicacion"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR USUARIO CREADOR -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 
                <select class="form-control input-lg" id="editarUsuarioCreador" name="editarUsuarioCreador">                  
                  <option value=""></option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["nombre"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR USUARIO ASIGNADO -->

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 
                <select class="form-control input-lg" id="editarUsuarioAsignado" name="editarUsuarioAsignado">                  
                  <option value=""></option>
                  <?php
                    $item = null;
                    $valor = null;
                    $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                    foreach ($clientes as $key => $value){                      
                      echo '<option value="'.($key+1).'">'.$value["nombre"].'</option>';                      
                    }
                  ?> 
                </select>
              </div>
            </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

     <?php

          $editarSolicitud = new ControladorSolicitudes();
          $editarSolicitud -> ctrEditarSolicitud();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php
  $borrarSolicitud = new ControladorSolicitudes();
  $borrarSolicitud -> ctrBorrarSolicitud();
?> 