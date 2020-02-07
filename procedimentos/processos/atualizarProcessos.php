<?php

require_once "../../classes/conexao.php";
require_once "../../classes/processos.php";

$obj = new processos();

$dados = array(
    $_POST['idprocessoU'],
    $_POST['nrofaU'],
    $_POST['consumidorU'],
    $_POST['fornecedorU'],
    $_POST['ValorGrau_1U'],
    $_POST['ValorGrau_2U'],
    $_POST['recursoU'],
    $_POST['relatorU'],
    $_POST['data_jugamentoU'],
    $_POST['anoU'];
   

);

echo $obj->atualizar($dados);