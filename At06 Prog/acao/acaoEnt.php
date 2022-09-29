<?php

    require_once('../classe/autoload.class.php');

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if(empty($acao)){
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    }
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";

    $cidade = isset($_POST['idCid']) ? $_POST['idCid'] : "";

    echo "Ação: " .$acao. " Nome: " .$nome. " Cpf: " .$cpf. " Cidade: " .$cidade. "<br>";

    if($acao == 'Cadastrar'){
        $listar = Cidade::Listagem($tipo = 1, $info = $cidade); 

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);
        
        var_dump($cidadeobj);

        $entrevistador = new Entrevistador(null,$nome, $cpf, $cidadeobj);

        $final = $entrevistador->Salvar();
    }



    else if ($acao == "Editar") {
        $listar = Cidade::Listagem($tipo = 1, $info = $cidade);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $entrevistador = new Entrevistador($id,$nome,$cpf,$cidadeobj);

        $final = $entrevistador->Editar();

    }

    else if ($acao == "Excluir") {
        $listar = Cidade::Listagem($tipo = 1, $info = $cidade);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $entrevistador = Entrevistador::Listagem($tipo = 1, $info = $id);

        $entrevistador = new Entrevistador($id,$entrevistador[0]['cpf'], $entrevistador[0]['estado'], $cidadeobj);
        
        $final = $entrevistador->Excluir();

    }

    if ($final) {
        header("Location: ../index/entrevistador.php");
    } else {
        echo "Erro";
    }

?>