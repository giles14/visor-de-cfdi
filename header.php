<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap -->

    <!-- TableTools.css -->
    <link rel="stylesheet" href="css/plugins/datatable/TableTools.css">

    <!-- Tema CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">

    <title>Visor Automático de CFDI</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>



    <!-- carga de plupload y estilos  -->
    <link rel="stylesheet" href="js/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/plupload.full.min.js"></script>
    <script type="text/javascript" src="js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
    <script type="text/javascript" src="js/i18n/es.js"></script>

  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg  navbar-custom">
      <a class="navbar-brand" href="#">Visor automático de CFDI's</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Visor <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="subir-cfdi.php">Subir CFDI's</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Categorías</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Opciones
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Privacidad</a>
              <a class="dropdown-item" href="#">Cuenta</a>
              <a class="dropdown-item" href="#">Otra opción</a>
            </div>
          </li>
        </ul>
        <span class="ml-auto navbar-text">Ver 0.1</span>
      </div>
    </nav>
    <?php // echo $_SERVER['DOCUMENT_ROOT']; ?>
    <?php //echo __DIR__ ?>
