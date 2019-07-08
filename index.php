<?php include "class-factura.php" ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap -->

    <link rel="stylesheet" href="css/plugins/datatable/TableTools.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">



    <title>Visor Automático de CFDI</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg  navbar-custom">
      <a class="navbar-brand" href="#">Visor automático de CFDI's</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Visor <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Subir CFDI's</a>
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
    <div class="container-fluid">
      <h1>Tablas</h1>
      <?php
      //$argsEmitidos["cssClasses"] = "table table-bordered table-hover table-nomargin table-striped dataTable dataTable-colreorder";
      printEmitedTable("table table-bordered table-hover table-nomargin table-striped dataTable dataTable-colreorder");
      ?>

    </div>
    <div class="container-fluid">
      <h1>Recibidos</h1>
      <?php
      //$argsEmitidos["cssClasses"] = "table table-bordered table-hover table-nomargin table-striped dataTable dataTable-colreorder";
      printReceivedTable("table data table-bordered table-hover table-nomargin table-striped dataTable dataTable-colreorder");
      ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
    $.extend( true, $.fn.dataTable.defaults, {
    "searching": true,
    "ordering": true,

    } );
    $(document).ready( function () {
    $('table.dataTable').DataTable({
      "language": {
            "lengthMenu": "Mostrando _MENU_ filas por página",
            "zeroRecords": "No hay datos para mostrar - disculpa",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin datos",
            "infoFiltered": "(Filtrado de _MAX_ total de registros)"
      },
      /*stateSave: true,*/
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
      "pageLength": 50

    });
    } );
    </script>

  </body>
</html>
