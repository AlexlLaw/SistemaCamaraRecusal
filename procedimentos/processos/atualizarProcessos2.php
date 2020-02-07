<?php
require_once "../../classes/conexao.php";
require_once "../../classes/processos2.php";
$obj = new processos2();
$dados = array(
    $_POST['idprocesso2U'],
    $_POST['nrofa2U'],
    $_POST['consumidor2U'],
    $_POST['fornecedor2U'],
    $_POST['relator2U'],
    $_POST['valor2U'],
    $_POST['valor_segU'],
    $_POST['data2U'],
    $_POST['ano2U'],
    $_POST['recurso2U'],
);
echo $obj->atualizar($dados);