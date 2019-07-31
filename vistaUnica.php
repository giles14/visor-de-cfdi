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
