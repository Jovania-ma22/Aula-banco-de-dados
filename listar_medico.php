<?php
    include 'class/Medico.php';

    // Instancie a classe Medico
    $medico = new Medico();

    // Execute a consulta listar medico
    $consulta = $medico->listarMedico();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Listagem de Médicos</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table cabecalho table-striped" >
                            <thead>
                                <tr>
                                    <th class="cabecalho">CRM</th>
                                    <th class="cabecalho">Nome</th>
                                    <th class="cabecalho">Data de Nascimento</th>
                                    <th class="cabecalho">Contato</th>
                                    <th class="cabecalho">Id Especialidade</th>
                                    <th class="cabecalho">Especialidade</th>
                                    <th class="cabecalho">Excluir</th>
                                    <th class="cabecalho">Editar</th>
                                </tr>
                            </thead>
                            <?php
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

                                $medico->setCrmMedico($linha['CRM']);
                                $medico->setNomeMedico($linha['nome_medico']);
                                $medico->setDataNascimentoMedico($linha['dataNasc']);
                                $medico->setContato($linha['contato']);
                                $medico->setIdMedicoEspecialidade($linha['especialidade_codigo']);
                                $medico->setDescricaoMedicoEspecialidade($linha['descrição']);
                                
                                

                                $alert = 'msgConfirmaDeleteMedico('.$medico->getCrmMedico(['CRM']).')';

                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$medico->getCrmMedico().'</td>
                                        <td>'.$medico->getNomeMedico().'</td>
                                        <td>'.$medico->getDataNascimentoMedico().'</td>
                                        <td>'.$medico->getContato().'</td>
                                        <td>'.$medico->getIdMedicoEspecialidade().'</td>
                                        <td>'.$medico->getDescricaoMedicoEspecialidade().'</td>
                                        
                                        
                                        <td><a href="javascript:void(null);" onclick="'.$alert.'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                        <td><a href="index.php?pagina=atualizar_medico.php&CRM='.$medico->getCrmMedico().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
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
