<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php require "header.php" ?>
</head>
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
        include "modules/home-user.php";
      }
      echo '<footer>';
      include "footer.php";
      echo '</footer>';
      echo '</div>';
      echo '</div>';
    }
    else
    {
      include "login.php";
    }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../../js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="../../assets/demo/chart-area-demo.js"></script>
  <script src="../../assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="../../js/datatables-simple-demo.js"></script>
</body>
</html>