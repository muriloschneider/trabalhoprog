<?php

    require_once('../classe/autoload.class.php');

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if(empty($acao)){
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    }
    $idcontato = isset($_POST['idcontato']) ? $_POST['idcontato'] : "";

    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "";
    
    $email = isset($_POST['email']) ? $_POST['email'] : "";

    $idcidadao = isset($_POST['idcidadao']) ? $_POST['idcidadao'] : "";

    // echo "Ação: " .$acao. " Nome: " .$nome. " Cpf: " .$cpf. " Cidade: " .$cidade. "<br>";

    if($acao == 'Enviar'){
        $listar = contato::Listagem($tipo = 1, $info = contato);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $contatoobj = new contato($listar[0]['idcontato'],$listar[0]['telefone'],
                                $listar[0]['email'], $listar[0]['idcidadao']);

        $cidadaoobj = new Cidadao(  null,$nomecid,$cpfcid,$profissao,
                                    $renda,$raca,$nascimento,$contatoobj,
                                    $cidadeobj);
                                
        $contato = new contato(null,$telefone, $email, $cidadaoobj);

        $final = $contato->Salvar();
    }



    else if ($acao == "Editar") {
        $listar = Cidade::Listagem($tipo = 1, $info = $cidade);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $entrevistador = new Entrevistador($id,$nome,$cpf,$cidadeobj);

        $final = $entrevistador->Editar();

    }

    else if ($acao == "Excluir") {
        $listar = contato::Listagem($tipo = 1, $info = $contato);

        $contatoobj = new contato($listar[0]['idcontato'],$listar[0]['telefone'],
                                $listar[0]['email'], $listar[0]['idcidadao']);

        $cidadao = cidadao::Listagem($tipo = 1, $info = $id);
        $cidadao = new cidadao($idcidadao,$nome, $cpf, $profissao, $renda, $raca, $nascimento, $entrevistador, $cidade);
        
        $final = $cidadao->Excluir();

    }

    // if ($final) {
    //     header("Location: ../index/index.php");
    // } else {
    //     echo "Erro";
    // }

?>