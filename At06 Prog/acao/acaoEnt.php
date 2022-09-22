<?php

    require_once('../classe/autoload.class.php');

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if(empty($acao)){
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    }

    $nomeEnt = isset($_POST['nome_entrevistador']) ? $_POST['nome_entrevistador'] : "";
    
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";

    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "";

    $identrevistador = isset($_POST['identrevistador']) ? $_POST['identrevistador'] : "";
    if(empty($identrevistador)){
        $identrevistador = isset($_GET['identrevistador']) ? $_GET['identrevistador'] : "";
    }

    

    if($acao == 'Cadastrar'){

        $entrevistador = new Entrevistador(null,$nomeEnt, $cpf, $cidade);
        $final = $entrevistador->Salvar();
    }



    if ($acao == "Editar") {
        $entrevistador = new Entrevistador($identrevistador,$nomeEnt,$cpf,$cidade);
        $final = $entrevistador->Editar();

    }

    if ($acao == "Excluir") {

        $entrevistador = Entrevistador::Listar($tipo = 1, $info = $id);
        $entrevistador = new Entrevistador($id,$entrevistador[0]['nome_Entrevistador'], $entrevistador[0]['estado']);
        $final = $entrevistador->Excluir();

    }

    if ($final) {
        header("Location: ../index/index.php");
    } else {
        echo "Erro";
    }

?>