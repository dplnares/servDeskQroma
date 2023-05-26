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
      <h1 class="mt-4">Bienvenido <?php echo $_SESSION["nombreUsuario"] ?></h1>

      <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
          <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $_SESSION["nombreUsuario"] ?></span><span class="text-black-50"><?php echo $_SESSION["emailUsuario"] ?></span><span> </span></div>
          </div>
          <div class="col-md-5 border-right">
            <?php 
              $datosUsuario = ControllerUsuarios::ctrMostrarDatosEditar($_SESSION["codUsuario"]);
              $nombre = $datosUsuario["NombreUsuario"];
            ?>
            <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Datos Personales</h4>
              </div>
              <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" value="<?php echo $nombre ?>" placeholder="Ingrese su nombre"></div>
                <div class="col-md-6"><label class="labels">Apellido</label><input type="text" class="form-control" value="<?php echo $nombre ?>" placeholder="Ingrese su apellido"></div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Celular</label><input type="text" class="form-control" placeholder="Ingrese su número de celular" value="<?php echo $nombre ?>"></div>
                <div class="col-md-12"><label class="labels">Correo Electrónico</label><input type="text" class="form-control" placeholder="Ingrese su correo electrónico" value="<?php echo $datosUsuario["NombreUsuario"] ?>"></div>
                <div class="col-md-12"><label class="labels">Area de Trabajo</label><input type="text" class="form-control" placeholder="" value=""></div>
                <div class="col-md-12"><label class="labels">Sede</label><input type="text" class="form-control" placeholder="" value=""></div>
              </div>
              <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

</div>
</main>
</div>
</div>