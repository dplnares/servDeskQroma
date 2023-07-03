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
      $parametro = "CorreoUsuario";

      $datosUsuario = ModelUsuarios::mdlMostrarUnUsuario($tabla, $parametro, $email);

      if($datosUsuario["CorreoUsuario"] == $_POST["inputEmail"] && $datosUsuario["PasswordUsuario"] == $passwordCrypt)
      {
        $_SESSION["login"] = "ok";
        $_SESSION["emailUsuario"] = $datosUsuario["CorreoUsuario"];
        $_SESSION["perfilUsuario"] = $datosUsuario["CodPerfil"];
        $_SESSION["areaUsuario"] = $datosUsuario["AreaUsuario"];
        $_SESSION["nombreUsuario"] = $datosUsuario["NombreUsuario"];
        $_SESSION["codUsuario"] = $datosUsuario["CodUsuario"];
        
        //  Registramos la fecha para el último login
        date_default_timezone_set('America/Bogota');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $ultimoLogin = $fecha.' '.$hora;

        $registrarLogin = ModelUsuarios::mdlActualizarUltimoLogin($tabla, $ultimoLogin, $datosUsuario["CodUsuario"]);
        if ($registrarLogin == "ok")
        {
          echo '<script>
            window.location = "home";
          </script>';
        }
      }
      else
      {
        echo '<br><div class="alert alert-danger">Error en los datos ingresados, vuelve a intentarlo</div>';
      }
    }
  }

  //  Mostrar todos los usuarios actuales
  static public function ctrMostrarUsuarios()
  {
    $tabla = "tba_usuarios";
    $listaUsuarios = ModelUsuarios::mdlMostrarUsuarios($tabla);
    return $listaUsuarios;
  }

  //  Agregar un nuevo usuario
  static public function ctrCrearUsuario()
  {
    if(isset($_POST["nombreUsuario"]))
    {
      $tabla = "tba_usuarios";
      $passwordCrypt = crypt($_POST["passwordUsuario"], '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi');
      $datosCreate = array(
        "NombreUsuario" => $_POST["nombreUsuario"],
        "CorreoUsuario" => $_POST["correoUsuario"],
        "PasswordUsuario" => $passwordCrypt,
        "CodPerfil" => $_POST["perfilUsuario"],
        "CodArea" => $_POST["areaUsuario"],
        "FechaCreacion"=>date("Y-m-d"),
        "FechaActualizacion"=>date("Y-m-d"),
      );

      $respuesta = ModelUsuarios::mdlIngresarUsuario($tabla, $datosCreate);
      if($respuesta == "ok")
      {
        echo '
        <script>
          Swal.fire({
            icon: "success",
            title: "Correcto",
            text: "¡Usuario ingresado Correctamente!",
          }).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
        </script>';
      }	
    }
  }

  //  Mostrar los perfiles de los usuarios
  static public function ctrMostrarPerfiles()
  {
    $tabla = "tba_perfilusuario";
    $listaPerfiles = ModelUsuarios::mdlMostrarPerfiles($tabla);
    return $listaPerfiles;
  }

  //  Mostrar las areas de los usuario
  static public function ctrMostrarAreas()
  {
    $tabla = "tba_areausuario";
    $listaPerfiles = ModelUsuarios::mdlMostrarAreas($tabla);
    return $listaPerfiles;
  }

  //  Mostrar datos de un usuario para editar
  static public function ctrMostrarDatosEditar($codUsuario)
  {
    $tabla = "tba_usuarios";
    $datosUsuario = ModelUsuarios::mdlMostrarDatosEditar($tabla, $codUsuario);
    return $datosUsuario;
  }

  //  Editar Usuario
  static public function ctrEditarUsuario()
  {
    if(isset($_POST["editarNombre"]))
    {
      $tabla = "tba_usuarios";
      $datosUpdate = array(
        "NombreUsuario" =>  $_POST["editarNombre"],
        "CorreoUsuario" => $_POST["editarCorreo"],
        "CodPerfil" => $_POST["editarPerfil"],
        "CodArea" => $_POST["editarArea"],
        "CodUsuario" => $_POST["codUsuario"],
        "FechaActualizacion"=>date("Y-m-d"),
      );

      $respuesta = ModelUsuarios::mdlUpdateUsuario($tabla, $datosUpdate);
      if($respuesta == "ok")
      {
        echo '
        <script>
          Swal.fire({
            icon: "success",
            title: "Correcto",
            text: "¡Usuario editado Correctamente!",
          }).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
        </script>';
      }
      else
      {
        echo '
        <script>
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Error al editar usuario!",
          }).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
        </script>';
      }
    }
  }

  //  Eliminar usuario
  public static function ctrBorrarUsuario()
  {
    if (isset($_GET["codUsuario"]))
    {
      $tabla = "tba_usuarios";
      $codUsuario = $_GET["codUsuario"];
      $respuesta = ModelUsuarios::mdlEliminarUsuario($tabla, $codUsuario);
      if($respuesta == "ok")
      {
        echo '
        <script>
          Swal.fire({
            icon: "success",
            title: "Correcto",
            text: "¡Usuario eliminado Correctamente!",
          }).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
        </script>';
      }
    }
  }

  //  Mostrar los usuarios por perfil
  public static function ctrMostrarUsuariosPorPerfil($codPerfil)
  {
    $tabla = "tba_usuarios";
    $respuesta = ModelUsuarios::mdlMostrarUsuariosPorPerfil($tabla, $codPerfil);
    return $respuesta;
  }

  //  Editar los datos del perfil del usuario  
  public static function ctrEditarPerfil($codUsuarioPerfil, $nombreUsuario, $apellidoUsuario, $celularUsuario, $correoUsuario){
    $tabla = "tba_usuarios";
    $datosUpdate = array(
      "CodUsuario" => $codUsuarioPerfil,
      "NombreUsuario" =>  $nombreUsuario,
      "ApellidoUsuario" => $apellidoUsuario,
      "CelularUsuario" => $celularUsuario,
      "CorreoUsuario" => $correoUsuario,
      "FechaActualizacion"=>date("Y-m-d"),
    );
    $respuesta = ModelUsuarios::mdlUpdateDatosPerfil($tabla, $datosUpdate);
    return $respuesta;
  }

  //  Mostrar los datos de un usuario
  public static function ctrMostrarUnUsuario($codUsuario)
  {
    $tabla = "tba_usuarios";
    $datosUsuario = ModelUsuarios::mdlMostrarDatosUnUsuario($tabla, $codUsuario);
    return $datosUsuario;
  }
}