<?php
session_start();
require_once "../../conexao/conexao.php;"
require_once "../../model/processos.php";
$idusuario = $_SESSION['iduser'];
$obj = new processos();
$dados = array(
    $idusuario,
    $_POST['nrofa'],
    $_POST['consumidor'],
    $_POST['fornecedor'],
    $_POST['relator'],
    $_POST['ValorGrau_1'],
    $_POST['valorGrau_2'],
    $_POST['data_jugamento'],
    $_POST['ano'],
    $_POST['recurso']
);
echo $obj->adicionar($dados);
