<?php
require_once "../../conexao/conexao.php";
require_once "../../Repository/processos/relatorioTotal.php";
$c = new conectar();
$conexao = $c->conexao();
session_start();
    $filtro = $_GET['filtro'];
    $filtro1 = $_GET['filtro1'];
?>
    <!DOCTYPE html>
    <html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <head>
        <title>relatores</title>
    </head>
    <body>
        <div class="container">
            <h1>Relatores</h1>
            <div class="row">
                <div class="col-sm-10">
                    <div id="tabelaRelatoresLoad"></div>
                    <table>
                        <table class="table table-hover" style="text-align: center;">
                            <caption><label>Total por Relator</label></caption>
                            <tr>
                                <td>Relator</td>
                                <td>Total de Processos por relator</td>
                                <td>Valor por Relator</td>
                            </tr>
                            <?php $result = ListarNomeRelator($filtro, $filtro1);
                            while ($linha = $result->fetch_assoc()) {
                                $resultV = ValorRelator($linha['relator'], $filtro, $filtro1);
                                $resultT = TotalProcessosRelator($linha['relator'], $filtro, $filtro1); ?>
                                <tr>
                                    <td><?php echo $linha['relator']; ?> </td>
                                    <td><?php echo $resultT; ?></td>
                                    <td>R$ <?php echo number_format($resultV, 2, ',', '.'); ?> </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <td style="align:higth;">
                            <a href="../cadastroPrimeiraC.php" class="btn btn-danger btn-sm"> Voltar <span class="glyphicon glyphicon glyphicon-share-alt"></span></a>
                        </td>
                </div>
            </div>
        </div>
    </body>
    </html>