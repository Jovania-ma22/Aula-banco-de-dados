<?php
    include 'class/Exame.php';

    // Instancie a classe Exame
    $exame = new Exame();

    // Execute a consulta listar exame
    $consulta = $exame->listarExame();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Listagem de Exames</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table cabecalho table-striped" >
                            <thead>
                                <tr>
                                    <th class="cabecalho">Id do Exame</th>
                                    <th class="cabecalho">Status do Exame</th>
                                    <th class="cabecalho">Nome do Exame</th>
                                    <th class="cabecalho">Tipo</th>
                                    <th class="cabecalho">Codigo do Paciente</th>
                                    <th class="cabecalho">Excluir</th>
                                    <!--<th class="cabecalho">Editar</th>-->
                                </tr>
                            </thead>
                            <?php
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                $exame->setIdExame($linha['idExame']);
                                $exame->setStatusExame($linha['status']);
                                $exame->setNomeExame($linha['nome_exame']);
                                $exame->setTipoExame($linha['tipo']);
                                $exame->setIdPaciente($linha['FK_PACIENTE_CPF']);

                                $alert = 'msgConfirmaDeleteExame('.$exame->getIdExame().')';

                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$exame->getIdExame().'</td>
                                        <td>'.$exame->getStatusExame().'</td>
                                        <td>'.$exame->getNomeExame().'</td>
                                        <td>'.$exame->getTipoExame().'</td>
                                        <td>'.$exame->getIdPaciente().'</td>
                                        <td><a href="javascript:void(null);" onclick="'.$alert.'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                       
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
