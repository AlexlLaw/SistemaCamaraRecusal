<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/usuarios.php";
$obj = new usuarios;
$dados = array(
	$_POST['idUsuario'],
	$_POST['nomeU'],
	$_POST['usuarioU'],
	$_POST['emailU'],
	$_POST['senhaU'],
	$_POST['camarasU']
);
echo $obj->atualizar($dados);