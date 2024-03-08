<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id=$_GET['id'];
function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

 $html=file_get_contents("http://localhost/pruebas/pdf/mostrar.php?id=".$id);


 
$pdf = new DOMPDF();
 
$pdf->set_paper("letter", "portrait");

$pdf->load_html(utf8_decode($html));
 
$pdf->render();

$pdf->stream('FicheroEjemplo.pdf');



