<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<title>usuarios</title>
	
</head>
<link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../lib/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="../../lib/css/menu.css">
<script src="../../lib/jquery-3.2.1.min.js"></script>
<script src="../../lib/alertifyjs/alertify.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.js"></script>
<script src="../../lib/select2/js/select2.js"></script>
<script src="../../js/funcoes.js"></script>
    </head>

    <body>
    <div class="container">
    <div id="nav">
        <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <img src="../img/marca_procon.jpg" width="100px" height="70px" class="d-inline-block align-top" alt="">
                    <ul class="nav navbar-nav navbar-right">
                        <!--deixa os ícones do menu posicionados à direita -->
                        <li class="active"><a href="../inicio.php"><span class="glyphicon glyphicon-home"></span>
                                Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Consultas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://procon.pb.gov.br/camararecursal/decisoes">Decisões Proferidas</a>
                                </li>
                                <li><a href="http://procon.pb.gov.br/camararecursal/pautas">Pautas das Câmaras
                                        Recursais</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href="../sobre.php"><span class="glyphicon glyphicon-home"></span>
                                Sobre</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" style="color: red" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
                                Usuario: <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php //if ($_SESSION['usuario'] == "admin") : ?>
                                    <li> <a href="usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão
                                            Usuários</a></li>
                                <?php // endif; ?>
                                <li> <a style="color: red" href=""><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.contatiner -->
        </div>
    </div>
	<br>
	<br>
	<br>


	<div class="container">
		<h1>Administrar Usuários</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="frmRegistro">
					<label>Nome </label>
					<input type="text" class="form-control input-sm" name="nome" id="nome">
					<label>Usuário </label>
					<input type="text" class="form-control input-sm" name="usuario" id="usuario">
					<label>Email </label>
					<input type="text" class="form-control input-sm" name="email" id="email">
					<label>Senha </label>
					<input type="text" class="form-control input-sm" name="senha" id="senha">
					<p></p>
					<label>Permissões </label>
					<select class="form-control">
						<option>...</option>
						<option name="permissao" value="adm">Administrador</option>
						<option name="permissao" value="usuario">Usuario</option>
					</select>
					<br>
					<span class="btn btn-primary" id="registro">Salvar</span>

				</form>
			</div>
			<div class="col-sm-7">
				<div id="tabelaUsuariosLoad"></div>
			</div>
		</div>
	</div>
	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="atualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
				</div>
				<div class="modal-body">
					<form id="frmRegistroU">
						<input type="text" hidden="" id="idUsuario" name="idUsuario">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" name="nomeU" id="nomeU">
						<label>Usuário</label>
						<input type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">
						<label>Email</label>
						<input type="text" class="form-control input-sm" name="emailU" id="emailU">
					</form>
				</div>
				<div class="modal-footer">
					<button id="btnAtualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Editar</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<script type="text/javascript">
	function adicionarDados(idusuario) {
		$.ajax({
			type: "POST",
			data: "idusuario=" + idusuario,
			url: "../../Repository/usuarios/obterDados.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
				$('#idUsuario').val(dado['id']);
				$('#nomeU').val(dado['nome']);
				$('#usuarioU').val(dado['user']);
				$('#emailU').val(dado['email']);
			}
		});
	}

	function eliminarUsuario(idusuario) {
		alertify.confirm('Deseja excluir este usuario?', function() {
			$.ajax({
				type: "POST",
				data: "idusuario=" + idusuario,
				url: "../../Repository/usuarios/eliminarUsuario.php",
				success: function(r) {
					if (r == 1) {
						$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
						alertify.success("Excluido com sucesso!!");
					} else {
						alertify.error("Não excluido :(");
					}
				}
			});
		}, function() {
			alertify.error('Cancelado !')
		});
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#btnAtualizaUsuario').click(function() {
			datos = $('#frmRegistroU').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "../../Repository/usuarios/atualizarUsuario.php",
				success: function(r) {
					if (r == 1) {
						$('#tabelaUsuariosLoad').load('../usuarios/tabelaUsuarios.php');
						alertify.success("Editado com sucesso :D");
					} else {
						alertify.error("Não foi possível editar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabelaUsuariosLoad').load('../usuarios/tabelaUsuarios.php');
		$('#registro').click(function() {
			vazios = validarFormVazio('frmRegistro');
			if (vazios > 0) {
				alertify.alert("Preencha os campos!!");
				return false;
			}
			datos = $('#frmRegistro').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "../../Repository/login/registrarUsuario.php",
				success: function(r) {
					if (r == 1) {
						$('#frmRegistro')[0].reset();
						$('#tabelaUsuariosLoad').load('../usuarios/tabelaUsuarios.php');
						alertify.success("Adicionado com sucesso");
					} else {
						alertify.error("Falha ao adicionar :(");
					}
				}
			});
		});
	});
</script>
<?php/*
}else{
	header("location:../index.php");
}*/
?>