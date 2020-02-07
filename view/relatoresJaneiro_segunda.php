<?php
session_start();
if (isset($_SESSION['usuario'])) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>relatores</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="container">
            <h1>Relatores</h1>
            <div class="row">
                <div class="col-sm-10">
                    <div id="tabelaRelatoresLoad"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#tabelaRelatoresLoad').load("relatores/tabelaRelatoresJaneiro_segunda.php");
            });
        </script>
    <?php
} else {
    header("location:../index.php");
}
    ?>