<?php
session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/processos2.php";
$idusuario = $_SESSION['iduser'];
$obj = new processos2();
$dados = array(
    $idusuario,
    $_POST['nrofa2'],
    $_POST['consumidor2'],
    $_POST['fornecedor2'],
    $_POST['relator2'],
    $_POST['valor2'],
    $_POST['valor_seg'],
    $_POST['data2'],
    $_POST['ano2'],
    $_POST['recurso2'],

);
echo $obj->adicionar($dados);
