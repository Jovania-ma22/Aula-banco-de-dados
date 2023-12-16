<?php
    include 'class/Consulta.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $dataConsulta = $_POST['dataConsulta'];
        $horaConsulta = $_POST['horaConsulta'];
        $horaFimConsulta = $_POST['horaFimConsulta'];
        $valorConsulta = $_POST['Valor'];
        $idPacienteConsulta = $_POST['CPF'];
        $idAtendimento = $_POST['idAtendimento'];
        $idMedicoConsulta = $_POST['CRM'];
        // Instancie a classe Consulta
        $consulta = new Consulta();

        // Setando o Id da Especialidade do Médico selecionado
        $idEspecialidade = $consulta->listarEspecialidadeMedicoId($idMedicoConsulta);
        $linha = mysqli_fetch_array($idEspecialidade, MYSQLI_ASSOC);
        $idMedicoEspecialidadeConsulta = $linha['especialidade_codigo'];

        // Atribua os valores do formulário na classe Consulta
        $consulta->setDataConsulta($dataConsulta);
        $consulta->setHoraConsulta($horaConsulta);
        $consulta->setHoraFimConsulta($horaFimConsulta);
        $consulta->setValorConsulta($valorConsulta);
        $consulta->setIdPacienteConsulta($idPacienteConsulta);
        $consulta->setIdTriagem($idAtendimento);
        $consulta->setIdMedicoConsulta($idMedicoConsulta);
        $consulta->setIdMedicoEspecialidadeConsulta($idMedicoEspecialidadeConsulta);
        $consulta->setCodigo($_GET['Codigo']);


        
        // DEBUG
        /*echo $consulta->getDataConsulta();
        echo "<br>";
        echo $consulta->getHoraConsulta();
        echo "<br>";
        echo $consulta->getValorConsulta();
        echo "<br>";
        echo $consulta->getIdMedicoConsulta();
        echo "<br>";
        echo $consulta->getIdPacienteConsulta();
        echo "<br>";
        echo $consulta->getObservacaoConsulta();
        echo "<br>";
        echo $consulta->getIdMedicoEspecialidadeConsulta();
        echo "<br>";
        echo $consulta->getIdConsulta();
        echo "<br>";
        exit();*/

        // Execute o método atualizar consulta
        $consulta->atualizarConsulta();
        if($consulta->getAtualizacaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Registro atualizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Consulta atualizada com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_consulta.php'
            ";
        } else {
            echo '
            <center>
                <div class="alert alert-danger" style="width: 455px;">
                    <strong>ERRO!</strong> Não foi possível atualizar o registro!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao atualizar consulta!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/Sysclinica/index.php?pagina=atualizar_consulta.php&Codigo={$consulta->getCodigo()}'
            ";
        }
    }
?>