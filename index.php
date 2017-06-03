<?php

require __DIR__ . '/vendor/autoload.php';

class_exists('TCPDF', true); // trigger Composers autoloader to load the TCPDF class
$pdf = new FPDI();


$page = $pdf->setSourceFile("./hoge_1.pdf");

foreach(range(1,$page) as $i){
  $write_pdf = new FPDI();
  $write_pdf->setSourceFile("./hoge_1.pdf");
  $info = $write_pdf->importPage($i);
  $write_pdf->addPage();
  $write_pdf->useTemplate($info);
  $write_pdf->Output("hoge2_". $i . ".pdf","F");
}

