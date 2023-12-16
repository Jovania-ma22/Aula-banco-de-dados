<?php
    include 'class/Especialidade.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $codigoEspecialidade = $_POST['codigo'];
        $descricaoEspecialidade = $_POST['descrição'];
        $tipoEspecialidade = $_POST['tipo'];

        // Instancie a classe Especialidade
        $especialidade = new Especialidade();

        // Atribua os valores do formulário na classe Especialidade
        $especialidade->setCodigo($codigoEspecialidade);
        $especialidade->setCodigo($_GET['codigo']);
        $especialidade->setDescricao($descricaoEspecialidade);
        $especialidade->setTipo($tipoEspecialidade);
        
        

        // Execute o método atualizar especialidade
        $especialidade->atualizarEspecialidade();
        if($especialidade->getAtualizacaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Registro atualizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Especialidade atualizada com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=listar_especialidade.php'
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
            alert(\"Erro ao atualizar especialidade!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/SysClinica/index.php?pagina=atualizar_especialidade.php&codigo={$especialidade->getCodigo()}'
            ";
        }
    }
