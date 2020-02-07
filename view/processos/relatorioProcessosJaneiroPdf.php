<?php

require_once "../../classes/conexao.php";
$c = new conectar();
$conexao = $c->conexao();
$sql = "SELECT id_fornecedor, nrofa, consumidor, fornecedor, relator, valor,valor_2, data1, ano, recurso  from fornecedores where data1 between ('2020/01/01') and ('2020/01/01')";
$result = mysqli_query($conexao, $sql);
?>
<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
<img src="../../img/marca_procon.jpg" width="200" height="120">
<br>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Processos</label></caption>
    <tr style="background-color: SlateGrey;">
        <td>Nro FA</td>
        <td>Consumidor</td>
        <td>Fornecedor</td>
        <td>relator</td>
        <td>valor do 1ª Grau</td>
        <td>valor do 2ª Grau</td>
        <td>data</td>
        <td>Ano</td>
        <td>Recurso</td>
    </tr>
    <?php while ($mostrar = mysqli_fetch_row($result)) : ?>
        <tr>
            <td><?php echo $mostrar[1]; ?></td>
            <td><?php echo $mostrar[2]; ?></td>
            <td><?php echo $mostrar[3]; ?></td>
            <td><?php echo $mostrar[4]; ?></td>
            <td> <?php echo $mostrar[5]; ?></td>
            <td><?php echo $mostrar[6]; ?></td>
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
            <?php
            $total2Grau = "SELECT sum(valor) as valor from fornecedores where  data1 between ('2020/01/01') and ('2020/01/01')"; //SELECT sum(valor2) as valor2 from fornecedores2 where camara2='1'"
            $buscarDb = mysqli_query($conexao, $total2Grau);
            $valor2 = 0;
            while ($array3 = mysqli_fetch_array($buscarDb)) {
                $valor2 = $valor2 + $array3['valor'];
            ?>
            <?php } ?>
            R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
        </td>
    </tr>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <tr>
        <td style="background-color: SlateGrey;">Total 2ª Grau.</td>
    </tr>
    <tr>
        <td>
            <?php
            $total2Grau = "SELECT sum(valor_2) as valor_2 from fornecedores where  data1 between ('2020/01/01') and ('2020/01/01')";
            $buscarDb = mysqli_query($conexao, $total2Grau);
            $valor2 = 0;
            while ($array3 = mysqli_fetch_array($buscarDb)) {
                $valor2 = $valor2 + $array3['valor_2'];
            ?>
            <?php } ?>
            R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
        </td>
    </tr>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <tr>
        <td style="background-color: SlateGrey;">Total dos valores no mês.</td>
    </tr>
    <tr>
        <td>
            <?php
            $sql2 = "SELECT SUM(valor + valor_2 ) as soma FROM fornecedores WHERE data1 between ('2020/01/01') and ('2020/01/01')";
            $busca = mysqli_query($conexao, $sql2);
            $valor = 0;
            while ($array4 = mysqli_fetch_array($busca)) {
                $valor = $valor + $array4['soma'];
            ?>
            <?php } ?>
            R$ <?php echo number_format($valor, 2, ',', '.'); ?>
        </td>
    </tr>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <tr>
        <td style="background-color: SlateGrey;">Total dos valores anual.</td>
    </tr>
    <tr>
        <td>
            <?php
            $sql2 = "SELECT SUM(valor + valor_2 ) as soma FROM fornecedores WHERE  Year(data) = '2020'";
            $buscar2 = mysqli_query($conexao, $sql2);
            $valor = 0;
            while ($array2 = mysqli_fetch_array($buscar2)) {
                $valor = $valor + $array2['soma'];
            ?>
            <?php } ?>
            R$ <?php echo number_format($valor, 2, ',', '.'); ?>
        </td>
    </tr>
    <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
        <caption><label>Total por relator</label></caption>
        <tr>
            <td style="background-color: SlateGrey;">--</td>
            <td style="background-color: SlateGrey;">Total de Processos por relator</td>
            <td style="background-color: SlateGrey;">valor por relator</td>
        </tr>
        <tr>
            <td>Demetrius</td>
            <td>
                <?php
                $sql6 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Demetrius' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscar = mysqli_query($conexao, $sql6);
                $Qtd = 0;
                while ($array4 = mysqli_fetch_array($buscar)) {
                    $Qtd = $Qtd + $array4['Qtd'];
                ?>
                <?php } ?>
                <?php echo $Qtd ?>
            </td>
            <td>
                <?php
                $sql5 = "SELECT sum(valor) as valor2 from fornecedores where relator='Demetrius' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscarrelator2 = mysqli_query($conexao, $sql5);
                $valor2 = 0;
                while ($array3 = mysqli_fetch_array($buscarrelator2)) {
                    $valor2 = $valor2 + $array3['valor2'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td>Edson</td>
            <td>
                <?php
                $sql7 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Edson' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscar = mysqli_query($conexao, $sql7);
                $Qtd = 0;
                while ($array5 = mysqli_fetch_array($buscar)) {
                    $Qtd = $Qtd + $array5['Qtd'];
                ?>
                <?php } ?>
                <?php echo $Qtd ?>
            </td>
            <td>
                <?php
                $sql5 = "SELECT sum(valor) as valor from fornecedores where relator='Edson' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscarrelator2 = mysqli_query($conexao, $sql5);
                $valor2 = 0;
                while ($array3 = mysqli_fetch_array($buscarrelator2)) {
                    $valor2 = $valor2 + $array3['valor'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td>Filipe</td>
            <td>
                <?php
                $sql9 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Filipe' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscar = mysqli_query($conexao, $sql9);
                $Qtd = 0;
                while ($array9 = mysqli_fetch_array($buscar)) {
                    $Qtd = $Qtd + $array9['Qtd'];
                ?>
                <?php } ?>
                <?php echo $Qtd ?>
            </td>
            <td>
                <?php
                $sql5 = "SELECT sum(valor) as valor from fornecedores where relator='Filipe' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscarrelator2 = mysqli_query($conexao, $sql5);
                $valor2 = 0;
                while ($array3 = mysqli_fetch_array($buscarrelator2)) {
                    $valor2 = $valor2 + $array3['valor'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td>Emannuel</td>
            <td>
                <?php
                $sql21 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Emannuel' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscar = mysqli_query($conexao, $sql21);
                $Qtd = 0;
                while ($array21 = mysqli_fetch_array($buscar)) {
                    $Qtd = $Qtd + $array21['Qtd'];
                ?>
                <?php } ?>
                <?php echo $Qtd ?>
            </td>
            <td>
                <?php
                $sql18 = "SELECT sum(valor) as valor from fornecedores where relator='Emannuel' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscarrelator2 = mysqli_query($conexao, $sql18);
                $valor2 = 0;
                while ($array3 = mysqli_fetch_array($buscarrelator2)) {
                    $valor2 = $valor2 + $array3['valor'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td>Cyro</td>
            <td>
                <?php
                $sql10 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Cyro' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscar = mysqli_query($conexao, $sql10);
                $Qtd = 0;
                while ($array10 = mysqli_fetch_array($buscar)) {
                    $Qtd = $Qtd + $array10['Qtd'];
                ?>
                <?php } ?>
                <?php echo $Qtd ?>
            </td>
            <td>
                <?php
                $sql11 = "SELECT sum(valor) as valor from fornecedores where relator='Cyro' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscarrelator2 = mysqli_query($conexao, $sql11);
                $valor2 = 0;
                while ($array11 = mysqli_fetch_array($buscarrelator2)) {
                    $valor2 = $valor2 + $array11['valor'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td>Juliana</td>
            <td>
                <?php
                $sql12 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Juliana' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscar = mysqli_query($conexao, $sql12);
                $Qtd = 0;
                while ($array12 = mysqli_fetch_array($buscar)) {
                    $Qtd = $Qtd + $array12['Qtd'];
                ?>
                <?php } ?>
                <?php echo $Qtd ?>
            </td>
            <td>
                <?php
                $sql11 = "SELECT sum(valor) as valor from fornecedores where relator='Juliana'  and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscarrelator2 = mysqli_query($conexao, $sql11);
                $valor2 = 0;
                while ($array13 = mysqli_fetch_array($buscarrelator2)) {
                    $valor2 = $valor2 + $array13['valor'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td>Sérgio</td>
            <td>
                <?php
                $sql14 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Sérgio' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscar = mysqli_query($conexao, $sql14);
                $Qtd = 0;
                while ($array14 = mysqli_fetch_array($buscar)) {
                    $Qtd = $Qtd + $array14['Qtd'];
                ?>
                <?php } ?>
                <?php echo $Qtd ?>
            </td>
            <td>
                <?php
                $sql16 = "SELECT sum(valor) as valor from fornecedores where relator='Sérgio' and data1 between ('2020/01/01') and ('2020/01/01')";
                $buscarrelator2 = mysqli_query($conexao, $sql16);
                $valor2 = 0;
                while ($array13 = mysqli_fetch_array($buscarrelator2)) {
                    $valor2 = $valor2 + $array13['valor'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor2, 2, ',', '.'); ?>
            </td>
        </tr>
        </tr>
    </table>