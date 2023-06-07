<?php

class ControllerCategorias
{
  static public function ctrMostrarCategorias()
  {
    $tabla = "tba_categoria";
    $listarcategorias = ModelCategorias::mdlMostrarCategorias($tabla);
    return $listarcategorias;
  }
}