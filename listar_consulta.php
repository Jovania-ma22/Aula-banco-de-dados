<?php
    include 'class/Consulta.php';

    // Instancie a classe Consulta
    $consulta = new Consulta();

    // Execute a consulta listar consulta
    $listar = $consulta->listarConsulta();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Consultas Agendadas</h3>
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
                                    <th class="cabecalho">Data da Consulta</th>
                                    <th class="cabecalho">Hora da Consulta</th>
                                    <th class="cabecalho">Fim da Consulta</th>
                                    <th class="cabecalho">Valor R$</th>
                                    <th class="cabecalho">Id Paciente</th>
                                    <th class="cabecalho">Paciente</th>
                                    <th class="cabecalho">Cod Medico</th>
                                    <th class="cabecalho">Médico</th>
                                    <th class="cabecalho">Especialidade</th>
                                    <th class="cabecalho">Excluir</th>
                                    <th class="cabecalho">Editar</th>
                                </tr>
                            </thead>
                            <?php
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($listar, MYSQLI_ASSOC)) {

                                $consulta->setCodigo($linha['Codigo']);
                                $consulta->setDataConsulta($linha['dataConsulta']);
                                $consulta->setHoraConsulta($linha['horaConsulta']);
                                $consulta->setHoraFimConsulta($linha['horaFimConsulta']);
                                $consulta->setValorConsulta($linha['Valor']);
                                $consulta->setIdPacienteConsulta($linha['CPF']);
                                $consulta->setNomePacienteConsulta($linha['nome']);
                                $consulta->setIdMedicoConsulta($linha['CRM']);
                                $consulta->setNomeMedicoConsulta($linha['nome_medico']);
                                $consulta->setIdMedicoEspecialidadeConsulta($linha['descrição']);
                                

                                $alert = 'msgConfirmaDeleteConsulta('.$consulta->getCodigo().')';

                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$consulta->getCodigo().'</td>
                                        <td>'.$consulta->getDataConsulta().'</td>
                                        <td>'.$consulta->getHoraConsulta().'</td>
                                        <td>'.$consulta->getHoraFimConsulta().'</td>
                                        <td>'.$consulta->getValorConsulta().'</td>
                                        <td>'.$consulta->getIdPacienteConsulta().'</td>
                                        <td>'.$consulta->getNomePacienteConsulta().'</td>
                                        <td>'.$consulta->getIdMedicoConsulta().'</td>
                                        <td>'.$consulta->getNomeMedicoConsulta().'</td>
                                        <td>'.$consulta->getIdMedicoEspecialidadeConsulta().'</td>
                                        <td><a href="javascript:void(null);" onclick="'.$alert.'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                        <td><a href="index.php?pagina=atualizar_consulta.php&Codigo='.$consulta->getCodigo().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
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
