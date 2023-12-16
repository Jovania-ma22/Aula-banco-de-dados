<?php
    include 'class/Triagem.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $idAtendimentoTriagem = $_POST['idAtendimento'];
        $Prioridade = $_POST['prioridade'];
        $ObservacaoTriagem = $_POST['Observacao'];
        $HorarioProcedimento = $_POST['HorarioProcedimento'];

        // Instancie a classe Triagem
        $triagem = new Triagem();

        // Atribua os valores do formulário na classe Triagem
        $triagem->setidAtendimento($idAtendimentoTriagem);
        $triagem->setidAtendimento($_GET['idAtendimento']);
        $triagem->setPrioridade($Prioridade);
        $triagem->setObservacao($ObservacaoTriagem);
        $triagem->setHorarioProcedimento($HorarioProcedimento);
        

        // Execute o método atualizar triagem
        $triagem->atualizarTriagem();
        if($triagem->getAtualizacaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Registro atualizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Triagem atualizada com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_triagem.php'
            ";
        } else {
            echo '
            <center>
                <div class="alert alert-danger" style="width: 455px;">
                    <strong>ERRO!</strong> Não foi possível atualizar o registro!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao atualizar Triagem!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=atualizar_triagem.php&idAtendimento={$triagem->getidAtendimento()}'
            ";
        }
    }
?>