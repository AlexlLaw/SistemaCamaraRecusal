<?php 
require_once "../../conexao/conexao.php";
require_once "../../controller/usuarios.php";
$obj = new usuarios();
$senha = sha1($_POST['senha']);
$dados=array(
	$_POST['nome'],
	$_POST['usuario'],
	$_POST['email'],
	$_POST['camara'],
	$senha
);
echo $obj->registroUsuario($dados);