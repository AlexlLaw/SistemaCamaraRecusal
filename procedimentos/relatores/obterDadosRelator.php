<?php 
require_once "../../classes/conexao.php";
require_once "../../classes/relatores.php";
$obj = new relatores();
echo json_encode($obj->obterDadosRelator($_POST['idrelator']));