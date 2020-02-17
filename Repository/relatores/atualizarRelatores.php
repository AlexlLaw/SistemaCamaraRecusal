<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/relatores.php";
$obj = new relatores();
$dado = array(
	$_POST['Rid_relator'],
	$_POST['RnomeU'],
	$_POST['RcpfU'],
	$_POST['RcamarasU']
);
echo $obj->atualizarRelator($dado);
