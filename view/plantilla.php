<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Desk Qroma</title>
  <link href="../css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
    if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok")
    {
      echo '<div class="wrapper">';

      include "modules/cabezote.php";
      include "modules/menu.php";

      if(isset($_GET["ruta"]))
      {
        if($_GET["rute"] == "home-user" ||
        $_GET["rute"] == "salir")
        {
          include "modules/".$_GET["rute"].".php";
        }
        else
        {
          include "web/404.html";
        }
      }
      else
      {
        include "modules/home-use.php";
      }
      include "modules/footer.php";
      echo '</div>';
    }
    else
    {
      include "modules/login.php";
    }
  ?>

  <!-- AGREGAR TODOS LOS ARCHIVOS JS QUE PUEDA NECESITAR -->
</body>
</html>