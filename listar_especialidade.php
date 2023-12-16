<?php
    include 'class/Especialidade.php';

    // Instancie a classe Especialidade
    $especialidade = new Especialidade();

    // Execute a consulta listar especialidade
    $consulta = $especialidade->listarEspecialidade();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Listagem de Especialidades</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table cabecalho table-striped" >
                            <thead>
                                <tr>
                                    <th class="cabecalho">Codigo</th>
                                    <th class="cabecalho">Descrição</th>
                                    <th class="cabecalho">Tipo</th>
                                    <th class="cabecalho">Excluir</th>
                                    <th class="cabecalho">Editar</th>
                                </tr>
                            </thead>
                            <?php
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

                                $especialidade->setCodigo($linha['codigo']);
                                $especialidade->setDescricao($linha['descrição']);
                                $especialidade->setTipo($linha['tipo']);

                                $alert = 'msgConfirmaDeleteEspecialidade('.$especialidade->getCodigo().')';

                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$especialidade->getCodigo().'</td>
                                        <td>'.$especialidade->getDescricao().'</td>
                                        <td>'.$especialidade->getTipo().'</td>
                                        <td><a href="javascript:void(null);" onclick="'.$alert.'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                        <td><a href="index.php?pagina=atualizar_especialidade.php&codigo='.$especialidade->getCodigo().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
                                    </tr>
                                </tbody>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
