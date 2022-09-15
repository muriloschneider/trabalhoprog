<?php

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

    $acao;

    if(empty($acao)){
        $acao = isset($_GET['acao']) ? $_POST['acao'] : "";
    }

    $nome = isset($_POST['cidade']) ? $_POST['cidade'] : "";
    
    $estado = isset($_POST['estado']) ? $_POST['estado'] : "";

    if($acao == 'Cadastrar'){
        echo "Ação: " .$acao. " - Nome: " .$nome. " - Estado: " .$estado;
    }
    

?>