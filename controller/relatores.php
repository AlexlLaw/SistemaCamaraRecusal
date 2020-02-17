<?php 
class relatores{
	public function adicionarRelator($dados){
		$c = new conectar();
		$conexao=$c->conexao();
		$sql = "INSERT into relatores (nome,cpf,camara) VALUES (
			'$dados[0]', 
			'$dados[1]', 
		    '$dados[2]')";
		return mysqli_query($conexao, $sql);
	}
	public function obterDadosRelator($idrelator){
		$c = new conectar();
		$conexao=$c->conexao();
		$sql = "SELECT id_relator, nome, cpf from relatores where id_relator='$idrelator' ";
			$result = mysqli_query($conexao, $sql);
			$mostrar = mysqli_fetch_row($result);
			$dados = array(
				'id_relator' => $mostrar[0],
				'nome' => $mostrar[1],
				'cpf' => $mostrar[2],
				'camara' => $mostrar[3]
			);
			return $dados;
	}
	public function atualizarRelator($dados){
		$c = new conectar();
		$conexao=$c->conexao();
		$sql = "UPDATE relatores SET nome = '$dados[1]', cpf = '$dados[2]', camara = '$dados[3]' where id_relator = '$dados[0]'";
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