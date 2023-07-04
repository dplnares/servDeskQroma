<?php

class ControllerPendientes
{
  static public function ctrCrearNuevaRespuesta()
  {
    if(isset($_POST["tituloRespuesta"]))
    {
      $tablaAtenciones = "tba_atenciones";
      $tablaDetalleTicket = "tba_detalleticket";
      $codDetalleTicket = ModelTickets::mdlObtenerDatosDetalle($tablaDetalleTicket, $_GET["codTicket"]);
      $datosCreate = array(
        "CodTicket" => $_GET["codTicket"],
        "CodDetalleTicket" => $codDetalleTicket["CodDetalleTicket"],
        "TituloAtencion" => $_POST["tituloRespuesta"],
        "DescripcionAtencion" => $_POST["descripcionRespuesta"],
        "FechaCreacion"=> date("Y-m-d"),
        "FechaActualizacion"=> date("Y-m-d"),
      );

      $respuestaAtencion = ModelPendientes::mdlAgregarNuevaRespuesta($tablaAtenciones, $datosCreate);
      if($respuestaAtencion == "ok")
      {
        $cambiarEstado = ControllerTickets::ctrCambiarEstado($_GET["codTicket"], 3);
        if($cambiarEstado == "ok")
        {
          echo '
            <script>
            Swal.fire({
              icon: "success",
              title: "Correcto",
              text: "¡Ticket actualizado Correctamente!",
              }).then(function(result){
                if(result.value){
                  window.location = "pendientes";
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
              text: "¡Error al actualizar el ticket!",
              }).then(function(result){
                if(result.value){
                  window.location = "pendientes";
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
            text: "¡Error al actualizar el ticket!",
            }).then(function(result){
              if(result.value){
                window.location = "pendientes";
              }
            });
          </script>';
      }
    }
  }

  //  Mostrar todas las respuestas
  static public function ctrMostrarRespuesta($codTicket)
  {
    $tabla = "tba_atenciones";
    $respuesta = ModelPendientes::mdlMostrarRespuesta($tabla, $codTicket);
    return $respuesta;
  }
}