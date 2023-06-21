<?php

require_once "../controller/usuarios.controller.php";
require_once "../model/usuarios.model.php";

class AjaxUsuarios
{
  //  Editar Usuario
  public $codUsuario;
  public function ajaxEditarUsuario()
  {
    $codUsuario = $this->codUsuario;
    $respuesta = ControllerUsuarios::ctrMostrarDatosEditar($codUsuario);
    echo json_encode($respuesta);
  }

  public $codUsuarioPerfil;
  public $nombreUsuario;
  public $apellidoUsuario;
  public $celularUsuario;
  public $correoUsuario;

  public function ajaxEditarPerfil()
  {
    $codUsuarioPerfil = $this -> codUsuarioPerfil;
    $nombreUsuario = $this -> nombreUsuario;
    $apellidoUsuario = $this -> apellidoUsuario;
    $celularUsuario = $this -> celularUsuario;
    $correoUsuario = $this -> correoUsuario;
    $respuesta = ControllerUsuarios::ctrEditarPerfil($codUsuarioPerfil, $nombreUsuario, $apellidoUsuario, $celularUsuario, $correoUsuario);
    echo json_encode($respuesta);
  }
}

//  Mostrar datos para editar usuario
if(isset($_POST["codUsuario"])){
	$editar = new AjaxUsuarios();
	$editar -> codUsuario = $_POST["codUsuario"];
	$editar -> ajaxEditarUsuario();
}

//  Editar los datos del usuario de la vista perfil
if(isset($_POST["codUsuarioPerfil"])){
	$editarPerfil = new AjaxUsuarios();
	$editarPerfil -> codUsuarioPerfil = $_POST["codUsuarioPerfil"];
  $editarPerfil -> nombreUsuario = $_POST["nombreUsuario"];
  $editarPerfil -> apellidoUsuario = $_POST["apellidoUsuario"];
  $editarPerfil -> celularUsuario = $_POST["celularUsuario"];
  $editarPerfil -> correoUsuario = $_POST["correoUsuario"];
	$editarPerfil -> ajaxEditarPerfil();
}