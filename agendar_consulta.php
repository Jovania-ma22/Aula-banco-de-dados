<?php
    include 'class/Consulta.php';

    $consultaMedico = new Consulta();

    // Instancie a classe Consulta
    $consulta = new Consulta();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $dataConsulta = $_POST['dataConsulta'];
        $horaConsulta = $_POST['horaConsulta'];
        $horaFimConsulta = $_POST['horaFimConsulta'];
        $valorConsulta = $_POST['Valor'];
        $idPacienteConsulta = $_POST['CPF'];
        $idAtendimento = $_POST['idAtendimento'];
        $idMedicoConsulta = $_POST['CRM'];

        // Setando o Id da Especialidade do Médico selecionado
        $idEspecialidade = $consulta->listarEspecialidadeMedicoId($idMedicoConsulta);
        $linha = mysqli_fetch_array($idEspecialidade);
       $idMedicoEspecialidadeConsulta = $linha ['especialidade_codigo'];

        // Atribua os valores do formulário na classe Medico

        $consulta->setDataConsulta($dataConsulta);
        $consulta->setHoraConsulta($horaConsulta);
        $consulta->setHoraFimConsulta($horaFimConsulta);
        $consulta->setValorConsulta($valorConsulta);
        $consulta->setIdPacienteConsulta($idPacienteConsulta);
        $consulta->setIdTriagem($idAtendimento);
        $consulta->setIdMedicoConsulta($idMedicoConsulta);
        $consulta->setIdMedicoEspecialidadeConsulta($idMedicoEspecialidadeConsulta);

        
       /* Debug
        echo $consulta->getDataConsulta();
        echo "<br>";
        echo $consulta->getHoraConsulta();
        echo "<br>";
        echo $consulta->getHoraFimConsulta();
        echo "<br>";
        echo $consulta->getValorConsulta();
        echo "<br>";
        echo $consulta->getIdPacienteConsulta();
        echo "<br>";
        echo $consulta->getIdMedicoConsulta();
        echo "<br>";
        echo $consulta->getIdMedicoEspecialidadeConsulta();
        echo "<br>";
        echo $consulta->getidTriagem();
        echo "<br>";
        */
       
        // Execute o método agendar consulta
        $consulta->agendarConsulta();
        if($consulta->getInclusaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Agendamento realizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Consulta agendada com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_consulta.php'
            ";
        } else {
            echo '
            <center>
                <div class="alert alert-danger" style="width: 455px;">
                    <strong>ERRO!</strong> Não foi possível agendar a consulta!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao agendar consulta!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=agendar_consulta.php'
            ";
        }
    }

echo '
<div class="container">
    <legend>Agendar Consulta</legend>
    <form action="index.php?pagina=agendar_consulta.php" method="post">
        <div class="form-inline">
            <div class="col-lg-13">

                <label class="form-group">Data</label>
                <input style="width: 157px;" type="date" name="dataConsulta" class="form-control" required>

                <label class="form-group">Hora</label>
                <input style="width: 120px;" type="time" name="horaConsulta" class="form-control" placeholder="00:00:00" required>

                <label class="form-group">Hora do Fim da Consulta</label>
                <input style="width: 120px;" type="time" name="horaFimConsulta" class="form-control" placeholder="00:00:00" required>

                <label class="form-group">Valor</label>
                <input min="0" step=".01" style="width: 120px;" type="number" name="Valor" class="form-control" placeholder="Ex.: 000,00" required>


                <br><label class="form-group">idAtendimento</label>
                <input maxlength="12" style="width: 110px;" type="text" name="idAtendimento" class="form-control" placeholder="12 Digitos" required>

                <label class="form-group">Médico</label>
                <select name="CRM" style="width: 182px;" class="form-control" placeholder="Médico..." required>
                    <option value="">-Selecione-</option>';
                        $consulta = $consultaMedico->listarMedico();
					    while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                            $consultaMedico->setIdMedicoConsulta($linha['CRM']);
                            $consultaMedico->setNomeMedicoConsulta($linha['nome_medico']);
                            $consultaMedico->setIdMedicoEspecialidadeConsulta($linha['medico_especialidade_codigo']);
							echo '<option value="'.$consultaMedico->getIdMedicoConsulta().'">'.$consultaMedico->getNomeMedicoConsulta().'</option>';
						}
                        echo '
                </select>

                <label class="form-group">Paciente</label>
                <select name="CPF" style="width: 182px;" class="form-control" placeholder="Paciente..." required>
                    <option value="">-Selecione-</option>';
                        $consultaPaciente = new Consulta();
                        $consulta = $consultaPaciente->listarPaciente();
					    while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                            $consultaPaciente->setIdPacienteConsulta($linha['CPF']);
                            $consultaPaciente->setNomePacienteConsulta($linha['nome']);
							echo '<option value="'.$consultaPaciente->getIdPacienteConsulta().'">'.$consultaPaciente->getNomePacienteConsulta().'</option>';
						}
                        echo '
                </select>



                <button style="width: 185p; margin-left: 65px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>';
?>
