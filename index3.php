<?php
require_once "classes/conexao.php";
$obj = new conectar();
$conexao = $obj->conexao();
$sql = "SELECT * from usuarios where email='admin'";
$result = mysqli_query($conexao, $sql);
$validar = 0;
if (mysqli_num_rows($result) > 0) {
	$validar = 1;
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
</head>

<body class="bg-primary">
	<form id="frmLogin">
		<label>Email</label>
		<input type="text" class="form-control " name="email" id="email">
		<label>Senha</label>
		<input type="password" name="senha" id="senha" class="form-control ">
		<p></p>
		<span class="btn btn-primary " id="entrarSistema">Entrar</span>
		<?php if (!$validar) : ?>
			<a href="registrar.php" class="btn btn-danger ">Registrar</a>
		<?php endif; ?>
	</form>
</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
		$('#entrarSistema').click(function() {
			vazios = validarFormVazio('frmLogin');
			if (vazios > 0) {
				alert("Preencha os campos!!");
				return false;
			}
			dados = $('#frmLogin').serialize();
			$.ajax({
				type: "POST",
				data: dados,
				url: "procedimentos/login/login.php",
				success: function(r) {
					//alert(r);
					if (r == 1) {
						window.location = "view/inicio.php";
					} else {
						alert("Acesso Negado!!");
					}
				}
			});
		});
	});
</script>