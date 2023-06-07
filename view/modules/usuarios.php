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

            <div class="d-flex m-2">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAddUser">
                Agregar Usuario
              </button>
            </div>

          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Todos los Usuarios
            </div>
            <div class="card-body">
              <table id="datatablesSimple" class="data-table-Ticket table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Perfil</th>
                    <th>Area</th>
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

<!--=====================================
Modal Agregar Usuario
======================================-->
<div class="modal fade" id="modalAddUser" tabindex="-1" aria-labelledby="modalAddUser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Agregar nuevo usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="box-body">

            <!-- Nombre -->
            <div class="form-group">
              <label for="nombreUsuario" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario">
            </div>

            <!-- Correo Electrónico -->
            <div class="form-group">
              <label for="correoUsuario" class="col-form-label">Correo Electrónico:</label>
              <input type="email" class="form-control" id="correoUsuario" name="correoUsuario">
            </div>

            <!-- Contraseña-->
            <div class="form-group">
              <label for="passwordUsuario" class="col-form-label">Contraseña:</label>
              <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario">
            </div>

            <!-- Perfil -->
            <div class="form-group">
              <label for="perfilUsuario" class="col-form-label">Perfil:</label>
              <select class="form-control" name="perfilUsuario">
                <?php
                  $perfiles = ControllerUsuarios::ctrMostrarPerfiles();
                  foreach ($perfiles as $key => $value)
                  {
                    echo '<option value="'.$value["CodPerfil"].'">'.$value["NombrePerfil"].'</option>';
                  }
                ?>
              </select>
            </div>

            <!-- Area -->
            <div class="form-group">
            <label for="areaUsuario" class="col-form-label">Area:</label>
              <select class="form-control" name="areaUsuario">
                <?php
                  $areas = ControllerUsuarios::ctrMostrarAreas();
                  foreach ($areas as $key => $value)
                  {
                    echo '<option value="'.$value["CodArea"].'">'.$value["NombreArea"].'</option>';
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar Usuario</button>
        </div>
        <?php
          $crearUsuario = new ControllerUsuarios();
          $crearUsuario -> ctrCrearUsuario();
        ?>
      </form>
    </div>
  </div>
</div>


<!--=====================================
Modal Editar Usuario
======================================-->
<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="modalEditUser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="box-body">

            <!-- Nombre -->
            <div class="form-group">
              <label for="editarNombre" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" id="editarNombre" name="editarNombre">
            </div>

            <!-- Correo Electrónico -->
            <div class="form-group">
              <label for="editarCorreo" class="col-form-label">Correo Electrónico:</label>
              <input type="email" class="form-control" id="editarCorreo" name="editarCorreo">
            </div>

            <!-- Perfil -->
            <div class="form-group">
              <label for="editarPerfil" class="col-form-label">Perfil:</label>
              <select class="form-control" name="editarPerfil">
                <?php
                  $perfiles = ControllerUsuarios::ctrMostrarPerfiles();
                  foreach ($perfiles as $key => $value)
                  {
                    echo '<option value="'.$value["CodPerfil"].'">'.$value["NombrePerfil"].'</option>';
                  }
                ?>
              </select>
            </div>

            <!-- Area -->
            <div class="form-group">
            <label for="editarArea" class="col-form-label">Area:</label>
              <select class="form-control" name="editarArea">
                <?php
                  $areas = ControllerUsuarios::ctrMostrarAreas();
                  foreach ($areas as $key => $value)
                  {
                    echo '<option value="'.$value["CodArea"].'">'.$value["NombreArea"].'</option>';
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="codUsuario" name="codUsuario" class="codUsuario">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Editar Usuario</button>
        </div>
        <?php
          $crearUsuario = new ControllerUsuarios();
          $crearUsuario -> ctrEditarUsuario();
        ?>
      </form>
    </div>
  </div>
</div>

<?php
  $borrarUsuario = new ControllerUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
?>