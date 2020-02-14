<?php
session_start();
if (isset($_SESSION['usuario'])) { ?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>clientes</title>
	
	</head>

	<link rel="stylesheet" type="text/css" href="../lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../lib/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="../lib/css/menu.css">
<script src="../lib/jquery-3.2.1.min.js"></script>
<script src="../lib/alertifyjs/alertify.js"></script>
<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script src="../lib/select2/js/select2.js"></script>
<script src="../js/funcoes.js"></script>
    </head>

    <body>

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
                        <li><a href="../view/sobre.php"><span class="glyphicon glyphicon-home"></span>
                                Sobre</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" style="color: red" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
                                Usuario: <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php //if ($_SESSION['usuario'] == "admin") : ?>
                                    <li> <a href="usuarios/usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão
                                            Usuários</a></li>
                                <?php // endif; ?>
                                <li> <a style="color: red" href="../procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.contatiner -->
        </div>
    </div>


<br><br><br><br>

		<div class="container">
			<h1>Relatores</h1>
			<div class="row">
				<div class="col-sm-10">
					<div id="tabelaClientesLoad"></div>
				</div>
			</div>
		</div>
		<!-- Button trigger modal -->
		<!-- Modal -->
		<div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Atualizar cliente</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesU">
							<input type="text" hidden="" id="idclienteU" name="idclienteU">
							<label>Nome</label>
							<input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
							<label>Sobrenome</label>
							<input type="text" class="form-control input-sm" id="sobrenomeU" name="sobrenomeU">
							<label>Endereço</label>
							<input type="text" class="form-control input-sm" id="enderecoU" name="enderecoU">
							<label>Email</label>
							<input type="text" class="form-control input-sm" id="emailU" name="emailU">
							<label>Telefone</label>
							<input type="text" class="form-control input-sm" id="telefoneU" name="telefoneU">
							<label>CPF</label>
							<input type="text" class="form-control input-sm" id="cpfU" name="cpfU">
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAdicionarClienteU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>
						<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
							<caption><label>Total por Relator</label></caption>
							<tr>
								<td>Demetrius</td>
								<td>Edson</td>
								<td>Filipe</td>
								<td>Meriene</td>
								<td>Cyro</td>
								<td>Juliana</td>
								<td>Sérgio</td>
								<td>Fernando</td>
								<td>Rogério</td>
								<td>Cláudio</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>
	<script type="text/javascript">
		function adicionarDado(idcliente) {
			$.ajax({
				type: "POST",
				data: "idcliente=" + idcliente,
				url: "../procedimentos/clientes/obterDadosCliente.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					$('#idclienteU').val(dado['id_cliente']);
					$('#nomeU').val(dado['nome']);
					$('#sobrenomeU').val(dado['sobrenome']);
					$('#enderecoU').val(dado['endereco']);
					$('#emailU').val(dado['email']);
					$('#telefoneU').val(dado['telefone']);
					$('#cpfU').val(dado['cpf']);
				}
			});
		}

		function eliminarCliente(idcliente) {
			alertify.confirm('Deseja Excluir este cliente?', function() {
				$.ajax({
					type: "POST",
					data: "idcliente=" + idcliente,
					url: "../procedimentos/clientes/eliminarClientes.php",
					success: function(r) {
						if (r == 1) {
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
							alertify.success("Excluido com sucesso!!");
						} else {
							alertify.error("Não foi possível excluir");
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
			$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
			$('#btnAdicionarCliente').click(function() {
				vazios = validarFormVazio('frmClientes');
				if (vazios > 0) {
					alertify.alert("Preencha os Campos!!");
					return false;
				}
				dados = $('#frmClientes').serialize();
				$.ajax({
					type: "POST",
					data: dados,
					url: "../procedimentos/clientes/adicionarClientes.php",
					success: function(r) {

						if (r == 1) {
							$('#frmClientes')[0].reset();
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
							alertify.success("Cliente Adicionado");
						} else {
							alertify.error("Não foi possível adicionar");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#btnAdicionarClienteU').click(function() {
				dados = $('#frmClientesU').serialize();
				$.ajax({
					type: "POST",
					data: dados,
					url: "../procedimentos/clientes/atualizarClientes.php",
					success: function(r) {
						if (r == 1) {
							$('#frmClientes')[0].reset();
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
							alertify.success("Cliente atualizado com sucesso!");
						} else {
							alertify.error("Não foi possível atualizar cliente");
						}
					}
				});
			})
		})
	</script>
<?php
} else {
	header("location:../index.php");
}
?>