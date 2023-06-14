<?php

require_once "conexion.php";

class ModelTickets
{
  //  Ingresar Cabecera del detalle
  static public function mdlIngresarCabeceraTicket($tabla, $datosCabecera)
  {
    $statement = Conexion::conn()->prepare("INSERT INTO $tabla (TituloTicket, CodUsuario, CodCategoria, CodEstado, FechaCreacion, FechaActualizacion) VALUES(:TituloTicket, :CodUsuario, :CodCategoria, :CodEstado, :FechaCreacion, :FechaActualizacion)");
    $statement -> bindParam(":TituloTicket", $datosCabecera["TituloTicket"], PDO::PARAM_STR);
    $statement -> bindParam(":CodUsuario", $datosCabecera["CodUsuario"], PDO::PARAM_STR);
    $statement -> bindParam(":CodCategoria", $datosCabecera["CodCategoria"], PDO::PARAM_STR);
    $statement -> bindParam(":CodEstado", $datosCabecera["CodEstado"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaCreacion", $datosCabecera["FechaCreacion"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaActualizacion", $datosCabecera["FechaActualizacion"], PDO::PARAM_STR);

    if($statement -> execute())
    {
      return "ok";
    }
    else
    {
      return "error";
    }
  }

    //  Ingresar Detalle del detalle
  static public function mdlIngresarDetalleTicket($tabla, $datosDetalle)
  {
    $statement = Conexion::conn()->prepare("INSERT INTO $tabla (CodTicket, DescripcionTicket) VALUES(:CodTicket, :DescripcionTicket)");
    $statement -> bindParam(":CodTicket", $datosDetalle["CodTicket"], PDO::PARAM_STR);
    $statement -> bindParam(":DescripcionTicket", $datosDetalle["DescripcionTicket"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaCreacion", $datosDetalle["FechaCreacion"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaActualizacion", $datosDetalle["FechaActualizacion"], PDO::PARAM_STR);

    if($statement -> execute())
    {
      return "ok";
    }
    else
    {
      return "error";
    }
  }

  //  Obtener el último registro de los tickets para añadirle el detalle ahí 
  static public function mdlObtenerUltimoTicket($tabla)
  {
    $statement = Conexion::conn()->prepare("SELECT MAX(CodTicket) AS CodTicket FROM $tabla");
    $statement -> execute();
    return $statement -> fetch();
  }

  //  Mostrar los tickets de un usuario en específico
  static public function mdlMostrarTicketsUsuarios($tabla, $codUsuario)
  {
    $statement = Conexion::conn()->prepare("SELECT tba_ticket.CodTicket, tba_ticket.CodEstado, tba_ticket.CodAsignacion, tba_ticket.CodCategoria, tba_ticket.CodUsuario, tba_ticket.TituloTicket, tba_usuarios.NombreUsuario, tba_categoria.NombreCategoria, tba_estado.NombreEstado FROM $tabla INNER JOIN tba_usuarios ON tba_ticket.CodUsuario = tba_usuarios.CodUsuario INNER JOIN tba_categoria ON tba_ticket.CodCategoria = tba_categoria.CodCategoria INNER JOIN tba_estado ON tba_ticket.CodEstado = tba_estado.CodEstado WHERE tba_ticket.CodUsuario = $codUsuario");
    $statement -> execute();
    return $statement -> fetchAll();
  }

  //  Mostrar todos los tickets creados
  static public function mdlMostrarTodoslosTickets($tabla)
  {
    $statement = Conexion::conn()->prepare("SELECT tba_ticket.CodTicket, tba_ticket.CodEstado, tba_ticket.CodAsignacion, tba_ticket.CodCategoria, tba_ticket.CodUsuario, tba_ticket.TituloTicket, tba_usuarios.NombreUsuario, tba_categoria.NombreCategoria, tba_estado.NombreEstado FROM $tabla INNER JOIN tba_usuarios ON tba_ticket.CodUsuario = tba_usuarios.CodUsuario INNER JOIN tba_categoria ON tba_ticket.CodCategoria = tba_categoria.CodCategoria INNER JOIN tba_estado ON tba_ticket.CodEstado = tba_estado.CodEstado");
    $statement -> execute();
    return $statement -> fetchAll();
  }

  //  Eliminar un ticket
  static public function mdlEliminarTicket($tabla, $codTicket)
  {
    $statement = Conexion::conn()->prepare("DELETE FROM $tabla WHERE CodTicket = $codTicket");
    if ($statement -> execute())
    {
      return "ok";
    }
    else
    {
      return "error";
    }
  }

  //  Mostrar los datos del ticket ajax
  static public function mdlMostrarDatosTicket($tabla, $codTicket)
  {
    $statement = Conexion::conn()->prepare("SELECT tba_ticket.CodTicket, tba_ticket.TituloTicket, tba_ticket.CodCategoria, tba_categoria.NombreCategoria,  tba_detalleticket.DescripcionTicket FROM $tabla INNER JOIN tba_categoria ON tba_ticket.CodCategoria = tba_categoria.CodCategoria LEFT JOIN tba_detalleticket ON tba_ticket.CodTicket = tba_detalleticket.CodTicket WHERE tba_ticket.CodTicket = $codTicket");
    $statement -> execute();
    return $statement -> fetch();
  }

  //  Update de la cabecera del ticket
  static public function mdlUpdateTicket($tabla, $datosUpdate)
  {
    $statement = Conexion::conn()->prepare("UPDATE $tabla SET TituloTicket=:TituloTicket, CodCategoria=:CodCategoria, FechaActualizacion=:FechaActualizacion WHERE CodTicket=:CodTicket");
    $statement -> bindParam(":TituloTicket", $datosUpdate["TituloTicket"], PDO::PARAM_STR);
    $statement -> bindParam(":CodCategoria", $datosUpdate["CodCategoria"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaActualizacion", $datosUpdate["FechaActualizacion"], PDO::PARAM_STR);
    $statement -> bindParam(":CodTicket", $datosUpdate["CodTicket"], PDO::PARAM_STR);
    if($statement -> execute())
    {
      return "ok";
    }
    else
    {
      return "error";
    }
  }

  //  Update del detalle del ticket
  static public function mdlUpdateDetalleTicket($tabla, $datosUpdate)
  {
    $statement = Conexion::conn()->prepare("UPDATE $tabla SET DescripcionTicket=:DescripcionTicket, FechaActualizacion=:FechaActualizacion WHERE CodTicket=:CodTicket");
    $statement -> bindParam(":DescripcionTicket", $datosUpdate["DescripcionTicket"], PDO::PARAM_STR);
    $statement -> bindParam(":FechaActualizacion", $datosUpdate["FechaActualizacion"], PDO::PARAM_STR);
    $statement -> bindParam(":CodTicket", $datosUpdate["CodTicket"], PDO::PARAM_STR);
    if($statement -> execute())
    {
      return "ok";
    }
    else
    {
      return "error";
    }
  }
}