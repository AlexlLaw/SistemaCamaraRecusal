<?php

require_once "../../classes/conexao.php";
$c = new conectar();
$conexao = $c->conexao();

/

<?php //endWhile; ?>
</table> -->
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Total por Relator</label></caption>
    <tr>
        <td>--</td>
        <td>Total de Processos por relator</td>
        <td>Valor por Relator</td>



    </tr>
    <tr>

        <td>Demetrius</td>
        <td>
            <?php
$sql6 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Demetrius' and MONTH(data) = '1' and year(data)='2020'";
$buscar = mysqli_query($conexao, $sql6);
$Qtd = 0;

while ($array4 = mysqli_fetch_array($buscar)) {
    $Qtd = $Qtd + $array4['Qtd'];
    ?>

            <?php }?>
            <?php echo $Qtd ?>








        </td>
        <td>
            <?php
$sql5 = "SELECT sum(valor_2) as valor_2 from fornecedores where relator='Demetrius' and MONTH(data) = '1'and year(data)='2020'";
$buscarrelator = mysqli_query($conexao, $sql5);
$valor = 0;

while ($array3 = mysqli_fetch_array($buscarrelator)) {
    $valor = $valor + $array3['valor_2'];

    ?>

            <?php }?>
            R$ <?php echo number_format($valor, 2, ',', '.'); ?>

        </td>



    </tr>
    <tr>

        <td>Filipe</td>
        <td>
            <?php
$sql9 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Filipe' and MONTH(data) = '1'and year(data)='2020'";
$buscar = mysqli_query($conexao, $sql9);
$Qtd = 0;

while ($array9 = mysqli_fetch_array($buscar)) {
    $Qtd = $Qtd + $array9['Qtd'];
    ?>

            <?php }?>
            <?php echo $Qtd ?>



        </td>
        <td>
            <?php
$sql5 = "SELECT sum(valor_2) as valor_2 from fornecedores where relator='Filipe' and MONTH(data) = '1'and year(data)='2020'";
$buscarrelator = mysqli_query($conexao, $sql5);
$valor = 0;

while ($array3 = mysqli_fetch_array($buscarrelator)) {
    $valor = $valor + $array3['valor_2'];

    ?>

            <?php }?>
            R$ <?php echo number_format($valor, 2, ',', '.'); ?>
        </td>

    </tr>

    <tr>

        <td>Cyro</td>
        <td>
            <?php
$sql10 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Cyro' and MONTH(data) = '1'and year(data)='2020'";
$buscar = mysqli_query($conexao, $sql10);
$Qtd = 0;

while ($array10 = mysqli_fetch_array($buscar)) {
    $Qtd = $Qtd + $array10['Qtd'];
    ?>

            <?php }?>
            <?php echo $Qtd ?>
        </td>
        <td>

            <?php
$sql11 = "SELECT sum(valor_2) as valor_2 from fornecedores where relator='Cyro' and MONTH(data) = '1'and year(data)='2020'";
$buscarrelator = mysqli_query($conexao, $sql11);
$valor = 0;

while ($array11 = mysqli_fetch_array($buscarrelator)) {
    $valor = $valor + $array11['valor_2'];

    ?>

            <?php }?>
            R$ <?php echo number_format($valor, 2, ',', '.'); ?>
        </td>


    </tr>
    <tr>

        <td>Fábio</td>
        <td>
            <?php
$sql12 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Fábio' and MONTH(data) = '1'and year(data)='2020'";
$Qtd = 0;

while ($array12 = mysqli_fetch_array($buscar)) {
    $Qtd = $Qtd + $array12['Qtd'];
    ?>

            <?php }?>
            <?php echo $Qtd ?>
        </td>
        <td>
            <?php
$sql11 = "SELECT sum(valor_2) as valor_2 from fornecedores where relator='Fábio' and MONTH(data) = '1'and year(data)='2020'";
$buscarrelator = mysqli_query($conexao, $sql11);
$valor = 0;

while ($array13 = mysqli_fetch_array($buscarrelator)) {
    $valor = $valor + $array13['valor_2'];

    ?>

            <?php }?>
            R$ <?php echo number_format($valor, 2, ',', '.'); ?>
        </td>


    </tr>
    <!-- <tr>

        <td>Sérgio</td>
        <td>
            <//?php
$sql14 = "SELECT relator, COUNT(relator) AS Qtd FROM fornecedores where relator='Sérgio' and MONTH(data) = '3'";
$buscar = mysqli_query($conexao, $sql14);
$Qtd = 0;

while ($array14 = mysqli_fetch_array($buscar)) {
    $Qtd = $Qtd + $array14['Qtd'];
    ?>

            <//?php }?>
            <//?php echo $Qtd ?>
        </td>
        <td>
            //<?php
//$sql16 = "SELECT sum(valor) as valor from fornecedores where relator='Sérgio' and MONTH(data) = '3'";
//$buscarrelator = mysqli_query($conexao, $sql16);
//$valor = 0;

//while ($array13 = mysqli_fetch_array($buscarrelator)) {
// $valor = $valor + $array13['valor'];

?>

            <//?php }?>
            R$ <//?php echo $valor ?>


        </td>


    </tr> -->

</table>

<td style="align:higth;">
    <a href="janeiro.php" class="btn btn-danger btn-sm">
        Voltar <span class="glyphicon glyphicon glyphicon-share-alt"></span>
    </a>
</td>