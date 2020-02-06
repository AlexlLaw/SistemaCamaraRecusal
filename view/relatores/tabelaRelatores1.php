<?php
require_once "../../classes/conexao.php";
$c = new conectar();
$conexao = $c->conexao();
session_start();
if (isset($_SESSION['usuario'])) {
    $filtro = $_GET['filtro'];
    $filtro1 = $_GET['filtro1']
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>relatores</title>
        <?php require_once "../menu.php"; ?>
    </head>

    <body>
        <div class="container">
            <h1>Relatores</h1>
            <div class="row">
                <div class="col-sm-10">
                    <div id="tabelaRelatoresLoad"></div>
                    <table>
                        <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
                            <caption><label>Total por Relator</label></caption>
                            <tr>
                                <td>--</td>
                                <td>Total de Processos por relator</td>
                                <td>Valor por Relator</td>
                            </tr>
                            <?php $result = ListarNomeRelator();
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
                            <a href="janeiro.php" class="btn btn-danger btn-sm"> Voltar <span class="glyphicon glyphicon glyphicon-share-alt"></span></a>
                        </td>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
function ListarNomeRelator()
{
    require_once "../../classes/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql = "SELECT relator FROM fornecedores group by relator ORDER BY relator desc; ";
    $buscarrelator = mysqli_query($conexao, $sql);
    return $buscarrelator;
}

function TotalProcessosRelator($relator, $filtro, $filtro1)
{
    require_once "../../classes/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql6 = "SELECT COUNT(relator) AS Qtd FROM  fornecedores where relator = '$relator'and data1 between '$filtro' and '$filtro1';";
    $buscar = mysqli_query($conexao, $sql6);
    while ($l = $buscar->fetch_assoc()){
    break;
    }
    return $l['Qtd'];
}

function ValorRelator($relator, $filtro, $filtro1)
{
    require_once "../../classes/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql5 = "SELECT sum(valor_2) as valor_2 from fornecedores where relator = '$relator'and data1 between '$filtro' and '$filtro1' group by relator ORDER BY relator asc";
    $buscarrelator = mysqli_query($conexao, $sql5);
    $valor = 0;
    while ($array3 = $buscarrelator->fetch_assoc()) {
        $valor = $valor + $array3['valor_2'];
    }
    return $valor;
}
?>