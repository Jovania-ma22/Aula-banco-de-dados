<?php
    include 'class/Triagem.php';

    // Instancie a classe Triagem
    $triagem = new Triagem();
    
    // Seta o id da Triagem via GET
    $triagem->setidAtendimento($_GET['idAtendimento']);

    // Lista os dados da Triagem selecionada
    $rs = $triagem->listarTriagemId();

    // Array com os dados da triagem
    $linha = mysqli_fetch_array($rs, MYSQLI_ASSOC);
   
echo '
<div class="container">
    <legend>Atualizar Triagem</legend>
    <form action="index.php?pagina=processar_atualizacao_triagem.php&idAtendimento='.$linha['idAtendimento'].'&prioridade='.$linha['prioridade'].'&observacao='.$linha['Observacao'].'&HorarioProcedimento='.$linha['HorarioProcedimento'].'" method="post">
        <div class="form-inline ">
            <div class="col-lg-13">
            
                <label class="form-group">Id Atendimento</label>
                <input maxlength="12" style="width: 325px; margin-left: 6px;" type="text" name="idAtendimento" class="form-control" placeholder="Máximo 12 caracteres..." required value="'.$linha['idAtendimento'].'"><br/>

                <label class="form-group">Prioridade</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="prioridade" class="form-control" placeholder="Máximo 50 caracteres..." required value="'.$linha['prioridade'].'"><br/>

                <label class="form-group">Observação</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="Observacao" class="form-control" placeholder="Máximo 60 caracteres..." required value="'.$linha['Observacao'].'"><br/>

                <label class="form-group">Horario da Consulta</label>
                <input maxlength="50" style="width: 325px; margin-left: 6px;" type="text" name="HorarioProcedimento" class="form-control" placeholder="Máximo 60 caracteres..." required value="'.$linha['HorarioProcedimento'].'"><br/>

                <button style="width: 185p; margin-left: 107px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
';
?>