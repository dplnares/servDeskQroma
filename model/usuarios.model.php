<?php

require_once "conexion.php";

class ModelUsuarios
{
  //  Obtener todos los datos de un usuario en específico
  static public function mdlMostrarUnUsuario($tabla, $parametro, $email)
  {
    $statement = Conexion::conn()->prepare("SELECT * FROM $tabla WHERE $parametro = :$parametro");
    $statement -> bindParam(":".$parametro, $email , PDO::PARAM_STR);
    $statement -> execute();
    return $statement -> fetch();
  }

  //  Actualizar el último login de un usuario
  static public function mdlActualizarUltimoLogin($tabla, $ultimoLogin, $codUsuario)
  {
    $statement = Conexion::conn()->prepare("UPDATE $tabla SET UltimaConexion=:UltimaConexion WHERE tba_usuarios.CodUsuario = $codUsuario");
    $statement -> bindParam(":UltimaConexion", $ultimoLogin, PDO::PARAM_STR);
    if ($statement->execute()){
			return "ok";	
		}
    else
    {
			return "error";
		}
  }

  //  Mostrar todos los usuarios
  static public function mdlMostrarUsuario($tabla)
  {
    $statement = Conexion::conn()->prepare("SELECT tba_usuarios.CodUsuario, tba_usuarios.NombreUsuario, tba_usuarios.AreaUsuario, tba_usuarios.CorreoUsuario, tba_usuarios.CodPerfil, tba_perfilusuario.NombrePerfil FROM $tabla INNER JOIN tba_perfilusuario ON tba_usuarios.CodPerfil = tba_perfilusuario.CodPerfil");
    $statement -> execute();
    return $statement -> fetchAll();
  }
}