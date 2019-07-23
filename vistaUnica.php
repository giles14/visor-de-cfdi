<?php include "class-factura.php";
if($_GET["archivo"]){
$facturaUsar = $_GET["archivo"];
  $facturaActual = facturaUnica($facturaUsar);
  //echo $facturaUsar;
}else{

}
  //print_r($facturaActual);
?>
<?php include 'header.php';?>
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
  <?php include 'footer.php';?>
