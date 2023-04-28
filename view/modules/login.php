
<body class="bg-secondary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputEmail" type="email" name="inputEmail" placeholder="correo@gmail.com" />
                      <label for="inputEmail">Correo</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputPassword" type="password" name="inputPassword" placeholder="Password" />
                      <label for="inputPassword">Contraseña</label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                      <label class="form-check-label" for="inputRememberPassword">Recordar Contraseña</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      <a class="small" href="password.html">¿Te olvidaste tu contraseña?</a>
                      <button class="btn btn-primary" type="submit">Ingresar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small"><a href="register">¿Necesitas una cuenta? Regístrate.</a></div>
                </div>
              </div>
              <?php
                $login = new ControllerUsuarios();
                $login -> ctrIniciarSesion();
              ?>
            </div>
          </div>
        </div>
      </main>