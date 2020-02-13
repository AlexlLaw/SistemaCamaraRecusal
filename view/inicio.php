<?php require_once "../lib/dependencias.php" ?>
<?php


session_start();
//if (isset($_SESSION['usuario'])) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <?php require_once "templates/menu.php"; ?>
        <style type="text/css">
            .bt-primary {
                background-color: #000000;
            }
        </style>
    </head>

    <body>
        <div class="container" style=" margin-top:10px;">
            <div class="container-fluid">
                <div class="page-header">
                    <h1>Registro dos dados referentes aos processos de 1ª e 2ª Câmara</h1>
                    <p>Disponibilizamos nesta sessão o acesso a inserção de dados constantes nos processos das decisões de
                        1ª e
                        2ª câmara</p>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-6">
                   
                    <div class="jumbotron">
  <h2 class="display-6">Primeira Câmara Recursal</h2>
  <p class="lead">Nesta sessão o acesso a inserção de dados constantes nos processos das decisões da 1ª câmara</p>
  <hr class="my-4">
  <a href="cadastroPrimeiraC.php?camara=1" class="btn btn-primary">entrar</a>
</div>
                    </div>
                  
                    
                    <div class="col-sm-6">
                    <div class="jumbotron">
  <h2 class="display-6">Segunda Câmara Recursal</h2>
  <p class="lead">Nesta sessão o acesso a inserção de dados constantes nos processos das decisões da 2ª câmara</p>
  <hr class="my-4">
  <a href="cadastroPrimeiraC.php?camara=2" class="btn btn-primary">entrar</a>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </body>
    <?php require_once "templates/footer.php"; ?>
    </html>
<?php
/*} else {
    header("location:../index.php");
}*/
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