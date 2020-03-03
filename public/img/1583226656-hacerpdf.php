<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
ob_start();
  require_once 'pdf.php';
  $salida = ob_get_clean();

  $html2pdf = new Html2Pdf();
  $html2pdf->writeHTML($salida);
  $html2pdf->output("salida.pdf"); 
