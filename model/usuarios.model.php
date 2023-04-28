<?php

require "conexion.php";

class ModelUsuarios
{
  //  Obtener todos los datos de un usuario en específico
  static public function mdlMostrarUsuarios($tabla, $email)
  {
    $statement = Conexion::conn()->prepare("SELECT * FROM $tabla WHERE CorreoUsuario = $email");
    $statement -> execute();
    return $statement -> fetch();
  }

  static public function mdlActualizarUltimoLogin($tabla, $ultimoLogin, $codUsuario)
  {
    $statement = Conexion::conn()->prepare("UPDATE $tabla SET UltimaConexion = $ultimoLogin WHERE CodUsuario = $codUsuario");
    if ($statement->execute()){
			return "ok";	
		}
    else
    {
			return "error";
		}
  }
}