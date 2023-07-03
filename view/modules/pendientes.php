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
          <h1 class="mt-4">Pendientes por atender</h1>

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
                    $listaTickets = ControllerTickets::ctrMostrarPendientesAsesor($_SESSION["codUsuario"]);
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
                        <td>
                        <button class="btn btn-warning btnAtenderTicket" codTicket="'.$value["CodTicket"].'">Atender Ticket <i class="fa-solid fa-pencil"></i></button>
                        </td>
                        </tr>
                        ';
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
