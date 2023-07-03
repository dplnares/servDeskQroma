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
          <h1 class="mt-4">Asignar Tickets</h1>

          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Todos los tickets
            </div>
            <div class="card-body">
              <table id="datatablesSimple" class="data-table-Ticket table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Solicitante</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $listaTickets = ControllerTickets::ctrMostrarTickets($_SESSION["perfilUsuario"], $_SESSION["codUsuario"]);
                    foreach ($listaTickets as $key => $value)
                    {
                      //  Solo se muestra los tickets que han sido registrados y aún no están asignados
                      if($value["CodEstado"]=="1")
                      {
                        echo
                        '<tr>
                          <td>'.($key + 1).'</td>
                          <td>'.$value["TituloTicket"].'</td>
                          <td>'.$value["NombreUsuario"].'</td>
                          <td>'.$value["NombreEstado"].'</td>
                          <td>'.$value["NombreCategoria"].'</td>
                          <td>
                            <button class="btn btn-warning btnAsignarTicket" codTicket="'.$value["CodTicket"].'" data-bs-toggle="modal" data-bs-target="#modalAsignarTicket">Asignar <i class="fa-solid fa-pencil"></i></button>
                        </tr>';
                      }
                      else
                      {
                        continue;
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
Modal Asignar Ticket
======================================-->
<div class="modal fade" id="modalAsignarTicket" tabindex="-1" aria-labelledby="modalAsignarTicket" aria-hidden="true">
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
              <label for="asignarTitulo" class="col-form-label">Titulo:</label>
              <input type="text" class="form-control" id="asignarTitulo" name="asignarTitulo" readonly>
            </div>

            <!-- Nombre Solicitante -->
            <div class="form-group">
              <label for="asignarSolicitante" class="col-form-label">Nombre Solicitante:</label>
              <?php
                $NombreUsuario = $_SESSION["nombreUsuario"];
                echo '<input type="text" class="form-control" id="asignarSolicitante" name="asignarSolicitante" value='.$NombreUsuario.' readonly>';
              ?>
            </div>

            <!-- Categoria -->
            <div class="form-group">
            <label for="asignarCategoria" class="col-form-label">Categoria:</label>
              <select class="form-control" name="asignarCategoria" disabled>
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
              <label for="asignarDescripcion" class="col-form-label">Descripción:</label>
              <input type="text" class="form-control" id="asignarDescripcion" name="asignarDescripcion" readonly>
            </div>
          </div>

          <!-- Usuario asignado -->
          <div class="form-group">
            <label for="asignarAsistente" class="col-form-label">Asistente:</label>
              <select class="form-control" name="asignarAsistente">
              <?php
                //  Mostrar todos los usuarios que son de tipo Asistente
                $asistentes = ControllerUsuarios::ctrMostrarUsuariosPorPerfil("3");
                foreach ($asistentes as $key => $value)
                {
                  echo '<option value="'.$value["CodUsuario"].'">'.$value["NombreUsuario"].' '.$value["ApellidoUsuario"].'</option>';
                }
              ?>
              </select>
            </div>
        </div>
        <div class="modal-footer">
        <input type="hidden" id="codTicket" name="codTicket" class="codTicket">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Asignar Ticket</button>
        </div>
        <?php
          $asignarUsuario = new ControllerTickets();
          $asignarUsuario -> ctrAsignarTicket();
        ?>
      </form>
    </div>
  </div>
</div>