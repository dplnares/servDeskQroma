<?php

require_once "../controller/tickets.controller.php";
require_once "../model/tickets.model.php";

class AjaxTickets
{
  //  Editar Usuario
  public $codTicket;
  public function ajaxEditarTicket()
  {
    $codTicket = $this->codTicket;
    $respuesta = ControllerTickets::ctrMostrarDatosTicket($codTicket);
    echo json_encode($respuesta);
  }
}

//  Mostrar datos para editar Ticket
if(isset($_POST["codTicket"])){
	$editar = new AjaxTickets();
	$editar -> codTicket = $_POST["codTicket"];
	$editar -> ajaxEditarTicket();
}