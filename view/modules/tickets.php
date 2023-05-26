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
          <?php
          /*  Mostramos todos los tickets a los administradores y a los asistentes, en cambio al usuario regular se le muestran todos.
          if($_SESSION["CodPerfil"] == 1) {
            echo'<h1 class="mt-4">Todos los tickets</h1>';
          } else {
            echo '<h1 class="mt-4">Todos mis tickets</h1>';
          }*/
          ?>
          <h1 class="mt-4">Todos mis tickets</h1>
            <div class="d-flex m-2">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAddUser">
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
                    <th>Área</th>
                    <th>Categoría</th>
                    <th>Fecha de Solicitud</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $usuarios = ControllerUsuarios::ctrMostrarUsuarios();
                  foreach ($usuarios as $key => $value) 
                  {
                    //  echo
                    '<tr>
                        <td>'.($key + 1).'</td>
                        <td>'.$value["NombreUsuario"].'</td>
                        <td>'.$value["CorreoUsuario"].'</td>
                        <td>'.$value["NombrePerfil"].'</td>
                        <td>'.$value["NombreArea"].'</td>
                        <td>
                          <button class="btn btn-warning btnEditarUsuario" codUsuario="'.$value["CodUsuario"].'" data-bs-toggle="modal" data-bs-target="#modalEditUser">Editar <i class="fa-solid fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarUsuario" codUsuario="'.$value["CodUsuario"].'">Eliminar <i class="fa-solid fa-trash"></i></button>
                        </td>
                      </tr>';
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

