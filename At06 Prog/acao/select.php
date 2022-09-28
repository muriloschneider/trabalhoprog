<?php
    require_once('../classe/autoload.class.php');

    header('Content-Type: application/json');
    $cidade = Cidade::Listagem(0,'');

        if ($cidade) {
            echo json_encode($cidade);
        }else{
            echo json_encode('Sem registros');
        }

    // var_dump($cidade);

?>