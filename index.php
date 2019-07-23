<?php include "class-factura.php" ?>
<?php include 'header.php';?>
<!-- the <body> tag is on header -->
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
    <div class="container-fluid">
      <h1>Recibidos</h1>
      <?php
      $factura->tableDiot();
      ?>

    </div>

  <?php include 'footer.php';?>
