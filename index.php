<?php 

//  Controllers
require_once "controller/plantilla.controller.php";
require_once "controller/usuarios.controller.php";
require_once "controller/tickets.controller.php";
require_once "controller/categorias.controller.php";
require_once "controller/pendientes.controller.php";

//  Models
require_once "model/usuarios.model.php";
require_once "model/tickets.model.php";
require_once "model/categorias.model.php";
require_once "model/pendientes.model.php";

$plantilla = new ControllerPlantilla();
$plantilla -> ctrPlantilla();