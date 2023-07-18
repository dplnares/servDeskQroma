          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?php echo $_SESSION["nombreUsuario"] ?>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main class="bg">
        <div class="container-fluid px-4">
          <h1 class="mt-4">Todos los tickets</h1>
            <div class="d-flex m-2">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAddTicket">
                Nuevo Ticket
              </button>
            </div>

          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Todos los Tickets
            </div>
            <div class="card-body">
              <table id="datatablesSimple" class="data-table-Usuario table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Solicitante</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Fecha de Solicitud</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $listaTickets = ControllerTickets::ctrMostrarTickets($_SESSION["perfilUsuario"], $_SESSION["codUsuario"]);
                    foreach ($listaTickets as $key => $value)
                    {
                      echo
                        '<tr>
                          <td>'.($key + 1).'</td>
                          <td>'.$value["TituloTicket"].'</td>
                          <td>'.$value["NombreUsuario"].'</td>
                          <td>'.$value["NombreEstado"].'</td>
                          <td>'.$value["NombreCategoria"].'</td>
                          <td>'.$value["FechaCreacion"].'</td>
                          <td>';
                            if($value["CodEstado"]!=1)
                            {
                              echo '
                                <button class="btn btn-warning btnEditarTicket" codTicket="'.$value["CodTicket"].'" data-bs-toggle="modal" data-bs-target="#modalEditTicket" disabled>Editar <i class="fa-solid fa-pencil"></i></button>
                                
                                <button class="btn btn-danger btnEliminarTicket" codTicket="'.$value["CodTicket"].'" disabled>Eliminar <i class="fa-solid fa-trash" ></i></button>                                
                                </td>
                                </tr>
                              ';
                            }
                            else
                            {
                              echo '
                                <button class="btn btn-warning btnEditarTicket" codTicket="'.$value["CodTicket"].'" data-bs-toggle="modal" data-bs-target="#modalEditTicket" >Editar <i class="fa-solid fa-pencil"></i></button>
                                
                                <button class="btn btn-danger btnEliminarTicket" codTicket="'.$value["CodTicket"].'">Eliminar <i class="fa-solid fa-trash" ></i></button>
                                </td>
                                </tr>
                              ';
                            }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

<!--=====================================
Modal Crear un Ticket
======================================-->
<div class="modal fade" id="modalAddTicket" tabindex="-1" aria-labelledby="modalAddTicket" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Ingresar nuevo Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="box-body">

            <!-- Titulo -->
            <div class="form-group">
              <label for="tituloTicket" class="col-form-label">Titulo:</label>
              <input type="text" class="form-control" id="tituloTicket" name="tituloTicket">
            </div>

            <!-- Nombre Solicitante -->
            <div class="form-group">
              <label for="solicitanteTicket" class="col-form-label">Nombre Solicitante:</label>
              <?php
                $NombreUsuario = $_SESSION["nombreUsuario"];
                echo '<input type="text" class="form-control" id="solicitanteTicket" name="solicitanteTicket" value='.$NombreUsuario.' readonly>';
              ?>
            </div>

            <!-- Categoria -->
            <div class="form-group">
            <label for="categoriaTicket" class="col-form-label">Perfil:</label>
              <select class="form-control" name="categoriaTicket">
              <?php
                $categorias = ControllerCategorias::ctrMostrarCategorias();
                foreach ($categorias as $key => $value)
                {
                  echo '<option value="'.$value["CodCategoria"].'">'.$value["NombreCategoria"].'</option>';
                }
              ?>
              </select>
            </div>

            <!-- Descripción -->
            <div class="form-group">
              <label for="descripcionTicket" class="col-form-label">Descripción:</label>
              <input type="text" class="form-control" id="descripcionTicket" name="descripcionTicket">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Generar Ticket</button>
        </div>
        <?php
          $crearTicket = new ControllerTickets();
          $crearTicket -> ctrCrearNuevoTicket();
        ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
Modal Editar Ticket
======================================-->
<div class="modal fade" id="modalEditTicket" tabindex="-1" aria-labelledby="modalEditTicket" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="box-body">

            <!-- Titulo -->
            <div class="form-group">
              <label for="editarTitulo" class="col-form-label">Titulo:</label>
              <input type="text" class="form-control" id="editarTitulo" name="editarTitulo">
            </div>

            <!-- Nombre Solicitante -->
            <div class="form-group">
              <label for="editarSolicitante" class="col-form-label">Nombre Solicitante:</label>
              <?php
                $NombreUsuario = $_SESSION["nombreUsuario"];
                echo '<input type="text" class="form-control" id="editarSolicitante" name="editarSolicitante" value='.$NombreUsuario.' readonly>';
              ?>
            </div>

            <!-- Categoria -->
            <div class="form-group">
            <label for="editarCategoria" class="col-form-label">Perfil:</label>
              <select class="form-control" name="editarCategoria">
              <?php
                $categorias = ControllerCategorias::ctrMostrarCategorias();
                foreach ($categorias as $key => $value)
                {
                  echo '<option value="'.$value["CodCategoria"].'">'.$value["NombreCategoria"].'</option>';
                }
              ?>
              </select>
            </div>

            <!-- Descripción -->
            <div class="form-group">
              <label for="editarDescripcion" class="col-form-label">Descripción:</label>
              <input type="text" class="form-control" id="editarDescripcion" name="editarDescripcion">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="codTicket" name="codTicket" class="codTicket">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Editar Ticket</button>
        </div>
        <?php
          $editarTicket = new ControllerTickets();
          $editarTicket -> ctrEditarTicket();
        ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
Modal Visualizar Ticket
======================================-->
<div class="modal fade" id="modalVisualizarTicket" tabindex="-1" aria-labelledby="modalVisualizarTicket" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Visualizar Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="box-body">

            <!-- Titulo -->
            <div class="form-group">
              <label for="tituloTicket" class="col-form-label">Titulo:</label>
              <input type="text" class="form-control" id="tituloTicket" name="tituloTicket">
            </div>

            <!-- Nombre Solicitante -->
            <div class="form-group">
              <label for="solicitanteTicket" class="col-form-label">Nombre Solicitante:</label>
              <?php
                $NombreUsuario = $_SESSION["nombreUsuario"];
                echo '<input type="text" class="form-control" id="solicitanteTicket" name="solicitanteTicket" value='.$NombreUsuario.' readonly>';
              ?>
            </div>

            <!-- Categoria -->
            <div class="form-group">
            <label for="categoriaTicket" class="col-form-label">Perfil:</label>
              <select class="form-control" name="categoriaTicket">
              <?php
                $categorias = ControllerCategorias::ctrMostrarCategorias();
                foreach ($categorias as $key => $value)
                {
                  echo '<option value="'.$value["CodCategoria"].'">'.$value["NombreCategoria"].'</option>';
                }
              ?>
              </select>
            </div>

            <!-- Descripción -->
            <div class="form-group">
              <label for="descripcionTicket" class="col-form-label">Descripción:</label>
              <input type="text" class="form-control" id="descripcionTicket" name="descripcionTicket">
            </div>

            <!-- Respuesta -->
            <div class="form-group">
              <label for="descripcionTicket" class="col-form-label">Respuesta:</label>
              <input type="text" class="form-control" id="descripcionTicket" name="descripcionTicket">
            </div>
          </div>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Generar Ticket</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php
  $eliminarTicket = new ControllerTickets();
  $eliminarTicket -> ctrEliminarTicket();
?>