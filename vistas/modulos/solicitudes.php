<?php

if($_SESSION["perfil"] == "Operativo"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Solicitudes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Solicitudes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
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
           <th>Referencia</th>
           <th>Prioridad</th>
           <th>Estado</th>
           <th>Creación</th>
           <th>Incidente</th>
           <th>Programada</th>
           <th>Cierre</th>
           <th>Cliente</th>
           <th>Equipo</th>
           <th>Ubicación</th>
           <th>Creado por</th>
           <th>Asignado a</th>

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
                  <td>'.$value["referencia"].'</td>
                  <td>'.$value["prioridad"].'</td>
                  <td>'.$value["estado"].'</td>
                  <td>'.$value["fechaCreacion"].'</td>
                  <td>'.$value["fechaIncidente"].'</td>
                  <td>'.$value["fechaProgramada"].'</td>
                  <td>'.$value["fechaCierre"].'</td>
                  <td>'.$value["idCliente"].'</td>
                  <td>'.$value["idEquipo"].'</td>
                  <td>'.$value["idUbicacion"].'</td>
                  <td>'.$value["idUsuarioCreador"].'</td>
                  <td>'.$value["idUsuarioAsignado"].'</td>

                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarSolicitud" idSolicitud="'.$value["idSolicitud"].'" data-toggle="modal" data-target="#modalEditarSolicitud"><i class="fa fa-pencil"></i></button>

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

        <!-- select para tablas de lista desplegable CLIENTE-->
        <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'pos');
        $query_cliente = $mysqli -> query ("SELECT * FROM clientes");  
        while ($valores = mysqli_fetch_array($query_cliente)) {        
        }
        ?>

        <!-- select para tablas de lista desplegable EQUIPO-->
        <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'pos');
        $query_equipo = $mysqli -> query ("SELECT * FROM equipos");  
        while ($valores = mysqli_fetch_array($query_equipo)) {        
        }
        ?>

        <!-- select para tablas de lista desplegable UBICACIONES-->
        <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'pos');
        $query_ubicacion = $mysqli -> query ("SELECT * FROM ubicaciones");  
        while ($valores = mysqli_fetch_array($query_ubicacion)) {        
        }
        ?>

        <!-- select para tablas de lista desplegable USUARIO CREADOR-->
        <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'pos');
        $query_usuarioCreador = $mysqli -> query ("SELECT * FROM usuarios");  
        while ($valores = mysqli_fetch_array($query_usuarioCreador)) {        
        }
        ?>

        <!-- select para tablas de lista desplegable USUARIO ASIGNADO-->
        <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'pos');
        $query_usuarioAsignado = $mysqli -> query ("SELECT * FROM usuarios");  
        while ($valores = mysqli_fetch_array($query_usuarioAsignado)) {        
        }
        ?>



      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL N° SOLICITUD -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNumeroSolicitud" placeholder="Ingresar el número de solicitud" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <textarea class="form-control" name="nuevaDescripcionSolicitud" placeholder="Descripción de la Solicitud" rows="3" required></textarea>
              </div>

            </div>

            <!-- ENTRADA PARA LA REFERENCIA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaReferencia" placeholder="Ingresar Referencia" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PRIORIDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevaPrioridad">
                  
                  <option value="">Selecionar prioridad</option>

                  <option value="Alta">Alta</option>

                  <option value="Media">Media</option>

                  <option value="Baja">Baja</option>

                </select>

              </div>

            </div>

             <!-- ENTRADA PARA SELECCIONAR ESTADO DE LA SOLICITUD -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoEstado">
                  
                  <option value="">Selecionar Estado</option>

                  <option value="Abierto">Abierto</option>

                  <option value="Cerrado">Cerrado</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA CREACION (OCULTO) -->
            <input type="hidden" class="form-control input-lg" name="nuevaFechaCreacion" value=<?php getdate() ?>>

            <!-- ENTRADA PARA FECHA INCIDENTE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaFechaIncidente" step="1" min="2021-01-01" max="2121-12-31" value="<?php echo date("Y-m-d");?>">

              </div>

            </div>

            <!-- ENTRADA PARA FECHA PROGRAMADA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaFechaProgramada" step="1" min="2021-01-01" max="2121-12-31" value="<?php echo date("Y-m-d");?>">

              </div>

            </div>
            
            <!-- ENTRADA PARA FECHA CIERRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaFechaCierre" step="1" min="2021-01-01" max="2121-12-31" value="<?php echo date("Y-m-d");?>">

              </div>

            </div>


            <!-- ENTRADA LISTA DESPLEGABLE TABLA CLIENTE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="0" required>Seleccione el Cliente:</option>
                    <?php
                    $query_cliente = $mysqli -> query ("SELECT * FROM clientes");
                    while ($valores = mysqli_fetch_array($query_cliente)) {
                        echo '<option value="'.$valores[id].'">'.$valores[razonSocial].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>
            
            <!-- ENTRADA LISTA DESPLEGABLE TABLA EQUIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="0" required>Seleccione el Equipo:</option>
                    <?php
                    $query_equipo = $mysqli -> query ("SELECT * FROM equipos");
                    while ($valores = mysqli_fetch_array($query_equipo)) {
                        echo '<option value="'.$valores[idEquipo].'">'.$valores[codigoEquipo].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>

            <!-- ENTRADA LISTA DESPLEGABLE TABLA UBICACION -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="0" required>Seleccione la Ubicación:</option>
                    <?php
                    $query_ubicacion = $mysqli -> query ("SELECT * FROM ubicaciones");
                    while ($valores = mysqli_fetch_array($query_ubicacion)) {
                        echo '<option value="'.$valores[idUbicacion].'">'.$valores[nombreUbicacion].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>

            <!-- ENTRADA LISTA DESPLEGABLE TABLA usuario creador -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="0" required>Seleccione el usuario creador:</option>
                    <?php
                    $query_usuarioCreador = $mysqli -> query ("SELECT * FROM usuarios");
                    while ($valores = mysqli_fetch_array($query_usuarioCreador) {
                        echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>

            <!-- ENTRADA LISTA DESPLEGABLE TABLA usuario asignado -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="0" required>Seleccione el usuario asignado:</option>
                    <?php
                    $query_usuarioAsignado = $mysqli -> query ("SELECT * FROM usuarios");
                    while ($valores = mysqli_fetch_array($query_usuarioAsignado) {
                        echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                    ?>
                </select>

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

          <h4 class="modal-title">Editar Solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

                <!-- ENTRADA PARA EL N° SOLICITUD -->
            
                <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-ticket"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNumerosolicitud" name="editarNumeroSolicitud" value="" disabled>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>

                <textarea class="form-control" id="editarDescripcionSolicitud" name="editarDescripcionSolicitud" value="" rows="3" disabled></textarea>
              
              </div>

            </div>

            <!-- ENTRADA PARA LA REFERENCIA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" id="editarReferencia" name="editarReferencia" value="" disabled>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PRIORIDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-bullhorn"></i></span> 

                <select class="form-control input-lg" id="editarPrioridad" name="editarPrioridad">
                  
                  <option value=""></option>

                  <option value="Alta">Alta</option>

                  <option value="Media">Media</option>

                  <option value="Baja">Baja</option>

                </select>

              </div>

            </div>

             <!-- ENTRADA PARA SELECCIONAR ESTADO DE LA SOLICITUD -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-retweet"></i></span> 

                <select class="form-control input-lg" id="editarEstado" name="editarEstado">
                  
                  <option value=""></option>

                  <option value="Abierto">Abierto</option>

                  <option value="Cerrado">Cerrado</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA CREACION (OCULTO) -->
            <input type="hidden" class="form-control input-lg" id="editarFechaCreacion" name="editarFechaCreacion" value="" disabled>

            <!-- ENTRADA PARA FECHA INCIDENTE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" id="editarFechaIncidente"  name="editarFechaIncidente" step="1" min="2021-01-01" max="2121-12-31" value="" disabled>

              </div>

            </div>

            <!-- ENTRADA PARA FECHA PROGRAMADA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" id="editarFechaProgramada" name="editarFechaProgramada" step="1" min="2021-01-01" max="2121-12-31" value="">

              </div>

            </div>
            
            <!-- ENTRADA PARA FECHA CIERRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" id="editarFechaCierre" name="editarFechaCierre" step="1" min="2021-01-01" max="2121-12-31" value="">

              </div>

            </div>


            <!-- ENTRADA LISTA DESPLEGABLE TABLA CLIENTE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="" required></option>
                    <?php
                    $query_cliente = $mysqli -> query ("SELECT * FROM clientes");
                    while ($valores = mysqli_fetch_array($query_cliente)) {
                        echo '<option value="'.$valores[id].'">'.$valores[razonSocial].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>
            
            <!-- ENTRADA LISTA DESPLEGABLE TABLA EQUIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="" required></option>
                    <?php
                    $query_equipo = $mysqli -> query ("SELECT * FROM equipos");
                    while ($valores = mysqli_fetch_array($query_equipo)) {
                        echo '<option value="'.$valores[idEquipo].'">'.$valores[codigoEquipo].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>

            <!-- ENTRADA LISTA DESPLEGABLE TABLA UBICACION -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="" required></option>
                    <?php
                    $query_ubicacion = $mysqli -> query ("SELECT * FROM ubicaciones");
                    while ($valores = mysqli_fetch_array($query_ubicacion)) {
                        echo '<option value="'.$valores[idUbicacion].'">'.$valores[nombreUbicacion].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>

            <!-- ENTRADA LISTA DESPLEGABLE TABLA usuario creador -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="" disabled></option>
                    <?php
                    $query_usuarioCreador = $mysqli -> query ("SELECT * FROM usuarios");
                    while ($valores = mysqli_fetch_array($query_usuarioCreador) {
                        echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>

            <!-- ENTRADA LISTA DESPLEGABLE TABLA usuario asignado -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <select>
                    <option value="" required></option>
                    <?php
                    $query_usuarioAsignado = $mysqli -> query ("SELECT * FROM usuarios");
                    while ($valores = mysqli_fetch_array($query_usuarioAsignado) {
                        echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                    ?>
                </select>

              </div>

            </div>
            

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar</button>

        </div>

     <?php

          $editarSolicitud = new ControladorSolicitudes();
          $editarSolicitud -> ctrEditarSolicitud);

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarSolicitud = new ControladorSolicitudes();
  $borrarSolicitud -> ctrBorrarSolicitud();

?> 


