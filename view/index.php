<?php
require_once "../conexao/conexao.php";
$obj = new conectar();
$conexao = $obj->conexao();
$sql = "SELECT * from usuarios where email='admin'";
$result = mysqli_query($conexao, $sql);
$validar = 0;
	if(mysqli_num_rows($result) > 0){
		$validar = 1;
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SB Admin - Login</title>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header"> <img src="img/logoProcon.png" width="100px" height="70px" class="rounded mx-auto d-block" alt=""></div>
			<div class="card-body">
				<form id="frmLogin">
					<label>Email</label>
					<input type="text" class="form-control " name="email" id="email">
					<label>Senha</label>
					<input type="password" name="senha" id="senha" class="form-control">
					<p></p>
					<span class="btn btn-primary " id="entrarSistema">Entrar</span>
					<?php if(!$validar): 
					?>
				
					<?php 	endif; ?>
				</form>
			
			</div>
		</div>
	</div>
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function() {
			$('#entrarSistema').click(function() {
				vazios = validarFormVazio('frmLogin');
				
				if (vazios < 0) {
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
</body>

</html>