//  Boton atender ticket pendiente
$(".table").on("click", ".btnAtenderTicket", function(){
  var codTicket = $(this).attr("codTicket");
   if(codTicket!=null)
   {
    window.location = "index.php?ruta=atenderpendiente&codTicket="+codTicket;
   }
 })