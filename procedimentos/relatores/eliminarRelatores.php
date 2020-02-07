<?php 
require_once "../../classes/conexao.php";
require_once "../../classes/relatores.php";
$id = $_POST['idrelator'];
$obj = new relatores();
echo $obj->excluirRelator($id);
