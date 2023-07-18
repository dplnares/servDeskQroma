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
            $cabeceraTicket = ControllerTickets::ctrObtenerDatosCabecera($_GET["codTicket"]);
            $detalleTicket = ControllerTickets::ctrObtenerDatosDetalle($_GET["codTicket"]);
            $solicitante = ControllerUsuarios::ctrMostrarUnUsuario($cabeceraTicket["CodUsuario"]);
            $asesor = ControllerUsuarios::ctrMostrarUnUsuario($cabeceraTicket["CodAsignacion"]);
          ?>
          <h1 class="mt-4">Ticket - <?php echo $cabeceraTicket["TituloTicket"] ?></h1>

          <div class="card mb-4">
            <div class="card-header">
              Datos Generales
            </div>
            <div class="card-body">
              <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Titulo del Ticket</label><input type="text" class="form-control" value="<?php echo $cabeceraTicket["TituloTicket"] ?>" readonly></div>
                <div class="col-md-6"><label class="labels">Usuario Solicitante</label><input type="text" class="form-control" value="<?php echo $solicitante["NombreUsuario"] ?>" readonly></div>
                <div class="col-md-6"><label class="labels">Categoria Ticket</label><input type="text" class="form-control" value="<?php echo $cabeceraTicket["NombreCategoria"] ?>" readonly></div>
                <div class="col-md-6"><label class="labels">Estado del Ticket</label><input type="text" class="form-control" value="<?php echo $cabeceraTicket["NombreEstado"] ?>" readonly></div>
                <div class="col-md-6"><label class="labels">Asesor Asignado</label><input type="text" class="form-control" value="<?php echo $asesor["NombreUsuario"] ?>" readonly></div>
                <div class="col-md-6"><label class="labels">Fecha Creacion</label><input type="text" class="form-control" value="<?php echo $cabeceraTicket["FechaCreacion"] ?>" readonly></div>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-header">
              Descripción del Ticket
            </div>
            <div class="card-body">
              <div class="row mt-2">
                <div class="col-md-12"><label class="labels">Descripción</label><input type="text" class="form-control" value="<?php echo $detalleTicket["DescripcionTicket"] ?>" readonly></div>
                <div class="col-md-6"><label class="labels">Archivo Adjunto</label><input type="text" class="form-control" value="Archivo Adjunto" readonly></div>
              </div>
            </div>
          </div>
          <div class="d-flex m-2">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalNuevaRespuesta">
                Nueva Respuesta
              </button>
            </div>
          <div class="card mb-4">
            <div class="card-header">
            Respuesta del Ticket
            </div>
            <?php
              $respuestasAtenciones = ControllerPendientes::ctrMostrarRespuesta($_GET["codTicket"]);
              
              if($respuestasAtenciones != null)
              {
                echo '
                  <div class="card-body">
                    <div class="row mt-2">
                      <div class="col-md-12"><label class="labels">Titulo Atencion</label><input type="text" class="form-control" value='. $respuestasAtenciones["TituloAtencion"] .'" readonly></div>
                      <div class="col-md-6"><label class="labels">Descripcion Atencion</label><input type="text" class="form-control" value='. $respuestasAtenciones["Descripcion"] .' readonly></div>
                    </div>
                  </div>
                ';
              }
              else
              {
                echo '
                  <div class="card-body">
                    <div class="row mt-2">
                    </div>
                  </div>
                ';
              }
            ?>
          </div>
        </div>
      </main>
    </div>
  </div>

<!--=====================================
Modal Responder Ticket
======================================-->
<div class="modal fade" id="modalNuevaRespuesta" tabindex="-1" aria-labelledby="modalNuevaRespuesta" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Nueva respuesta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="box-body">

            <!-- Titulo -->
            <div class="form-group">
              <label for="tituloRespuesta" class="col-form-label">Titulo:</label>
              <input type="text" class="form-control" id="tituloRespuesta" name="tituloRespuesta">
            </div>

            <!-- Respuesta -->
            <div class="form-group">
              <label for="message-text" class="col-form-label">Respuesta:</label>
              <textarea class="form-control" id="descripcionRespuesta" name="descripcionRespuesta"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Generar Respuesta</button>
        </div>
        <?php
          $crearRespuesta = new ControllerPendientes();
          $crearRespuesta -> ctrCrearNuevaRespuesta();
        ?>
      </form>
    </div>
  </div>
</div>