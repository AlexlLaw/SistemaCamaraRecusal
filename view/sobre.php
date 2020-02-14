<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../lib/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="../lib/css/menu.css">
<script src="../lib/jquery-3.2.1.min.js"></script>
<script src="../lib/alertifyjs/alertify.js"></script>
<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script src="../lib/select2/js/select2.js"></script>
<script src="../js/funcoes.js"></script>
    </head>

    <body>

    <div id="nav">
        <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <img src="../img/marca_procon.jpg" width="100px" height="70px" class="d-inline-block align-top" alt="">
                    <ul class="nav navbar-nav navbar-right">
                        <!--deixa os ícones do menu posicionados à direita -->
                        <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span>
                                Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Consultas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://procon.pb.gov.br/camararecursal/decisoes">Decisões Proferidas</a>
                                </li>
                                <li><a href="http://procon.pb.gov.br/camararecursal/pautas">Pautas das Câmaras
                                        Recursais</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href="sobre.php"><span class="glyphicon glyphicon-home"></span>
                                Sobre</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" style="color: red" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
                                Usuario: <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php //if ($_SESSION['usuario'] == "admin") : ?>
                                    <li> <a href="usuarios/usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão
                                            Usuários</a></li>
                                <?php // endif; ?>
                                <li> <a style="color: red" href="../procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.contatiner -->
        </div>
    </div>


<br><br><br><br>

 


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