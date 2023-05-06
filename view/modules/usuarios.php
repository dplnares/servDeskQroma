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
          <h1 class="mt-4">Administrar usuarios</h1>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Todos los Usuarios
            </div>
            <div class="card-body">
              <table id="datatablesSimple" class="data-table-Usuario">
                <thead>
                  <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Area</th>
                    <th>Correo Electrónico</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $usuarios = ControllerUsuarios::ctrMostrarUsuarios();
                  foreach ($usuarios as $key => $value) 
                  {
                    echo
                    '<tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["NombreUsuario"] . '</td>
                        <td>' . $value["AreaUsuario"] . '</td>
                        <td>' . $value["CorreoUsuario"] . '</td>
                        <td>' . $value["NombrePerfil"] . '</td>
                        <td>' . $value["NombrePerfil"] . '</td>
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
