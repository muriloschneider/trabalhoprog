<?php

    require_once('../classe/autoload.class.php');

    header('Content-Type: application/json');

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if(empty($acao)){
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    }

    $nomeCid = isset($_POST['cidade']) ? $_POST['cidade'] : "";
    
    $estado = isset($_POST['estado']) ? $_POST['estado'] : "";

    $id = isset($_POST['id']) ? $_POST['id'] : "";
    if(empty($id)){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    }

    if($acao == "Enviar"){
        $cidade = new Cidade(null,$nomeCid, $estado);
        $final = $cidade->Salvar();
        if($final==0){
            $final = true;
        }
    }



    else if ($acao == "Editar") {

        $cidade = new Cidade($id,$nomeCid, $estado);
        $final = $cidade->Editar();
        if($final == 0){
            $final = true;
        } 

    }

    
    else if ($acao == "Excluir") {

        
        $cidade = Cidade::Listagem($tipo = 1, $info = $id);
        $cidade = new Cidade($id,$cidade[0]['nome_cidade'], $cidade[0]['estado']);
        $final = $cidade->Excluir();
        if($final==0){
            $excluir = 'Excluir';
        }



    }
    if ($final) {
       echo json_encode('Salvo');
    } 
    else if($excluir == 'Excluir'){
        header('Location: ../index/index.php');
    }
    else {
        echo json_encode("Erro");
    }

?>