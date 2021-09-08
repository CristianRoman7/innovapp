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
      
      Administrar Clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Clientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar nuevo Cliente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Razón Social</th>
           <th>Rut</th>
           <th>Giro</th>
           <th>Dirección</th>
           <th>Ciudad</th>
           <th>Nombre Contacto</th>
           <th>Telefono</th>
           <th>E-mail</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

       foreach ($clientes as $key => $value){
         
        echo '  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["razonSocial"].'</td>
                    <td>'.$value["rutCliente"].'</td>
                    <td>'.$value["giro"].'</td>                
                    <td>'.$value["direccion"].'</td>
                    <td>'.$value["ciudad"].'</td>
                    <td>'.$value["nombreContacto"].'</td>
                    <td>'.$value["telefono"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>
                        <div class="btn-group">                     
                            <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'" razonSocial="'.$value["razonSocial"].'"><i class="fa fa-times"></i></button>
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
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA RAZON SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaRazonSocial" placeholder="Ingresar Razón Social" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL RUT -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoRut" placeholder="Ingresar Rut" id="nuevoRut" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL GIRO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoGiro" placeholder="Ingresar Giro" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección" required>

              </div>

            </div>

            
            <!-- ENTRADA PARA SELECCIONAR SU CIUDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevaCiudad">
                  
                  <option value="">Selecionar Ciudad</option>

                  <option value="Arica">Arica</option>
                  <option value="Iquique">Iquique</option>
                  <option value="Calama">Calama</option>
                  <option value="Antofagasta">Antofagasta</option>
                  <option value="Copiapo">Copiapo</option>
                  <option value="La Serena">La Serena</option>
                  <option value="Coquimbo">Coquimbo</option>
                  <option value="Vallenar">Vallenar</option>
                  <option value="Valparaiso">Valparaiso</option>
                  <option value="Santiago">Santiago</option>
                  <option value="Concepción">Concepción</option>
                  <option value="Temuco">Temuco</option>
                  <option value="Puerto Montt">Puerto Montt</option>
                  <option value="Punta Arenas">Punta Arenas</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE CONTACTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombreContacto" placeholder="Ingresar Nombre del Contacto" required>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Teléfono" required>

              </div>

            </div>

            <!-- ENTRADA PARA EMAIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar E-mail" required>

              </div>

            </div>

           </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

        <?php

          $crearCliente = new ControladorClientes();
          $crearCliente -> ctrCrearCliente(); 

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA RAZON SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarRazonSocial" name="editarRazonSocial" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL RUT CLIENTE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarRutCliente" name="editarRutCliente" value="">

              </div>

            </div>

            <!-- ENTRADA PARA EL GIRO CLIENTE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarGiro" name="editarGiro" value="">

              </div>

            </div>

            <!-- ENTRADA PARA DIRECCION CLIENTE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" value="">

              </div>

            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Cliente</button>

        </div>

     <?php

          $editarCliente = new ControladorClientes();
          $editarCliente -> ctrEditarCliente();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCliente = new ControladorClientes();
  $borrarCliente -> ctrBorrarCliente();

?> 