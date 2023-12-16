<?php
    include 'class/Paciente.php';

    // Instancie a classe Paciente
    $paciente = new Paciente();

    // Execute a consulta listar paciente
    $consulta = $paciente->listarPaciente();
?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Listagem de Pacientes</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table cabecalho table-striped" >
                            <thead>
                                <tr>
                                    <th class="cabecalho">Cpf</th>
                                    <th class="cabecalho">Nome</th>
                                    <th class="cabecalho">telefone</th>
                                    <th class="cabecalho">altura</th>
                                    <th class="cabecalho">peso_paciente</th>
                                    <th class="cabecalho">imc</th>
                                    <th class="cabecalho">cidade</th>
                                    <th class="cabecalho">uf</th>
                                    <th class="cabecalho">Data nascimento</th>
                                    <th class="cabecalho">endereco</th>
                                    <th class="cabecalho">email</th>
                                    <!--<th class="cabecalho">Excluir</th>-->
                                    <th class="cabecalho">Editar</th>
                                </tr>
                            </thead>
                            <?php
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

                                $paciente->setCpf($linha['CPF']);
                                $paciente->setNomePaciente($linha['nome']);
                                $paciente->setTelefonePaciente($linha['telefone']);
                                $paciente->setAlturaPaciente($linha['altura']);
                                $paciente->setPesoPaciente($linha['peso']);
                                $paciente->setImc($linha['imc']);
                                $paciente->setCidadePaciente($linha['cidade']);
                                $paciente->setUfPaciente($linha['uf']);
                                $paciente->setDataNascimentoPaciente($linha['DataNasc']);
                                $paciente->setEnderecoPaciente($linha['endereco']);
                                $paciente->setEmailPaciente($linha['email']);
                                
                                
                                

                                $alert='msgConfirmaDeletePaciente('.$paciente->getCpf().')';
                                
                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$paciente->getCpf().'</td>
                                        <td>'.$paciente->getNomePaciente().'</td>
                                        <td>'.$paciente->getTelefonePaciente().'</td>
                                        <td>'.$paciente->getAlturaPaciente().'</td>
                                        <td>'.$paciente->getPesoPaciente().'</td>
                                        <td>'.$paciente->getImc().'</td>
                                        <td>'.$paciente->getCidadePaciente().'</td>
                                        <td>'.$paciente->getUfPaciente().'</td>
                                        <td>'.$paciente->getDataNascimentoPaciente().'</td>
                                        <td>'.$paciente->getEnderecoPaciente().'</td>
                                        <td>'.$paciente->getEmailPaciente().'</td>
                                        <!--<td><a href="javascript:void(null);" onclick="'.$alert.'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>-->
                                        <td><a href="index.php?pagina=atualizar_paciente.php&CPF='.$paciente->getCpf().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
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
