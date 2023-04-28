<?php

class ControllerUsuarios
{
  //  Verificar los valores para iniciar sesión  
  static public function ctrIniciarSesion()
  {
    if (isset($_POST["inputEmail"]))
    {
      $passwordCrypt = crypt($_POST["inputPassword"], '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi');
      $email = $_POST["inputEmail"];
      $tabla = "tba_usuarios";

      $datosUsuario = ModelUsuarios::mdlMostrarUsuarios($tabla, $email);

      if($datosUsuario["CorreoUsuario"] == $_POST["inputEmail"] && $datosUsuario["PasswordUsuario"] == $passwordCrypt)
      {
        $_SESSION["login"] = "ok";
        $_SESSION["emailUsuario"] = $datosUsuario["CorreoUsuario"];
        $_SESSION["perfilUsuario"] = $datosUsuario["CodPerfil"];
        $_SESSION["areaUsuario"] = $datosUsuario["AreaUsuario"];
        $_SESSION["nombreUsuario"] = $datosUsuario["NombreUsuario"];
        
        //  Registramos la fecha para el último login
        date_default_timezone_set('America/Bogota');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $ultimoLogin = $fecha.' '.$hora;

        $registrarLogin = ModelUsuarios::mdlActualizarUltimoLogin($tabla, $ultimoLogin, $datosUsuario["CodUsuario"]);
        if ($ultimoLogin == "ok")
        {
          echo '<script>
            window.location = "home-user";
          </script>';
        }
      }
      else
      {
        echo '<br><div class="alert alert-danger">Error en los datos ingresados, vuelve a intentarlo</div>';
      }
    }
  }
}