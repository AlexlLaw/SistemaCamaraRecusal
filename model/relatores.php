<?php 
class relatores{
	public function adicionarRelator($dados){
		$c = new conectar();
		$conexao=$c->conexao();
		$sql = "INSERT into relatores (id_relator, ,id_usuario,nome,sobrenome, endereco, email, telefone, cpf) VALUES (
			'$dados[0]', 
			'$dados[1]', 
		    '$dados[2]',
		    '$dados[3]',
			'$dados[4]',
			'$dados[5]',
			'$dados[6]',
			'$dados[7]')";
		return mysqli_query($conexao, $sql);
	}
	public function obterDadosRelator($idrelator){
		$c = new conectar();
		$conexao=$c->conexao();
		$sql = "SELECT id_relator, nome, sobrenome, endereco, email, telefone, cpf from relatores where id_relator='$idrelator' ";
			$result = mysqli_query($conexao, $sql);
			$mostrar = mysqli_fetch_row($result);
			$dados = array(
				'id_relator' => $mostrar[0],
				'nome' => $mostrar[1],
				'sobrenome' => $mostrar[2],
				'endereco' => $mostrar[3],
				'email' => $mostrar[4],
				'telefone' => $mostrar[5],
				'cpf' => $mostrar[6],
			);
			return $dados;
	}
	public function atualizarRelator($dados){
		$c = new conectar();
		$conexao=$c->conexao();
		$sql = "UPDATE relatores SET nome = '$dados[1]', sobrenome = '$dados[2]',endereco = '$dados[3]',email = '$dados[4]',telefone = '$dados[5]',cpf = '$dados[6]' where id_cliente = '$dados[0]'";
		echo mysqli_query($conexao, $sql);
	}
	public function excluirRelator($id){
		$c = new conectar();
		$conexao=$c->conexao();
		$sql = "DELETE from relatores where id_relator = '$id' ";
		return mysqli_query($conexao, $sql);
	}
}
?>