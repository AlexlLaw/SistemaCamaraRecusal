<?php
require_once "../../classes/conexao.php";
$c = new conectar();
$conexao = $c->conexao();


$filtro = $_POST['filtr'];
$filtro1 = $_POST['filtr1'];
if (!isset($_POST['filtr'])) {
    echo 'vazio';
} else {
    $sql = "SELECT id_fornecedor, nrofa, consumidor, fornecedor, relator, valor,valor_2, data1, ano, recurso  from fornecedores where data1 between '$filtro' and '$filtro1'";
    $result = mysqli_query($conexao, $sql);
}
//$sql = "SELECT id_fornecedor, nrofa, consumidor, fornecedor, relator, valor,valor_2, data1, ano, recurso  FROM fornecedores";
?>
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
        <td>Adicionar</td>
        <td>Excluir</td>
    </tr>
    <?php
    $total = 0;
    ?>
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
                <td>
                    <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalProcessosUpdate" onclick="adicionarDado('<?php echo $mostrar[0]; ?>')">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-danger btn-xs" onclick="eliminar('<?php echo $mostrar[0]; ?>')">
                        <span class="glyphicon glyphicon-remove"></span>
                    </span>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
</table>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <tr>
        <td style="background-color: SlateGrey;">Total 1ª Grau.</td>
    </tr>
    <tr>
        <td>
            <?php
            //código php para somar os valores da primeira sessão se o mês for Janeiro.
            $total2Grau = "SELECT sum(valor) as valor from fornecedores where data1 between '$filtro' and '$filtro1'";
            //SELECT sum(valor) as valor from fornecedores where camara='1'"
            $buscarDb = mysqli_query($conexao, $total2Grau);
            $valor = 0;
            while ($array3 = mysqli_fetch_array($buscarDb)) {
                $valor = $valor + $array3['valor'];
                $valorFormatado = str_replace(',', '.', str_replace('.', '', $valor));
            ?>
            <?php } ?>
            R$ <?php echo number_format($valorFormatado, 2, ',', '.'); ?>
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
            //código php para somar os valores da segunda sessão 
            $total2Grau = "SELECT sum(valor_2)  as valor_2 from fornecedores where data1 between '$filtro' and '$filtro1'";
            $buscarDb = mysqli_query($conexao, $total2Grau);
            $valor = 0;
            while ($array3 = mysqli_fetch_array($buscarDb)) {
                $valor = $valor + $array3['valor_2'];
                $valorFormatado = str_replace(',', '.', str_replace('.', '', $valor));
            ?>
            <?php } ?>
            R$ <?php echo number_format($valorFormatado, 2, ',', '.'); ?>
        </td>
    </tr>
    <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
        <tr>
            <td style="background-color: SlateGrey;">Total dos valores no ano de 2020.</td>
        </tr>
        <tr>
            <td>
                <?php
                //código php para somar o total dos valores .
                $sql2 = "SELECT SUM(valor_2 ) as soma FROM fornecedores WHERE  Year(data1) = '2020'";
                $buscar2 = mysqli_query($conexao, $sql2);
                $valor = 0;
                while ($array2 = mysqli_fetch_array($buscar2)) {
                    $valor = $valor + $array2['soma'];
                ?>
                <?php } ?>
                R$ <?php echo number_format($valor, 2, ',', '.'); ?>
            </td>
        </tr>
        </div>
    </table>
    <td style="align:center;">
        <a href="../procedimentos/pdf/criarRelatorioJaneiroPdf.php" class="btn btn-danger btn-sm">
            Imprimir <span class="glyphicon glyphicon-print"></span>
        </a>
    </td>
    <br>
    <br>
    </div>
    <table style="text-align: center; height: 100px ;">
        <tr>
            <td style=" text-decoration:none color:#FFF;"><a href="./relatores/tabelaRelatores1.php?filtro=<?php echo $filtro; ?>&filtro1=<?php echo $filtro1;?>">Total de valores por relator no mês de janeiro.<!--target="_blank--></a></td>
        </tr>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>