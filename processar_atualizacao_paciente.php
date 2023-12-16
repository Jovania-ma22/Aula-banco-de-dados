<?php
    include 'class/Paciente.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $cpfPaciente = $_POST['CPF'];
        $nomePaciente = $_POST['nome'];
        $telefonePaciente = $_POST['telefone'];
        $alturaPaciente = $_POST['altura'];
        $pesoPaciente = $_POST['peso'];
        $cidadePaciente = $_POST['cidade'];
        $ufPaciente = $_POST['uf'];
        $dataNascimentoPaciente = $_POST['DataNasc'];
        $enderecoPaciente = $_POST['endereco'];
        $emailPaciente = $_POST['email'];
        
        
        // Instancie a classe Paciente
        $paciente = new Paciente();

        // Atribua os valores do formulário na classe Paciente
        $paciente->setCpf($cpfPaciente);
        $paciente->setNomePaciente($nomePaciente);
        $paciente->setTelefonePaciente($telefonePaciente);
        $paciente->setAlturaPaciente($alturaPaciente);
        $paciente->setPesoPaciente($pesoPaciente);
        // IMC
        $imcPaciente = $paciente->calculaImcPaciente();
        $paciente->setImc($imcPaciente);
        $paciente->setCidadePaciente($cidadePaciente);
        $paciente->setUfPaciente($ufPaciente);
        $paciente->setDataNascimentoPaciente($dataNascimentoPaciente);
        $paciente->setEnderecoPaciente($enderecoPaciente);
        $paciente->setEmailPaciente($emailPaciente);
        
        
         $paciente->setCpf($_GET['CPF']);

        
         // Execute o método atualizar paciente
        $paciente->atualizarPaciente();
        if($paciente->getAtualizacaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Registro atualizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Paciente atualizado com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_paciente.php'
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
            alert(\"Erro ao atualizar paciente!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=atualizar_paciente.php&CPF={$paciente->getCpf()}'
            ";
        }
    }
?>