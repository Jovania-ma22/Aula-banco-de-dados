<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Página Inicial</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap-3.1.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/form.css"/>
        <link rel="shortcut icon" href="_imagens/favicon.ico" type="x-icon/image">
        <script src="bootstrap-3.1.1-dist/js/jquery/jquery-1.11.1.min.js"></script>
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script src="jquery/jquery-1_3_2.min.js"></script>
        <script src="jquery/maskedinput.js"></script>
        <script src="jquery/masks.js"></script>
        <script src="js/alert.js"></script>
        <script src="js/alerts.js"></script>
        
    </head>

    <body>



        
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">SysClínica</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="index.php">Página Inicial</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Paciente <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?pagina=listar_paciente.php">Listar Paciente</a></li>
                                <li><a href="index.php?pagina=incluir_paciente.php">Incluir Paciente</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Especialidade <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?pagina=listar_especialidade.php">Listar Especialidade</a></li>
                                <li><a href="index.php?pagina=incluir_especialidade.php">Incluir Especialidade</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Triagem <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?pagina=listar_triagem.php">Listar Triagem</a></li>
                                <li><a href="index.php?pagina=incluir_triagem.php">Incluir Triagem</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Médico <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?pagina=listar_medico.php">Listar Médico</a></li>
                                <li><a href="index.php?pagina=incluir_medico.php">Incluir Médico</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Consultas <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?pagina=agendar_consulta.php">Agendar Consultas</a></li>
                                <li><a href="index.php?pagina=listar_consulta.php">Listar Consultas</a></li>
                               <!--<li><a href="index.php?pagina=listar_consulta_personalizada.php">Buscas Personalizadas</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Exames <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?pagina=listar_exame.php">Listar Exames</a></li>
                                <li><a href="index.php?pagina=incluir_exame.php">Agendar Exames</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron">
                <h1>SysClinica</h1>
                <p>Sistema de Controle de Pacientes e Consultas</p>
            </div>
        </div>
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
