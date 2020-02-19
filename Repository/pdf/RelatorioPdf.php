<?php
session_start();
require_once 'dompdf/autoload.inc.php';
$filtro = $_GET['filtr'];
$filtro1 = $_GET['filtr1'];
$cam = $_GET['cam'];
// referenciando o namespace do dompdf

use Dompdf\Dompdf;

// instanciando o dompdf

$dompdf = new Dompdf();

//lendo o arquivo HTML correspondente

$html = file_get_contents('http://localhost/SistemaCamaraRecusal/view/processos/relatorioProcessosJaneiroPdf.php?filtr=' . $filtro . '&filtr1=' . $filtro1.'&cam=<'. $cam);

//inserindo o HTML que queremos converter

$dompdf->loadHtml($html);

// Definindo o papel e a orientação

$dompdf->setPaper('A4', 'landscape');

// Renderizando o HTML como PDF

$dompdf->render();

// Enviando o PDF para o browser

$dompdf->stream();
