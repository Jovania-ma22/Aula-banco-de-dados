<?php
    include 'class/Medico.php';

    // Instancie a classe Medico
    $medico = new Medico();

    // Seta o id do Médico via GET
    $medico->setCrmMedico($_GET['CRM']);

    // Lista os dados do médico selecionado
    $rs = $medico->listarMedicoId();
    
    // Array com os dados do médico
    $linha = mysqli_fetch_array($rs, MYSQLI_ASSOC);

    $medicoEspecialidadeAuxiliar = $linha['descrição'];
echo '
<div class="container">
    <legend>Atualizar Médico</legend>
    <form action="index.php?pagina=processar_atualizacao_medico.php&CRM='.$linha['CRM'].'" method="post">
        <div class="form-inline ">
            <div class="col-lg-13">

                <label class="form-group">CRM</label>
                <input maxlength="8" style="width: 110px;" id="CRM" type="text" name="CRM" class="form-control" placeholder="Máx. 8 carac." required value="'.$linha['CRM'].'">

                <label class="form-group">Nome</label>
                <input maxlength="40" style="width: 325px;" type="text" name="nome_medico" class="form-control" placeholder="Máximo 40 caracteres..." required value="'.$linha['nome_medico'].'">

                <label class="form-group">Fone</label>
                <input style="width: 136px; margin-left: 12px;" id="telefone" type="text" name="contato" class="form-control" placeholder="(99) 9 9999-9999" required value="'.$linha['contato'].'">

                <label class="form-group">Especialidade</label>
                <select id="especialidade" name="especialidade" style="width: 157px;" class="form-control" placeholder="Especialidade..." required>
                    <option value="'.$linha['codigo'].'">'.$linha['descrição'].'</option>';
                    $medicoEspecialidade = new Medico();
                    $consulta = $medicoEspecialidade->listarEspecialidade();
                    while($linhaEsp = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                        $medicoEspecialidade->setIdMedicoEspecialidade($linhaEsp['codigo']);
                        $medicoEspecialidade->setDescricaoMedicoEspecialidade($linhaEsp['descrição']);
                        if ($medicoEspecialidade->getDescricaoMedicoEspecialidade() === $medicoEspecialidadeAuxiliar) {
                            $especialidadeCombo = '';
                        } else {
                            $especialidadeCombo = '<option value="'.$medicoEspecialidade->getIdMedicoEspecialidade().'">'.$medicoEspecialidade->getDescricaoMedicoEspecialidade().'</option>';
                        }
                        echo $especialidadeCombo;
                    }
                echo '
                </select>

                <label class="form-group">Nascimento</label>
                <input style="width: 157px;" type="date" name="dataNasc" class="form-control" required value="'.$linha['dataNasc'].'">

                <button style="width: 185p; margin-left: 73px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
';
?>