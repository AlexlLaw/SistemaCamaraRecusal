<?php
session_start();
if (isset($_SESSION['usuario'])) { ?>
    <!--verificação para saber se existe usuário logado-->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Processos Janeiro</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="container">
            <h1>Processos</h1>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmProcessos">
                        <label>N° FA</label>
                        <input type="text" class="form-control input-sm" id="nrofa2" name="nrofa2">
                        <label>Consumidor</label>
                        <input type="text" class="form-control input-sm" id="consumidor2" name="consumidor2">
                        <label>Fornecedor</label>
                        <input type="text" class="form-control input-sm" id="fornecedor2" name="fornecedor2">
                        <label>Valor do 1 º Grau</label>
                        <input type=" text " class="form-control input-sm" id=" valor2 " name="valor2">
                        <label> Valor do 2º Grau</label>
                        <input type="number" class="form-control input-sm" id="valor_seg" name="valor_seg">
                        <label>Recurso</label>
                        <select class="form-control input-sm" id="recurso2" name="recurso2">
                            <option>Tempestivo </option>
                            <option> Intempestivo </option>
                        </select>
                        <label>Relatores</label>
                        <select class="form-control input-sm" id="relator2" name="relator2">
                            <option>-----</option>
                            <option>Kaio</option>
                            <option>Emannuel</option>
                            <option>Juliana</option>
                            <option>Sérgio</option>
                            <option>Fernando</option>
                        </select>
                        <label>Data De Julgamento</label>
                        <input type="date" class="form-control input-sm" id="data2" name="data2">
                        <label>Ano</label>
                        <input type="number" class="form-control input-sm" id="data2" name="ano2">
                        <p></p>
                        <!-- essa span é onde está o botão salvar. Ao ser clicado será acionado o id btnAdicionarFornecedores -->
                        <span class="btn btn-primary" id="btnAdicionarProcessos">Salvar</span>
                    </form>
                </div>
                <!--div que carrega do lado direito da página e recebe os valores digitados do lado esquerdo. Note que uma tem col-sm-4 e a outra col-sm-8, o que soma 12-->
                <div class="col-sm-8">
                    <div id="tabelaProcessosLoad"></div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="abremodalProcessosUpdate2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Atualizar Fornecedor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmProcessosU">
                            <input type="text" hidden="" id="idprocesso2U" name="idprocesso2U">
                            <label>nroFA</label>
                            <input type="number" class="form-control input-sm" id="nrofa2U" name="nrofa2U">
                            <label>Consumidor</label>
                            <input type="text" class="form-control input-sm" id="consumidor2U" name="consumidor2U">
                            <label>Fornecedor</label>
                            <input type="text" class="form-control input-sm" id="fornecedor2U" name="fornecedor2U">
                            <div class="form-row">
                                <label>Valor do 1ª Grau</label>
                                <input type="number" class="form-control input-sm" id="valor2U" name="valor2U">
                                <label> Valor do 2º Grau</label>
                                <input type="number" class="form-control input-sm" id="valor_segU" name="valor_segU">
                                <label>Recurso</label>
                                <select class="form-control input-sm" id="recurso2U" name="recurso2U">
                                    <option>Tempestivo </option>
                                    <option> Intempestivo </option>
                                </select>
                                <label>Relator</label>
                                <input type="text" class="form-control input-sm" id="relator2U" name="relator2U">
                                <label>Data De julgamento</label>
                                <input type="date" class="form-control input-sm" id="data2U" name="data2U">
                                <label>Ano</label>
                                <input type="number" class="form-control input-sm" id="ano2U" name="ano2U">
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
    <script type="text/javascript">
        function adicionarDado(idprocesso2) {
            $.ajax({
                type: "POST",
                data: "idprocesso2=" + idprocesso2,
                url: "../procedimentos/processos/obterDadosProcessos2.php",
                success: function(r) {
                    dado = jQuery.parseJSON(r);
                    $('#idprocesso2U').val(dado['id_fornecedor2']);
                    $('#nrofa2U').val(dado['nrofa2']);
                    $('#consumidor2U').val(dado['consumidor2']);
                    $('#fornecedor2U').val(dado['fornecedor2']);
                    $('#relator2U').val(dado['relator2']);
                    $('#valor2U').val(dado['valor2']);
                    $('#valor_segU').val(dado['valor_seg']);
                    $('#data2U').val(dado['data2']);
                    $('#ano2U').val(dado['ano2']);
                    $('#recurso2U').val(dado['recurso2']);
                }
            });
        }
        // Eliminar fornecedores
        function eliminar(idprocesso2) {
            alertify.confirm('Deseja Excluir este registro?', function() {
                $.ajax({
                    type: "POST",
                    data: "idprocesso2=" + idprocesso2,
                    url: "../procedimentos/processos/eliminarProcessos2.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tabelaProcessosLoad').load("processos/tabelaProcessosJaneiro_segunda.php");
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
            $('#tabelaProcessosLoad').load("processos/tabelaProcessosJaneiro_segunda.php");
            $('#btnAdicionarProcessos').click(function() {
                vazios = validarFormVazio('frmProcessos');
                if (vazios > 0) {
                    alertify.alert(
                        "Preencha os Campos!!"
                    ); //Se todos os campos da div class container não forem preenchidos chama a função alerta "Preeencha os campos
                    return false;
                }
                dados = $('#frmProcessos').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "../procedimentos/processos/adicionarProcessos2.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#frmProcessos')[0].reset();
                            $('#tabelaProcessosLoad').load(
                                "processos/tabelaProcessosJaneiro_segunda.php"
                            ); //para adicionar novo registro
                            alertify.success("Registro Adicionado");
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
            $('#btnAdicionarProcessoU').click(function() {
                dados = $('#frmProcessosU').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "../procedimentos/processos/atualizarProcessos2.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#frmProcessos')[0].reset();
                            $('#tabelaProcessosLoad').load(
                                "processos/tabelaProcessosJaneiro_segunda.php");
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