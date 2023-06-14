<?php

class ControllerTickets
{
  // Crear un nuevo Ticket
  static public function ctrCrearNuevoTicket()
  {
    if(isset($_POST["tituloTicket"]))
    {
      $tablaCabecera = "tba_ticket";
      $datosCabecera = array(
        "CodUsuario" => $_SESSION["codUsuario"],
        "TituloTicket" => $_POST["tituloTicket"],
        "CodCategoria" => $_POST["categoriaTicket"],
        "CodEstado" => "1",
        "FechaCreacion"=>date("Y-m-d"),
        "FechaActualizacion"=>date("Y-m-d"),
      );
      
      $respuestaCabecera = ModelTickets::mdlIngresarCabeceraTicket($tablaCabecera, $datosCabecera);

      if ($respuestaCabecera == "ok")
      {
        $tablaDetalle = "tba_detalleticket";
        $CodTicket = self::ctrObtenerUltimoTicket();
        $datosDetalle = array(
          "DescripcionTicket" => $_POST["descripcionTicket"],
          "CodTicket" => $CodTicket["CodTicket"],
          "FechaCreacion"=>date("Y-m-d"),
          "FechaActualizacion"=>date("Y-m-d"),
        );

        $respuestaDetalle = ModelTickets::mdlIngresarDetalleTicket($tablaDetalle, $datosDetalle);
        if ($respuestaDetalle == "ok")
        {
          echo '
            <script>
            Swal.fire({
              icon: "success",
              title: "Correcto",
              text: "¡Ticket registrado Correctamente!",
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
              text: "¡Error al registrar el detalle!",
              }).then(function(result){
                if(result.value){
                  window.location = "tickets";
                }
              });
            </script>';
        }
      }
      else
      {
        echo '
            <script>
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Error al registrar la cabecera!",
              }).then(function(result){
                if(result.value){
                  window.location = "tickets";
                }
              });
            </script>';
      }
    }
  }

  // Mostrar todos los tickets para un usuario en particular
  static public function ctrMostrarTickets($perfilUsuario, $codUsuario)
  {
    $tabla = "tba_ticket";
    if ($perfilUsuario == "2")
    {
      $listaTickets = ModelTickets::mdlMostrarTicketsUsuarios($tabla, $codUsuario);
    }
    else
    {
      $listaTickets = ModelTickets::mdlMostrarTodoslosTickets($tabla);
    }
    return $listaTickets;
  }

  // Obtener el codigo del último ticket creado
  static public function ctrObtenerUltimoTicket()
  {
    $tabla = "tba_ticket";
    $codigoTicket = ModelTickets::mdlObtenerUltimoTicket($tabla);
    return $codigoTicket;
  }

  //  Eliminar ticket
  static public function ctrEliminarTicket()
  {
    if (isset($_GET["codTicket"]))
    {
      $tabla = "tba_ticket";
      $codTicket = $_GET["codTicket"];
      $respuesta = ModelTickets::mdlEliminarTicket($tabla, $codTicket);
      if($respuesta == "ok")
      {
        echo '
        <script>
          Swal.fire({
            icon: "success",
            title: "Correcto",
            text: "Ticket eliminado Correctamente!",
          }).then(function(result){
						if(result.value){
							window.location = "tickets";
						}
					});
        </script>';
      }
    }
  }

  //  Mostrar los datos de un solo ticket para editarlo
  static public function ctrMostrarDatosTicket($codTicket)
  {
    $tabla = "tba_ticket";
    $datosTicket = ModelTickets::mdlMostrarDatosTicket($tabla, $codTicket);
    return $datosTicket;
  }

  //  Editar los datos de un ticket 
  static public function ctrEditarTicket()
  {
    if(isset($_POST["editarTitulo"]))
    {
      $tabla = "tba_ticket";
      $datosUpdate = array(
        "TituloTicket" => $_POST["editarTitulo"],
        "CodCategoria" => $_POST["editarCategoria"],
        "CodTicket" => $_POST["codTicket"],
        "FechaActualizacion"=>date("Y-m-d"),
      );

      $respuestaCabecera = ModelTickets::mdlUpdateTicket($tabla, $datosUpdate);
      if ($respuestaCabecera == "ok")
      {
        $tabla = "tba_detalleticket";
        $datosUpdate = array(
          "CodTicket" => $_POST["codTicket"],
          "DescripcionTicket" => $_POST["editarDescripcion"],
          "FechaActualizacion"=>date("Y-m-d"),
        );
        $respuestaDetalle = ModelTickets::mdlUpdateDetalleTicket($tabla, $datosUpdate);
        if($respuestaDetalle == "ok")
        {
          echo '
          <script>
            Swal.fire({
              icon: "success",
              title: "Correcto",
              text: "Ticket editado Correctamente!",
            }).then(function(result){
              if(result.value){
                window.location = "tickets";
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
              text: "Error al editar el detalle!",
            }).then(function(result){
              if(result.value){
                window.location = "tickets";
              }
            });
          </script>';
        }
      }
      else
      {
        echo '
        <script>
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Error al editar la cabecera!",
          }).then(function(result){
						if(result.value){
							window.location = "tickets";
						}
					});
        </script>';
      }
    }
  }
}