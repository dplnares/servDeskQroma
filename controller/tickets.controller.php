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
      );
      
      $respuestaCabecera = ModelTickets::mdlIngresarCabeceraTicket($tablaCabecera, $datosCabecera);

      if ($respuestaCabecera == "ok")
      {
        $tablaDetalle = "tba_detalleticket";
        $CodTicket = self::ctrObtenerUltimoTicket();
        $datosDetalle = array(
          "DescripcionTicket" => $_POST["descripcionTicket"],
          "CodTicket" => $CodTicket["CodTicket"],
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
}