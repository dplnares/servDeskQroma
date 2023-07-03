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
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAddTicket">
                Nueva Respuesta
              </button>
            </div>
          <div class="card mb-4">
            <div class="card-header">
              Respuesta del Ticket
            </div>
            <div class="card-body">
              <div class="row mt-2">
                <div class="col-md-12"><label class="labels">Descripción</label><input type="text" class="form-control" value="<?php echo $detalleTicket["DescripcionTicket"] ?>" readonly></div>
                <div class="col-md-6"><label class="labels">Archivo Adjunto</label><input type="text" class="form-control" value="Archivo Adjunto" readonly></div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
