<?php
    include 'class/Triagem.php';

    // Instancie a classe Triagem
    $triagem= new Triagem();

    // Execute a consulta listar Triagem
    $consulta = $triagem->listarTriagem();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Listagem de Triagem</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table cabecalho table-striped" >
                            <thead>
                                <tr>
                                    <th class="cabecalho">Id Atendimento</th>
                                    <th class="cabecalho">Prioridade</th>
                                    <th class="cabecalho">Observacao</th>
                                    <th class="cabecalho">Horario do Procedimento</th>
                                    <th class="cabecalho">Excluir</th>
                                    <th class="cabecalho">Editar</th>
                                </tr>
                            </thead>
                            <?php

                          
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

                                $triagem->setidAtendimento($linha['idAtendimento']);
                                $triagem->setPrioridade($linha['prioridade']);
                                $triagem->setObservacao($linha['Observacao']);
                                $triagem->setHorarioProcedimento($linha['HorarioProcedimento']);

                                $alert = 'msgConfirmaDeleteTriagem('.$triagem->getidAtendimento().')';

                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$triagem->getidAtendimento().'</td>
                                        <td>'.$triagem->getPrioridade().'</td>
                                        <td>'.$triagem->getObservacao().'</td>
                                        <td>'.$triagem->getHorarioProcedimento().'</td>
                                        <td><a href="javascript:void(null);" onclick="'.$alert.'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                        <td><a href="index.php?pagina=atualizar_triagem.php&idAtendimento='.$triagem->getidAtendimento().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
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
