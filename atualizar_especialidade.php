<?php
    include 'class/Especialidade.php';

    // Instancie a classe Especialidade
    $especialidade = new Especialidade();

    // Seta o id da Especialidade via GET
    $especialidade->setCodigo($_GET['codigo']);

    // Lista os dados da especialidade selecionada
    $rs = $especialidade->listarEspecialidadeId();

    // Array com os dados da especialidade
    $linha = mysqli_fetch_array($rs, MYSQLI_ASSOC);
   
echo '
<div class="container">
    <legend>Atualizar Especialidade</legend>
    <form action="index.php?pagina=processar_atualizacao_especialidade.php&codigo='.$linha['codigo'].'&descrição='.$linha['descrição'].'&tipo='.$linha['tipo'].'" method="post">
        <div class="form-inline ">
            <div class="col-lg-13">
            
                <label class="form-group">Codigo</label>
                <input maxlength="60" style="width: 325px; margin-left: 6px;" type="text" name="codigo" class="form-control" placeholder="Máximo 60 caracteres..." required value="'.$linha['codigo'].'"><br/>

                <label class="form-group">Descrição</label>
                <input maxlength="60" style="width: 325px; margin-left: 6px;" type="text" name="descrição" class="form-control" placeholder="Máximo 60 caracteres..." required value="'.$linha['descrição'].'"><br/>

                <label class="form-group">Tipo</label>
                <input maxlength="60" style="width: 325px; margin-left: 6px;" type="text" name="tipo" class="form-control" placeholder="Máximo 60 caracteres..." required value="'.$linha['tipo'].'"><br/>

                <button style="width: 185p; margin-left: 107px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
';
?>