<?php 
require_once "../../classes/conexao.php";
require_once "../../classes/relatores.php";
$obj = new relatores();
$dados=array(
	$_POST['idrelatorU'],
	$_POST['nomeU'],
	$_POST['sobrenomeU'],
	$_POST['enderecoU'],
	$_POST['emailU'],
	$_POST['telefoneU'],
	$_POST['cpfU']
);
echo $obj->atualizarRelator($dados);
