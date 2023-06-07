<?php

require_once "conexion.php";

class ModelCategorias
{
  static public function mdlMostrarCategorias($tabla)
  {
    $statement = Conexion::conn()->prepare("SELECT tba_categoria.CodCategoria, tba_categoria.NombreCategoria FROM $tabla");
    $statement -> execute();
    return $statement -> fetchAll();
  }
}