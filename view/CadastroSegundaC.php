<?php

session_start();
if (isset($_SESSION['usuario'])) {
?>
    <!--verificação para saber se existe usuário logado-->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Processos Janeiro</title>
        <?php require_once "menu.php"; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>

    <body>
        <div class="container">
            <h1>Processos</h1>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmProcessos">
                        <label>N° FA</label>
                        <input type="text" class="form-control input-sm" id="nrofa" name="nrofa">
                        <label>Consumidor</label>
                        <input type="text" class="form-control input-sm" id="consumidor" name="consumidor">
                        <label>Fornecedor</label>
                        <input type="text" class="form-control input-sm" id="fornecedor" name="fornecedor">
                        <label>Valor do 1 º Grau</label>
                        <input type=" text " class="form-control input-sm" id="valor" name="valor">
                        <label> Valor do 2º Grau</label>
                        <input type="text" class="form-control input-sm" id="valor_2" name="valor_2">
                        <label>Recurso</label>
                        <select class="form-control input-sm" id="recurso" name="recurso">
                            <option>Tempestivo </option>
                            <option> Intempestivo </option>
                        </select>
                        <label>Relatores</label>
                        <select class="form-control input-sm" id="relator" name="relator">
                            <option>-----</option>
                            <option>Demetrius</option>
                            <option>Edson</option>
                            <option>Filipe</option>
                            <option>Emannuel</option>
                            <option>Cyro</option>
                            <option>Juliana</option>
                            <option>Sérgio</option>
                            <option>Fernando</option>
                            <option>Rogério</option>
                            <option>Cláudio</option>
                        </select>
                        <label>Data De Julgamento</label>
                        <input type="date" class="form-control input-sm" id="data" name="data">
                        <label>Ano</label>
                        <input type="number" class="form-control input-sm" id="ano" name="ano">
                        <p></p>
                        <!-- essa span é onde está o botão salvar. Ao ser clicado será acionado o id btnAdicionarFornecedores -->
                        <span class="btn btn-primary" id="buscar">Salvar</span>
                        <a type="button" class="btn btn-danger" href="inicio.php">voltar</a>
                    </form>
                </div>
                <!--div que carrega do lado direito da página e recebe os valores digitados do lado esquerdo. Note que uma tem col-sm-4 e a outra col-sm-8, o que soma 12-->
                <div class="col-sm-8">
                    <form method="POST">
                        <label>De :</label>
                        <input type="date" class="form-control" name="filtr" id="filtro1" style="width:155px;">
                        <label>Até :</label>
                        <input type="date" class="form-control" name="filtr1" id="filtro2" style="width:155px;">
                        <br>
                        <input type="submit" value="filtrar" id="busca" class="btn btn-success">
                    </form>
                    <div id="table">
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="abremodalProcessosUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Atualizar Fornecedor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmProcessosU">
                            <input type="text" hidden="" id="idprocessoU" name="idprocessoU">
                            <label>nroFA</label>
                            <input type="number" class="form-control input-sm" id="nrofaU" name="nrofaU">
                            <label>Consumidor</label>
                            <input type="text" class="form-control input-sm" id="consumidorU" name="consumidorU">
                            <label>Fornecedor</label>
                            <input type="text" class="form-control input-sm" id="fornecedorU" name="fornecedorU">
                            <div class="form-row">
                                <label>Valor do 1ª Grau</label>
                                <input type="text" class="form-control input-sm" id="valorU" name="valorU">
                                <label> Valor do 2º Grau</label>
                                <input type="text" class="form-control input-sm" id="valor_2U" name="valor_2U">
                                <label>Recurso</label>
                                <select class="form-control input-sm" id="recursoU" name="recursoU">
                                    <option>Tempestivo </option>
                                    <option> Intempestivo </option>
                                </select>
                                <label>Relator</label>
                                <input type="text" class="form-control input-sm" id="relatorU" name="relatorU">
                                <label>Data de julgamento</label>
                                <input type="date" class="form-control input-sm" id="dataU" name="dataU">
                                <label>Ano</label>
                                <input type="number" class="form-control input-sm" id="anoU" name="anoU">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAdicionarProcessoU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "footer.php"; ?>
    </body>

    </html>
    <!-- Adicionar dados -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script>
        $('#valor').mask('000.000.000.000.000,00', {
            reverse: true
        });
        $('#valorU').mask('000.000.000.000.000,00', {
            reverse: true
        });
        $('#valor_2').mask('000.000.000.000.000,00', {
            reverse: true
        });
    </script>
    <script type="text/javascript">
        function adicionarDado(idprocesso) {
            $.ajax({
                type: "POST",
                data: "idprocesso=" + idprocesso,
                url: "../procedimentos/processos/obterDadosProcessos.php",
                success: function(r) {
                    dado = jQuery.parseJSON(r);
                    $('#idprocessoU').val(dado['id_fornecedor']);
                    $('#nrofaU').val(dado['nrofa']);
                    $('#consumidorU').val(dado['consumidor']);
                    $('#fornecedorU').val(dado['fornecedor']);
                    $('#relatorU').val(dado['relator']);
                    $('#valorU').val(dado['valor']);
                    $('#valor_2U').val(dado['valor_2']);
                    $('#dataU').val(dado['data']);
                    $('#anoU').val(dado['ano']);
                    $('#recursoU').val(dado['recurso']);
                }
            });
        }
        // Eliminar fornecedores
        function eliminar(idprocesso) {
            alertify.confirm('Deseja Excluir este registro?', function() {
                $.ajax({
                    type: "POST",
                    data: "idprocesso=" + idprocesso,
                    url: "../procedimentos/processos/eliminarProcessos.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tabelaProcessosLoad').load("processos/tabelaProcessos.php");
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
    <!-- Código que está na div tabelaFornecedores -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#buscar').click(function() {
                vazios = validarFormVazio('frmProcessos');
                if (vazios > 0) {
                    alertify.alert(
                        "Preencha os Campos!"
                    ); //Se todos os campos da div class container não forem preenchidos chama a função alerta "Preeencha os campos
                    return false;
                }
                dados = $('#frmProcessos').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "../procedimentos/processos/adicionarProcessos.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#frmProcessos')[0].reset();
                            //para adicionar novo registro
                            alertify.success("Registro Adicionado");
                        } else {
                            alertify.error("Não foi possível adicionar");
                        }
                    }
                });
            });
        });
        $("#busca").click(function(e) {
            e.preventDefault();
            let filtr = $("#filtro1").val();
            let filtr1 = $("#filtro2").val();
            $.post('processos/tabelaProcessos.php', {
                filtr: filtr,
                filtr1: filtr1
            }, function(data) {
                $("#table").html(data);
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAdicionarProcessoU').click(function() {
                dados = $('#frmProcessosU').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "../procedimentos/processos/atualizarProcessos.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#frmProcessos')[0].reset();
                            ('#tabelaProcessosLoad').load("processos/tabelaProcessos.php");
                            alertify.success("Registro atualizado com sucesso!");
                        } else {
                            alertify.error("Não foi possível atualizar registro");
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