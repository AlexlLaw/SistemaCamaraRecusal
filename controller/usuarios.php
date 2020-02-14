<?php
class usuarios
{
	public function registroUsuario($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$data = date('Y-m-d');
		$sql = "INSERT into usuarios (nome, usuario, email, senha, camara, dataCaptura) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]','$dados[4]', '$data')";
		return mysqli_query($conexao, $sql);
	}
	public function login($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$senha = sha1($dados[1]);
		$_SESSION['usuario'] = $dados[0];
		$_SESSION['iduser'] = self::trazerId($dados);
		$sql = "SELECT * from usuarios where email = '$dados[0]' and senha = '$senha' ";
		$result = mysqli_query($conexao, $sql);
		if (mysqli_num_rows($result) > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	public function trazerId($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$senha = sha1($dados[1]);
		$sql = "SELECT id from usuarios where email='$dados[0]' and senha = '$senha' ";
		$result = mysqli_query($conexao, $sql);
		return mysqli_fetch_row($result)[0];
	}
	public function obterDados($idusuario)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$sql = "SELECT id,nome,usuario,email,camara  from usuarios where id='$idusuario'";
		$result = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($result);
		$dados = array(
			'id' => $mostrar[0],
			'nome' => $mostrar[1],
			'usuario' => $mostrar[2],
			'email' => $mostrar[3],
			'camara' => $mostrar[4]
		);
		return $dados;
	}
	public function atualizar($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$sql = "UPDATE usuarios set nome='$dados[1]',usuario='$dados[2]',email='$dados[3]' where id='$dados[0]'";
		return mysqli_query($conexao, $sql);
	}
	public function excluir($idusuario)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$sql = "DELETE from usuarios where id='$idusuario'";
		return mysqli_query($conexao, $sql);
	}
}
