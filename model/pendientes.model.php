<?php

require_once "conexion.php";

class ModelPendientes
{
  static public function mdlAgregarNuevaRespuesta($tabla, $datosCreate)
  {
    $statement = Conexion::conn()->prepare("INSERT INTO $tabla (CodTicket, CodDetalleTicket, TituloAtencion, DescripcionAtencion, FechaCreacion, FechaActualizacion) VALUES(:CodTicket, :CodDetalleTicket, :TituloAtencion, :DescripcionAtencion, :FechaCreacion, :FechaActualizacion)");
    $statement -> bindParam(":CodTicket", $datosCreate["CodTicket"], PDO::PARAM_STR);
    $statement -> bindParam(":CodDetalleTicket", $datosCreate["CodDetalleTicket"], PDO::PARAM_STR);
    $statement -> bindParam(":TituloAtencion", $datosCreate["TituloAtencion"], PDO::PARAM_STR);
    $statement -> bindParam(":DescripcionAtencion", $datosCreate["DescripcionAtencion"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaCreacion", $datosCreate["FechaCreacion"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaActualizacion", $datosCreate["FechaActualizacion"], PDO::PARAM_STR);
    if($statement -> execute())
    {
      return "ok";
    }
    else
    {
      return "error";
    }
  }

  static public function mdlMostrarRespuesta($tabla, $codTicket)
  {
    $statement = Conexion::conn()->prepare("SELECT tba_atenciones.CodAtencion, tba_atenciones.TituloAtencion, tba_atenciones.DescripcionAtencion FROM $tabla WHERE tba_atenciones.CodTicket = $codTicket");
    $statement -> execute();
    return $statement -> fetchAll();
  }
}