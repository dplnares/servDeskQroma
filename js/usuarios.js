//  Mostrar los datos en el modal para editar
$(".table").on("click", ".btnEditarUsuario", function () {
  var codUsuario = $(this).attr("codUsuario");
  var datos = new FormData();

  datos.append("codUsuario", codUsuario);
  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    //  Ver la forma de pasar el nombre del perfil y del área a una opción del select
    success: function (respuesta) {
      $("#editarNombre").val(respuesta["NombreUsuario"]);
      $("#editarCorreo").val(respuesta["CorreoUsuario"]);
      $("#editarPerfil").val(respuesta["NombrePerfil"]);
      $("#editarArea").val(respuesta["NombreArea"]);
      $("#codUsuario").val(respuesta["CodUsuario"]);
    }
  });
});

//  Alerta para eliminar un usuario
$(".table").on("click", ".btnEliminarUsuario", function () {
  var codUsuario = $(this).attr("codUsuario");

  swal.fire({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡No podrá revertir el cambio!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar usuario!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php?ruta=usuarios&codUsuario="+codUsuario;
    }
  });
});

//  Alerta para modificar los datos del perfil
$(".datosPerfil").on("click", ".btnGuardarCambiosPerfil", function () {


  swal.fire({
    title: '¿Está seguro de modificar los datos?',
    text: "Si no lo está, puede cancelar esta acción",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, modificar datos!'
  }).then((result) => {
    var codUsuario = $("#codUsuario").val();
    var nombreUsuario = $("#nombreUsuario").val();
    var apellidoUsuario = $("#apellidoUsuario").val();
    var celularUsuario = $("#celularUsuario").val();
    var correoUsuario = $("#correoUsuario").val();

    var datos = new FormData();
    datos.append("codUsuarioPerfil", codUsuario);
    datos.append("nombreUsuario", nombreUsuario);
    datos.append("apellidoUsuario", apellidoUsuario);
    datos.append("celularUsuario", celularUsuario);
    datos.append("correoUsuario", correoUsuario);
    $.ajax({
      url: "ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",

      success: function (respuesta) {
        if(devolver["respuesta"]=="ok")
        {
          swal("Hecho",
          "¡Datos actualizados correctamente!",
          "success");
          location.reload(true);
        }
        else
        {
          swal("Error",
          "¡Error al actualizar los datos!",
          "error");
        }
      }
    });
  });
});
