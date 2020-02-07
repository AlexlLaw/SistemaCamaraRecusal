<?php
require_once "../../classes/conexao.php";
require_once "../../classes/processos2.php";
$id = $_POST['idprocesso2'];
$obj = new processos2();
echo $obj->excluir($id);