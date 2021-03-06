<?php
require_once "../../conexao/conexao.php";
require_once "../../Repository/processos/Relatorio.php";
require_once "../../Repository/processos/relatorioTotal.php";
require_once "../../Repository/login/protecte.php";
protect();
$c = new conectar();
$conexao = $c->conexao();
$cam = $_GET['cam'];
$filtro = $_GET['filtr'];
$filtro1 = $_GET['filtr1'];
$grau1 = totalGrau1($filtro, $filtro1, $cam);
$grau2 = totalGrau2($filtro, $filtro1, $cam);
$totalValores = totalValores($filtro, $filtro1, $cam);
$result = todosProcessos($filtro, $filtro1, $cam);
$total = TotalProcessos($filtro, $filtro1, $cam);
?>
<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
<img src="../../img/images.png" width="200" height="120">
<br>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Processos</label></caption>
    <tr style="background-color: SlateGrey;">
        <td>Nro FA</td>
        <td>Consumidor</td>
        <td>Fornecedor</td>
        <td>Relator</td>
        <td>Valor do 1º Grau</td>
        <td>Valor do 2º Grau</td>
        <td>Data</td>
        <td>Ano</td>
        <td>Recurso</td>
    </tr>
    <?php while ($mostrar = mysqli_fetch_row($result)) : ?>
        <tbody id="myTable">
            <tr>
                <td><?php echo $mostrar[1]; ?></td>
                <td><?php echo $mostrar[2]; ?></td>
                <td><?php echo $mostrar[3]; ?></td>
                <td><?php echo $mostrar[4]; ?></td>
                <td> R$<?php echo $mostrar[5]; ?></td>
                <td>R$<?php echo $mostrar[6]; ?></td>
                <td><?php echo date("d/m/Y", strtotime($mostrar[7])) ?></td>
                <td><?php echo $mostrar[8]; ?></td>
                <td><?php echo $mostrar[9]; ?></td>
            </tr>
        <?php endwhile; ?>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <tr>
        <td style="background-color: SlateGrey;">Total 1ª Grau.</td>
    </tr>
    <tr>
        <td>
            R$ <?php echo $grau1; ?>
        </td>
    </tr>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <tr>
        <td style="background-color: SlateGrey;">Total 2ª Grau.</td>
    </tr>
    <tr>
        <td>
            R$ <?php echo $grau2; ?>
        </td>
    </tr>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <tr>
        <td style="background-color: SlateGrey;">Total dos valores anual.</td>
    </tr>
    <tr>
        <td>
            R$ <?php echo $totalValores; ?>
        </td>
    </tr>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Total por Relator</label></caption>
    <tr style="background-color: SlateGrey;">
        <td>--</td>
        <td>Total de Processos por relator</td>
        <td>Valor por Relator</td>
    </tr>
    <?php $result = ListarNomeRelator($filtro, $filtro1, $cam);
    while ($linha = $result->fetch_assoc()) {
        $resultV = ValorRelator($linha['relator'], $filtro, $filtro1, $cam);
        $resultT = TotalProcessosRelator($linha['relator'], $filtro, $filtro1, $cam); ?>
        <tr>
            <td><?php echo $linha['relator']; ?> </td>
            <td><?php echo $resultT; ?></td>
            <td>R$ <?php echo number_format($resultV, 2, ',', '.'); ?> </td>
        </tr>
    <?php } ?>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Total de Processos.</label></caption>
    <tr>
        <td>
            <?php echo $total; ?>
        </td>
    </tr>
</table>
<footer class="page-footer">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright: Núcleo de Tecnologia da Informação PROCON/PB
        <p>Tel:(83)3214-1713</p>
    </div>
    <!-- Copyright -->
</footer>