//  Mostrar los datos en el modal para poder editar el ticket
$(".table").on("click", ".btnEditarTicket", function () {
  var codTicket = $(this).attr("codTicket");
  var datos = new FormData();

  datos.append("codTicket", codTicket);
  $.ajax({
    url: "ajax/tickets.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    //  Ver la forma de pasar el nombre del perfil y del área a una opción del select
    success: function (respuesta) {
      $("#editarTitulo").val(respuesta["TituloTicket"]);
      $("#editarCategoria").val(respuesta["NombreCategoria"]);
      $("#editarDescripcion").val(respuesta["DescripcionTicket"]);
      $("#codTicket").val(respuesta["CodTicket"]);
    }
  });
});

//  Alerta para eliminar un ticket en específico
$(".table").on("click", ".btnEliminarTicket", function () {
  var codTicket = $(this).attr("codTicket");

  swal.fire({
    title: '¿Está seguro de borrar el ticket?',
    text: "¡No podrá revertir el cambio!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar ticket!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php?ruta=tickets&codTicket="+codTicket;
    }
  });
});

//  Mostrar los datos en el modal para poder asignar un ticket
$(".table").on("click", ".btnAsignarTicket", function () {
  var codTicket = $(this).attr("codTicket");
  var datos = new FormData();

  datos.append("codTicket", codTicket);
  $.ajax({
    url: "ajax/tickets.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    //  Ver la forma de pasar el nombre del perfil y del área a una opción del select
    success: function (respuesta) {
      $("#asignarTitulo").val(respuesta["TituloTicket"]);
      $("#asignarCategoria").val(respuesta["NombreCategoria"]);
      $("#asignarDescripcion").val(respuesta["DescripcionTicket"]);
      $("#codTicket").val(respuesta["CodTicket"]);
    }
  });
});