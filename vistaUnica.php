<?php include "class-factura.php";
if($_GET["archivo"]){
$facturaUsar = $_GET["archivo"];
  $facturaActual = facturaUnica($facturaUsar);
  //echo $facturaUsar;
}else{

}
  //print_r($facturaActual);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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

    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-yqpd{border-color:#ffffff;text-align:left}
    .tg .tg-zv4m{border-color:#ffffff;text-align:left;vertical-align:top}
    .tg .tg-htd1{background-color:#efefef;border-color:#ffffff;text-align:left}
    .tg .tg-jax5{background-color:#c0c0c0;border-color:#ffffff;text-align:left}
    </style>

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
      <h1>CFDI Generado</h1>
      <table class="tg table table-hover table-sm">
        <tr>
          <td class="tg-htd1 bg-primary font-weight-bold text-white"><?php echo $facturaActual->emisorRazonSocial; ?></td>
          <td class="tg-htd1 bg-primary"></td>
          <td class="tg-htd1 bg-primary font-weight-bold text-white">Folio: <?php echo $facturaActual->folioInterno; ?></td>
        </tr>
        <tr>
          <td class="tg-yqpd font-weight-bold"><?php echo $facturaActual->emisorRfc; ?></td>
          <td class="tg-yqpd"></td>
          <td class="tg-yqpd font-weight-bold">Folio Fiscal: </td>
        </tr>
        <tr>
          <td class="tg-htd1">Régimen <?php echo $facturaActual->regimenEmisor; ?> - </td>
          <td class="tg-htd1"></td>
          <td class="tg-htd1">#Folio Fiscal</td>
        </tr>
        <tr>
          <td class="tg-yqpd font-weight-bold">Fecha de Emisión</td>
          <td class="tg-yqpd"></td>
          <td class="tg-yqpd font-weight-bold">NO. DE SERIE DEL CERTIFICADO DEL EMISOR</td>
        </tr>
        <tr>
          <td class="tg-htd1"><?php echo $facturaActual->fechaEmision; ?> </td>
          <td class="tg-htd1"></td>
          <td class="tg-htd1"><?php echo $facturaActual->serieCertCSD; ?></td>
        </tr>
        <tr>
          <td class="tg-yqpd" colspan="3"></td>
        </tr>
        <tr>
          <td class="bg-primary font-weight-bold text-white" colspan="3">Datos de Receptor</td>
        </tr>
        <tr>
          <td class="tg-zv4m font-weight-bold"><?php echo $facturaActual->receptorRazonSocial; ?></td>
          <td class="tg-zv4m"></td>
          <td class="tg-zv4m font-weight-bold"><?php echo $facturaActual->receptorRfc; ?></td>
        </tr>
      </table>
    </div>
  </body>
</html>
