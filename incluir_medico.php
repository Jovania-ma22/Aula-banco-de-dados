<?php
    include 'class/Medico.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $crmMedico = $_POST['crm'];
        $nomeMedico = $_POST['nome_medico'];
        $dataNascimentoMedico = $_POST['dataNascimento'];
        $contatoMedico =$_POST['telefone'];
        $especialidadeMedico = $_POST['especialidade'];

        // Instancie a classe Medico
        $medico = new Medico();

        // Atribua os valores do formulário na classe Medico
        $medico->setCrmMedico($crmMedico);
        $medico->setNomeMedico($nomeMedico); 
        $medico->setDataNascimentoMedico($dataNascimentoMedico);
        $medico->setContato($contatoMedico);
        $medico->setIdMedicoEspecialidade($especialidadeMedico);

        // Execute o método incluir médico
        $medico->incluirMedico();
        if($medico->getInclusaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Cadastro realizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Médico cadastrado com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_medico.php'
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
            alert(\"Erro ao cadastrar médico!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=incluir_medico.php'
            ";
        }
    }
?>
<div class="container">
    <legend>Incluir Médico</legend>
    <form action="index.php?pagina=incluir_medico.php" method="post">
        <div class="form-inline">
            <div class="col-lg-13">
                <label class="form-group">Nome</label>
                <input maxlength="40" style="width: 325px;" type="text" name="nome_medico" class="form-control" placeholder="Máximo 40 caracteres..." required>

                <label class="form-group">CRM</label>
                <input maxlength="8" style="width: 110px;" id="crm" type="text" name="crm" class="form-control" placeholder="Máx. 8 carac." required>

                <label class="form-group">Fone</label>
                <input style="width: 136px; margin-left: 12px;" id="telefone" type="text" name="telefone" class="form-control" placeholder="(99) 9 9999-9999" required>

                <label class="form-group">Especialidade</label>
                <select id="especialidade" name="especialidade" style="width: 157px;" class="form-control" placeholder="Especialidade..." required>
                    <option value="">-Selecione-</option>
                    <?php
                        $medicoEspecialidade = new Medico();
                        $consulta = $medicoEspecialidade->listarEspecialidade();
					    while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                            $medicoEspecialidade->setIdMedicoEspecialidade($linha['codigo']);
                            $medicoEspecialidade->setDescricaoMedicoEspecialidade($linha['descrição']);
							echo '<option value="'.$medicoEspecialidade->getIdMedicoEspecialidade().'">'.$medicoEspecialidade->getDescricaoMedicoEspecialidade().'</option>';
						}
                    ?>
                </select>

                <label class="form-group">Nascimento</label>
                <input style="width: 157px;" type="date" name="dataNascimento" class="form-control" required>

                <button style="width: 185p; margin-left: 73px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
