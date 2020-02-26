<?php
function todosProcessos($filtro, $filtro1, $cam)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql = "SELECT id_processos, nrofa, consumidor, fornecedor, relator, ValorGrau_1,ValorGrau_2, data_jugamento, ano, recurso, camara  from processos where data_jugamento between '$filtro' and '$filtro1' and camara = '$cam'";
    $result = mysqli_query($conexao, $sql);
    return $result;
}
function totalGrau1($filtro, $filtro1, $cam)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $total2Grau = "SELECT sum(ValorGrau_1) as ValorGrau_1 from processos where data_jugamento between '$filtro' and '$filtro1' and camara = '$cam'";
    $buscarDb = mysqli_query($conexao, $total2Grau);
    $valor = 0;
    while ($array3 = mysqli_fetch_array($buscarDb)) {
        $valor = $valor + $array3['ValorGrau_1'];
    }
    return number_format($valor, 2, ',', '.');
}
function totalGrau2($filtro, $filtro1, $cam)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    //código php para somar os valores da segunda sessão 
    $total2Grau = "SELECT sum(ValorGrau_2)  as ValorGrau_2 from processos where data_jugamento between '$filtro' and '$filtro1' and camara = '$cam'";
    $buscarDb = mysqli_query($conexao, $total2Grau);
    $valor = 0;
    while ($array3 = mysqli_fetch_array($buscarDb)) {
        $valor = $valor + $array3['ValorGrau_2'];
    }
    return number_format($valor, 2, ',', '.');
}
function totalValores($filtro, $filtro1, $cam)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql2 = "SELECT SUM(ValorGrau_2) as soma FROM processos WHERE data_jugamento between '$filtro' and '$filtro1' and camara = '$cam'";
    $buscar2 = mysqli_query($conexao, $sql2);
    $valor = 0;
    while ($array2 = mysqli_fetch_array($buscar2)) {
        $valor = $valor + $array2['soma'];
    }
    return number_format($valor, 2, ',', '.');
}