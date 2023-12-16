<?php
    include 'class/Exame.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulario
        $statusExame = $_POST['status'];
        $tipoExame = $_POST['tipo'];
        $nomeExame= $_POST['nomeExame'];
        $idPaciente= $_POST['CPF'];


         // Instancie a classe Exame
        $exame = new Exame();

        // Atribua os valores do formulário na classe Exame
        $exame->setStatusExame($statusExame);
        $exame->setTipoExame($tipoExame);
        $exame->setNomeExame($nomeExame);
        $exame->setIdPaciente($idPaciente);

        // Execute o método incluir exame
        $exame->incluirExame();
        if($exame->getInclusaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Cadastro realizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Exame cadastrado com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_exame.php'
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
            alert(\"Erro ao cadastrar exame!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=incluir_exame.php'
            ";
        }
    }

?>
<div class="container">
    <legend>Incluir Exame</legend>
    <form action="index.php?pagina=incluir_exame.php" method="post">
        <div class="form-inline">
            <div class="col-lg-13">
                
                <label class="form-group">Status do Exame</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="status" class="form-control" placeholder="Máximo 50 caracteres..." required><br/>

                <label class="form-group">Tipo</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="tipo" class="form-control" placeholder="Máximo 50 caracteres..." required><br/>

                <label class="form-group">Nome do Exame</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="nomeExame" class="form-control" placeholder="Máximo 50 caracteres..." required><br/>

                <label class="form-group">Codigo do Paciente</label>
                <input style="width: 125px; margin-left: 6px;" id="cpf" type="text" name="CPF" class="form-control" placeholder="999.999.999-99" required>


                <button style="width: 185p; margin-left: 107px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
