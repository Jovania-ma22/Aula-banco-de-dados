<?php
    include 'class/Triagem.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formularioprivate $idAtendimento;
        $idAtendimentoTriagem = $_POST['idatendimento'];
        $PrioridadeTriagem = $_POST['prioridade'];
        $ObservacaoTriagem = $_POST['observacao'];
        $HorarioProcedimento = $_POST['horarioprocedimento'];

         // Instancie a classe Triagem
        $triagem = new Triagem();

        // Atribua os valores do formulário na classe Triagem
        $triagem->setidAtendimento($idAtendimentoTriagem);
        $triagem->setPrioridade($PrioridadeTriagem);
        $triagem->setObservacao($ObservacaoTriagem);
        $triagem->setHorarioProcedimento($HorarioProcedimento);

        // Execute o método incluir triagem
        $triagem->incluirTriagem();
        if($triagem->getInclusaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Cadastro realizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Triagem cadastrada com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_triagem.php'
            ";
        } else {
            echo '
            <center>
                <div class="alert alert-danger" style="width: 455px;">
                    <strong>ERRO!</strong> Não foi possível realizar o cadastro!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao cadastrar triagem!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SySClinica/index.php?pagina=incluir_triagem.php'
            ";
        }
    }

?>
<div class="container">
    <legend>Incluir Triagem</legend>
    <form action="index.php?pagina=incluir_triagem.php" method="post">
        <div class="form-inline">
            <div class="col-lg-13">
                
                <label class="form-group">idAtendimento</label>
                <input maxlength="12" style="width: 325px; margin-left: 6px;" type="text" name="idatendimento" class="form-control" placeholder="Máximo 12 caracteres..." required>

                <label class="form-group">Prioridade</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="prioridade" class="form-control" placeholder="Máximo 50 caracteres..." required><br/>

                <label class="form-group">Observacao</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="observacao" class="form-control" placeholder="Máximo 50 caracteres..." required>

                <label class="form-group">Horario do Procedimento</label>
                <input  style="width: 120px; margin-left: 6px;" type="time" name="horarioprocedimento" class="form-control" required><br/>

                <button style="width: 185p; margin-left: 107px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
