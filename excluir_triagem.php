<?php
    include 'class/Triagem.php';

    $triagem = new Triagem();

    $triagem->setidAtendimento($_GET['idAtendimento']);

    $resultado = $triagem->excluirTriagem();

    if ($resultado != 0) {
        echo '
        <center>
            <div class="alert alert-success" style="width: 455px;">
                <strong>SUCESSO!</strong> Registro excluído com sucesso!
            </div>
        </center>';
        echo "
        <script type=\"text/javascript\">
        alert(\"Triagem excluída com sucesso!\");
        </script>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
        http://localhost/SysClinica/index.php?pagina=listar_triagem.php'
        ";
    } else {
        echo '
        <center>
            <div class="alert alert-danger" style="width: 455px;">
                <strong>ERRO!</strong> Não foi possível excluir o registro!
            </div>
        </center>';
        echo "
        <script type=\"text/javascript\">
        alert(\"Erro ao excluir triagem!\");
        </script>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
        http://localhost/SysClinica/index.php?pagina=listar_triagem.php'
        ";
    }
?>