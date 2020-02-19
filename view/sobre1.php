
<?php session_start(); 
require_once "../Repository/login/protect.php";
protect();?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

<body class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Hidden brand</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


  
    <br>
    <br>
    <br>
    <br>
    <div class="container" style="margin-top: 20px;">
        
        <div class="jumbotron">
  <h1 class="display-4">Câmaras Recursais</h1>
  <p class="lead">Competência</p>
  <hr class="my-4">
  <p> Compete a cada Câmara Recursal, no âmbito de sua competência, assessorar o
                    Superintendente do órgão no processamento e julgamento de recursos de decisões proferidas pela
                    Assessoria Jurídica, bem como de outras ações ou recursos que a lei pertinente à espécie lhes
                    atribuir
                    competência. Esta competência abrange quaisquer matérias que tratem de relação de consumo</p>
</div>
        <br>
<hr>
        <div class="row" style="margin-left:70px!important;">
  <div class="col-sm-6" >
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">1ª Câmara Recursal</h3>
        <hr>
        <p class="card-text"><p>DEMÉTRIUS FAUSTINO DE SOUZA - PRESIDENTE</p>
        <p>ANTONIO FELIPE LEITE SOUTO FALCÃO - MEMBRO</p>
        <p>CYRO CESAR PALITOT REMÍGIO ALVES - MEMBRO</p>
        <br></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">2ª Câmara recursal</h3>
        <hr>
        <p class="card-text"> <p>JULIANA QUEIROZ DE SÁ E BENEVIDES - PRESIDENTE</p>
        <p>SÉRGIO JOSÉ SANTOS FALCÃO - MEMBRO</p>
        <p>FERNANDO LIMA DE OLIVEIRA - MEMBRO</p></p>

      </div>
    </div>
  </div>
</div>
        
        
     
       
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
<?php require_once "templates/footer.php"; ?>

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