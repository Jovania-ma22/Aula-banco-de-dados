<?php
    include 'class/Consulta.php';

    $consultaMedico = new Consulta();
    $consultaPaciente = new Consulta();

    // Instancie a classe Consulta
    $consulta = new Consulta();

    // Seta o id da Consulta via GET
    $consulta->setCodigo($_GET['Codigo']);

    // Lista os dados da consulta selecionada<<--
    $rs = $consulta->listarConsultaId();

    // Array com os dados da consulta
    $linha = mysqli_fetch_array($rs, MYSQLI_ASSOC);

    $consultaMedicoAuxiliar = $linha['nome_medico'];
    $consultaPacienteAuxiliar = $linha['nome'];
echo '
<div class="container">
    <legend>Atualizar Médico</legend>
    <form action="index.php?pagina=processar_atualizacao_consulta.php&Codigo='.$linha['Codigo'].'" method="post">
        <div class="form-inline ">
            <div class="col-lg-13">
                <label class="form-group">Data</label>
                <input style="width: 157px;" type="date" name="dataConsulta" class="form-control" value="'.$linha['dataNasc'].'" required>

                <label class="form-group">Hora</label>
                <input maxlength="8" style="width: 110px;" type="text" name="horaConsulta" class="form-control" placeholder="00:00:00" value="'.$linha['horaConsulta'].'" required>

                <label class="form-group">Hora Fim Consulta</label>
                <input maxlength="8" style="width: 110px;" type="text" name="horaFimConsulta" class="form-control" placeholder="00:00:00" value="'.$linha['horaFimConsulta'].'" required>

                <label class="form-group">Valor</label>
                <input min="0" step=".01" style="width: 120px;" type="number" name="Valor" class="form-control" placeholder="Ex.: 000,00" value="'.$linha['Valor'].'" required>

                <label class="form-group">Médico</label>
                <select name="CRM" style="width: 182px;" class="form-control" required>
                    <option value="'.$linha['CRM'].'">'.$linha['nome_medico'].'</option>';
                        $consultaMed = $consultaMedico->listarMedico();
                        while($linhaMed = mysqli_fetch_array($consultaMed, MYSQLI_ASSOC)) {
                            $consultaMedico->setIdMedicoConsulta($linhaMed['CRM']);
                            $consultaMedico->setNomeMedicoConsulta($linhaMed['nome_medico']);
                            $consultaMedico->setIdMedicoEspecialidadeConsulta($linhaMed['medico_especialidade_codigo']);
                            if ($consultaMedico->getNomeMedicoConsulta() === $consultaMedicoAuxiliar) {
                                $medicoCombo = '';
                            } else {
                                $medicoCombo = '<option value="'.$consultaMedico->getIdMedicoConsulta().'">'.$consultaMedico->getNomeMedicoConsulta().'</option>';
                            }
                            echo $medicoCombo;
                        }
                        echo '
                </select>

                <label class="form-group">Paciente</label>
                <select name="CPF" style="width: 182px;" class="form-control" required>
                    <option value="'.$linha['CPF'].'">'.$linha['nome'].'</option>';
                        $consultaPac = $consultaPaciente->listarPaciente();
                        while($linhaPac = mysqli_fetch_array($consultaPac, MYSQLI_ASSOC)) {
                            $consultaPaciente->setIdPacienteConsulta($linhaPac['CPF']);
                            $consultaPaciente->setNomePacienteConsulta($linhaPac['nome']);
                            if ($consultaPaciente->getNomePacienteConsulta() === $consultaPacienteAuxiliar) {
                                $pacienteCombo = '';
                            } else {
                                $pacienteCombo = '<option value="'.$consultaPaciente->getIdPacienteConsulta().'">'.$consultaPaciente->getNomePacienteConsulta().'</option>';
                            }
                            echo $pacienteCombo;
                        }
                        echo '
                </select>


                <button style="width: 185p; margin-left: 65px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
';
?>