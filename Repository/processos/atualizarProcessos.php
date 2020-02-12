<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/processos.php";
$obj = new processos();
$dados = array(
    $_POST['idprocessoU'],
    $_POST['nrofaU'],
    $_POST['consumidorU'],
    $_POST['fornecedorU'],
    $_POST['relatorU'],
    $_POST['ValorGrau_1U'],
    $_POST['ValorGrau_2U'],
    $_POST['data_jugamentoU'],
    $_POST['anoU'],
    $_POST['recursoU']
);
echo $obj->atualizar($dados);