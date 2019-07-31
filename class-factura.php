<?php
//Solo para fines de desarrollo: quitar
ini_set('display_errors', 1);

$_ERRORS = array();

function ErrorHandler($errno, $errstr, $errfile, $errline) {
    global $_ERRORS;
    $_ERRORS[] = array("errno" => $errno, "errstr" => $errstr, "errfile" => $errfile, "errline" => $errline);
}

set_error_handler("ErrorHandler");

//$dir = $_SERVER['DOCUMENT_ROOT'].'/fl/emitidos';
$dir = __DIR__.'/emitidos';
$filesEmitidos = array_slice(scandir($dir), 2);
//$dirR = $_SERVER['DOCUMENT_ROOT'].'/fl/recibidos';
$dirR = __DIR__.'/recibidos';
$filesRecibidos = array_slice(scandir($dirR), 2);

global $iva;
global $total;

$contador = 0;
$subTotal = 0;
$iva = 0;
$total = 0;

//$argsEmitidos = array("listFiles" => $filesEmitidos);


function printEmitedTable($argsEmitidos){
  global $filesEmitidos;
  $listEmitidos = $filesEmitidos;

  $iva = 0;
  $subTotal = 0;
  $total = 0;

//$listEmitidos = $argsEmitidos["listFiles"];
//$styleCss = $argsEmitidos["cssClasses"];
$styleCss = $argsEmitidos;
echo '<table id="tabla" class="'.$styleCss.'">';
echo '<thead>';
echo '	<tr>';
echo '		<th>Fila</th>';
echo '		<th>RFC</th>';
echo '		<th class="hidden-1024">Receptor</th>';
echo '		<th class="hidden-350">Subtotal</th>';
echo '		<th class="hidden-480">IVA</th>';
echo '		<th>Total</th>';
echo '	</tr>';
echo '</thead>';

echo '<tbody>';
foreach($listEmitidos as $file){
		//print $file . '<br/>';
		$factura = new factura;
		$contador ++;

		$factura->readXml('emitidos/'.$file,$contador);
		$factura->printTr();
		$subTotal += $factura->returnSubTotal();
		$total += $factura->returnTotal();
		$iva += $factura->returnIva();

		}
	echo '</tbody>';
	echo '</table>';
  echo '</div>';
  echo '<div class="container-fluid">';
  echo '<div class="totales">';
  echo 'iva: '. $iva . '<br />';
  echo 'subtotal: '. $subTotal . '<br />';
  echo 'Total: ' . $total . '<br />';
  echo '</div>';
  echo '</div>';

}
function printReceivedTable($cssArgs){
  global $filesRecibidos;
  $listRecibidos = $filesRecibidos;

  $rfcs = array();
  $contador = 0;
  $subTotal = 0;
  $total = 0;
  $iva = 0;

//$listEmitidos = $argsEmitidos["listFiles"];
//$styleCss = $argsEmitidos["cssClasses"];
$styleCss = $cssArgs;
echo '<table id="tablaRecibidos" class="'. $styleCss .'">';
echo '<thead>';
echo '	<tr>';
echo '		<th>Fila</th>';
echo '		<th>RFC</th>';
echo '		<th class="hidden-1024">Emisor</th>';
echo '		<th class="hidden-350">Subtotal</th>';
echo '		<th class="hidden-480">IVA</th>';
echo '		<th>Total</th>';
echo '	</tr>';
echo '</thead>';

echo '<tbody>';

foreach($listRecibidos as $file){
    //print $file . '<br/>';
    $factura = new factura;
    $contador ++;

    $factura->readXml('recibidos/'.$file,$contador);
    $factura->printTrEmisor();
    $subTotal += $factura->returnSubTotal();
    $total += $factura->returnTotal();
    $iva += $factura->returnIva();

    //Obtener sumatoria por RFC
  $rfcs[] = array($factura->emisorRfc =>  $factura->total);

  }
  echo '</tbody>';
	echo '</table>';
  echo '</div>';
  echo '<div class="container-fluid">';
  echo '<div class="totales">';
  echo 'iva: '. $iva . '<br />';
  echo 'subtotal: '. $subTotal . '<br />';
  echo 'Total: ' . $total . '<br />';
  echo '</div>';
  echo '</div>';

}

//Función para inicializar la vista única de un CFDI :: Todo agregar $file (para saber que CFDI mostrar)
function facturaUnica($facturaName){
  $nombreFactura = $facturaName;
  $unica = new factura;
  $unica->readXml('emitidos/'.$nombreFactura,$contador);
  ?>
  <!-- <pre>
    <?php //print_r($unica);  ?>
  </pre> -->
  <?php
  return $unica;
}

class factura{
	  private $fileToRead;
	  private $xml;
    public $emisorRfc;
    public $emisorRazonSocial;
    public $regimenEmisor;
    public $receptorRfc;
    public $receptorRazonSocial;
    public $subTotal;
    public $total;
    public $Iva;
    public $contador;
    public $fechaEmision;
    public $folioFiscal;
    public $serieCertCSD;
    public $folioInterno;
    public $tipo;
    public $tipoImpuestos;
    public $impuestosTraslados;
    public $metodoPago;
    public $caracteristicasPago;
    public $selloDigitalCFDI;
    public $selloSat;
    public $cadenaComplementoSat;
    public $noSerteCertificadoSat;
    public $fechaTimbrado;
    public $usoCFDI;
    public $formaPago;
    public $archivoActual;

	public function readXml($fileToRead, $row)
	{
      $this->contador = $row;
  		$xml = simplexml_load_file($fileToRead);
  		$ns = $xml->getNamespaces(true);
  		$xml->registerXPathNamespace('c', $ns['cfdi']);
  		$xml->registerXPathNamespace('t', $ns['tfd']);
      $this->archivoActual = $fileToRead;
      $this->archivoActual = str_replace("emitidos/", "", $this->archivoActual);

        foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
            $this->subTotal = strval($cfdiComprobante['SubTotal']);
            $this->total = strval($cfdiComprobante['Total']);
            $this->metodoPago = strval($cfdiComprobante['MetodoPago']);
            $this->serieCertCSD = strval($cfdiComprobante['NoCertificado']);
            $this->tipo = strval($cfdiComprobante['TipoDeComprobante']);
            $this->fechaEmision = strval($cfdiComprobante['Fecha']);
            $this->selloSat = strval($cfdiComprobante['Sello']);
            $this->folioInterno = strval($cfdiComprobante['Folio']);
            $this->formaPago = strval($cfdiComprobante['FormaPago']);

        }


		foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
          $this->emisorRfc = strval($Emisor['Rfc']);
          $this->emisorRazonSocial = strval($Emisor['Nombre']);
          $this->regimenEmisor = strval($Emisor['RegimenFiscal']);

		}
        foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
           $this->Iva = strval($Traslado['Importe']);
        }
        foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
           $this->receptorRfc = strval($Receptor['Rfc']);
           $this->receptorRazonSocial = strval($Receptor['Nombre']);
           $this->usoCFDI = strval($Receptor['UsoCFDI']);
        }
        foreach ($xml->xpath('//cfdi:Comprobante//cfdi:complemento//tfd:timbrefiscaldigital') as $timbre){
           $this->folioFiscal = strval($timbre['UUID']);
        }
         // echo "<pre>";
         // var_dump($this);
         // echo "</pre>";
	}

    public function printTr()
    {

        echo '<tr>';
        echo '<td><a href="vistaUnica.php?archivo='.$this->archivoActual.'">' . $this->contador . '</a></td>';
        echo '<td>' . $this->receptorRfc . '</td>';
        echo '<td class="hidden-1024">' . $this->receptorRazonSocial . '</td>';
        echo '<td class="hidden-350"> $ ' . number_format($this->subTotal,2) . '</td>';
        echo '<td class="hidden-480"> $ ' . number_format($this->Iva,2) . '</td>';
        echo '<td> $ ' . number_format($this->total,2) . '</td>';
        echo '</tr>';

    }
    public function printTrEmisor()
    {
        echo '<tr>';
        echo '<td>' . $this->contador . '</td>';
        echo '<td>' . $this->emisorRfc . '</td>';
        echo '<td  class="hidden-1024">' . $this->emisorRazonSocial . '</td>';
        echo '<td class="hidden-350"> $ ' . number_format($this->subTotal,2) . '</td>';
        echo '<td class="hidden-480"> $ ' . number_format($this->Iva,2) . '</td>';
        echo '<td> $ ' . number_format($this->total,2) . '</td>';
        echo '</tr>';

    }

    public function singleView(){

    }

    public function returnSubTotal(){
        return $this->subTotal;
    }

    public function returnTotal(){
        return $this->total;
    }

    public function returnIva(){
        return $this->Iva;
    }

}
 function tableDiot($rfcs){
    echo '<table class="azul">';
    echo '<tr>';
    echo '<th>';
    echo 'RFC';
    echo '</th>';
    echo '<th>';
    echo 'Cantidad';
    echo '</th>';
    echo '</tr>';

    foreach($rfcs as $key => $value) {
        echo '<tr>';
            echo '<td>';
                echo "$key";
            echo '</td>';
            echo '<td>';
                echo "$value";
            echo '</td>';
        echo '</tr>';
        }
        echo '<tfoot>';
        echo '<tr>';
            echo '<td> Total';
            echo '</td>';
            echo '<td>';
                print_r(array_sum($rfcs));
            echo '</td>';
        echo '<tr>';
        echo '</tfoot>';

        echo '</table>';
     }


 ?>
