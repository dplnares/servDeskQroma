
<!-- Home de cada usuario -->
<div class="sb-sidenav-menu-heading">Inicio</div>
<a class="nav-link" href="home">
  <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
  Dashboard
</a>
<!-- Administrar usuarios, solo para usuario tipo administrador -->
<?php
  if($_SESSION["perfilUsuario"]=="1")
  {
?>
  <div class="sb-sidenav-menu-heading">Usuarios</div>
  <a class="nav-link" href="usuarios">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Administrar Usuarios
  </a>
<?php
}
?>
<!-- Home de cada usuario -->
<div class="sb-sidenav-menu-heading">Tickets</div>
<a class="nav-link" href="tickets">
  <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
  Tickets
</a>
<?php
  if($_SESSION["perfilUsuario"]=="1")
  {
?>
  <a class="nav-link" href="asignaciones">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Asignaciones
  </a>
<?php
}
?>

<?php
  if($_SESSION["perfilUsuario"]=="3" || $_SESSION["perfilUsuario"]=="1")
  {
?>
  <a class="nav-link" href="pendientes">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Pendientes
  </a>
<?php
}
?>

<?php
  if($_SESSION["perfilUsuario"]=="3" || $_SESSION["perfilUsuario"]=="1" )
  {
?>
  <a class="nav-link" href="revisiones">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Revisiones
  </a>
<?php
}
?>
<!-- <div class="sb-sidenav-menu-heading">Tickets</div>
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
  <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
  Layouts
  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
  <nav class="sb-sidenav-menu-nested nav">
    <a class="nav-link" href="layout-static.html">Static Navigation</a>
    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
  </nav>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
  <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
  Pages
  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
  <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
      Authentication
      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
      <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="login.html">Login</a>
        <a class="nav-link" href="register.html">Register</a>
        <a class="nav-link" href="password.html">Forgot Password</a>
      </nav>
    </div>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
      Error
      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
      <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="401.html">401 Page</a>
        <a class="nav-link" href="404.html">404 Page</a>
        <a class="nav-link" href="500.html">500 Page</a>
      </nav>
    </div>
  </nav>
</div>
<div class="sb-sidenav-menu-heading">Addons</div>
<a class="nav-link" href="charts.html">
  <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
  Charts
</a>
<a class="nav-link" href="tables.html">
  <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
  Tables
</a>
</div> -->