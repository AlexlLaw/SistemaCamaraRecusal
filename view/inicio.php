<?php require_once "dependencias.php" ?>
<?php
$t1 = 'fornecedores';
$t2 = 'fornecedores2';

session_start();
//if (isset($_SESSION['usuario'])) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <?php require_once "menu.php"; ?>
        <style type="text/css">
            .bt-primary {
                background-color: #000000;
            }
        </style>
    </head>

    <body>
        <div class="container" style=" margin-top:100px;">
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
                        <div class="card " style="border:1px solid; border-radius: 8px; padding: 10px;">
                            <div class="card-header">
                                <h2 class="card-title">Primeira Câmara Recursal</h2>
                                <hr>
                            </div>
                            <div class="card-body bg-dark">
                                <p class="card-text">Nesta sessão o acesso a inserção de dados constantes nos processos das decisões da 1ª câmara</p>
                                <a href="cadastroPrimeiraC.php" class="btn btn-primary">entrar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card " style="border:1px solid; border-radius: 8px; padding: 10px;">
                            <div class="card-header">
                                <h2 class="card-title">Segunda Câmara Recursal</h2>
                                <hr>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Nesta sessão o acesso a inserção de dados constantes nos processos das decisões da 2ª câmara</p>
                                <a href="CadastroSegundaC.php" class="btn btn-primary">entrar</a>
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