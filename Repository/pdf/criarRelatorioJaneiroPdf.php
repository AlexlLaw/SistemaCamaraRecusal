<?php
require_once("../../lib/dompdf");
use Dompdf\Dompdf;
$id = $_GET['idprocesso'];
/*function file_get_contents_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $dados = curl_exec($ch);
    curl_close($ch);
    return $dados;
}*/

$dompdf = new DOMPDF();

/* Carrega seu HTML */
$dompdf->load_html('<p>Adicione seu HTML aqui.</p>');

/* Renderiza */
$dompdf->render();

/* Exibe */
$dompdf->stream(
    "saida.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
?>