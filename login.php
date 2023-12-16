<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap-3.1.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/form.css"/>
        <script src="bootstrap-3.1.1-dist/js/jquery/jquery-1.11.1.min.js"></script>
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script src="jquery/jquery-1_3_2.min.js"></script>
        <script src="jquery/maskedinput.js"></script>
        <script src="jquery/masks.js"></script>
        <script src="js/alerts.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>SysClinica</h1>
                <p>Sistema de Controle de Pacientes e Consultas</p>
            </div>
        </div>
    <form method="post" id="fContato" action="vini.sousa34@gmail.com" oninput="Calc_Total();">

<fieldset id="Usuario"><legend>Identificação do Usuário</legend>
    <p><label for="cNome"> Usuário:</label>
        <input type="text" name="tNome" id="cNome" size="20" maxlength="30" placeholder="Nome Completo" /></p>
    <p><label for="cSenha"> Senha:</label>
     <input type="Password" name="tSenha" id="cSenha" size="8" maxlength="8" placeholder="Senha" /></p>    
</fieldset>

<input type="image" name="tEnviar" src="_imagens/botao-enviar.png">
</form>
<?php
if (isset($_GET['pagina']) != '') {
	include_once $_GET['pagina'];
}
?>
<div class="footer ">
            <div class="container">
                <hr>
                <p class="text-muted text-center">&copy; 2022 | EVY DEVELOPMENT</a></p>
            </div>
        </div>
        <script src="jquery/jquery-3_2_1.slim.min.js"></script>
        <script src="jquery/jquery-1_9_1.min.js"></script>
    </body>
</html>
