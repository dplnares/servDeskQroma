<?php 

//  Controllers
require "controller/plantilla.controller.php";
require "controller/usuarios.controller.php";

//  Models
require "model/usuarios.model.php";

$plantilla = new ControllerPlantilla();
$plantilla -> ctrPlantilla();