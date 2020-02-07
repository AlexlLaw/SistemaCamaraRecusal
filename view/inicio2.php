<?php require_once "dependencias.php"?>
<?php
session_start();
if (isset($_SESSION['usuario'])) {?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php require_once "menu.php";?>
    <style type="text/css">
    .btn-primary {
        background-color: #000000;
    }
    </style>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="page-header">
            <h2>Câmaras Recursais</h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h1 style="font-size:1.8em; color:#707070">Competência</h1>
            </div>
            <div class="page-header">
                <p style="text-align: justify; font-size: 15px;">
                    <br><br>
                    Compete a cada Câmara Recursal, no âmbito de sua competência, assessorar o
                    Superintendente do órgão no processamento e julgamento de recursos de decisões proferidas pela
                    Assessoria Jurídica, bem como de outras ações ou recursos que a lei pertinente à espécie lhes
                    atribuir
                    competência. Esta competência abrange quaisquer matérias que tratem de relação de consumo.</p>
            </div>
        </div>
        <br>
        <div class="page-header">
            <h1 style="font-size:1.8em; color:#707070">Composição</h1>
        </div>
        <h3><b>1ª Câmara Recursal</b></h3>
        <p>DEMÉTRIUS FAUSTINO DE SOUZA - PRESIDENTE</p>
        <p>ANTONIO FELIPE LEITE SOUTO FALCÃO - MEMBRO</p>
        <p>CYRO CESAR PALITOT REMÍGIO ALVES - MEMBRO</p>
        <br>
        <h3><b>2ª Câmara recursal</b></h3>
        <p>JULIANA QUEIROZ DE SÁ E BENEVIDES - PRESIDENTE</p>
        <p>SÉRGIO JOSÉ SANTOS FALCÃO - MEMBRO</p>
        <p>FERNANDO LIMA DE OLIVEIRA - MEMBRO</p>
        <br>
    </div>
    </div>
    <!--div que carrega do lado direito da página e recebe os valores digitados do lado esquerdo. Note que uma tem col-sm-4 e a outra col-sm-8, o que soma 12-->
    <div class="col-sm-8">
        <div id="tabelaProcessosLoad"></div>
    </div>
    </div>
    </div>
</body>
</html>
<?php
} else {
    header("location:../index.php");
}

?>
<script type="text/javascript">
$(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
        $('.logo').width(100);
        $('.logo').height(60);
    } else {
        $('.logo').height(100);
        $('.logo').width(150);
    }
});
</script>