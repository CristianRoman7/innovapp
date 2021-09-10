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
    <h1>Administrar Equipos</h1>
    <ol class="breadcrumb">  
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>  
      <li class="active">Administrar Equipos</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEquipo">
         Agregar Equipo
        </button>
      </div>

      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Código</th>
           <th>Descripción</th>
           <th>Modelo</th>
           <th>Categoría</th>
           <th>Clasificación</th>
           <th>Tipo</th>
           <th>Ubicación</th>
           <th>Acciones</th>
         </tr>
        </thead>
        <tbody>

        <?php
        $item = null;
        $valor = null;
        $equipos = ControladorEquipos::ctrMostrarEquipo($item, $valor);

       foreach ($equipos as $key => $value){
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["codigoEquipo"].'</td>
                  <td>'.$value["descripcionEquipo"].'</td>
                  <td>'.$value["modeloEquipo"].'</td>
                  <td>'.$value["categoria"].'</td>
                  <td>'.$value["clasificacion"].'</td>
                  <td>'.$value["tipo"].'</td>
                  <td>'.$value["idUbicacion"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarEquipo" idEquipo="'.$value["idEquipo"].'" data-toggle="modal" data-target="#modalEditarEquipo"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarEquipo" idEquipo="'.$value["idEquipo"].'" codigoEquipo="'.$value["codigoEquipo"].'" descripcionEquipo="'.$value["descripcionEquipo"].'"><i class="fa fa-times"></i></button>

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
        MODAL AGREGAR EQUIPO
        ======================================-->

        <div id="modalAgregarEquipo" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Equipo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigoEquipo" placeholder="Ingresar Código del Equipo" required>

              </div>

            </div>

            <!-- ENTRADA PARA DESCRIPCION DEL EQUIPO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDescripcionEquipo" placeholder="Ingresar Descripción" id="nuevaDescripcionEquipo" required>

              </div>

            </div>

            <!-- ENTRADA PARA MODELO DEL EQUIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoModeloEquipo" placeholder="Ingresar Modelo" id="nuevoModeloEquipo" required>

              </div>

            </div>

            <!-- ENTRADA PARA CATEGORIA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria" id="nuevaCategoria" required>

              </div>

            </div>

            <!-- ENTRADA PARA CLASIFICACION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaClasificacion" placeholder="Ingresar Clasificación" id="nuevaClasificacion" required>

              </div>

            </div>
            <!-- ENTRADA PARA TIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTipo" placeholder="Ingresar Tipo" id="nuevoTipo" required>

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

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Registro</button>

        </div>

        <?php

          $crearEquipo = new ControladorEquipos();
          $crearEquipo -> ctrCrearEquipo();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR EQUIPO
======================================-->

<div id="modalEditarEquipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Equipo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigoEquipo" name="editarCodigoEquipo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA DESCRIPCION -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombreUbicacion" name="editarNombreUbicacion" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA MODELO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarModeloEquipo" name="editarModeloEquipo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA CATEGORIA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA CLASIFICACION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarClasificacion" name="editarClasificacion" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA TIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarTipo" name="editarTipo" value="" required>

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

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Equipo</button>

        </div>

     <?php

          $editarEquipo = new controladorEquipos();
          $editarEquipo -> ctrEditarEquipo();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarEquipo = new controladorEquipos();
  $borrarEquipo -> ctrBorrarEquipo();

?> 