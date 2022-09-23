<?php

require_once('../classe/autoload.class.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
if(empty($acao)){
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
}

$nomecid = isset($_POST['nome']) ? $_POST['nome'] : "";
$cpfcid = isset($_POST['cpf']) ? $_POST['cpf'] : "";
$profissao = isset($_POST['profissao']) ? $_POST['profissao'] : "";
$renda = isset($_POST['renda']) ? $_POST['renda'] : "";
$raca = isset($_POST['raca']) ? $_POST['raca'] : "";
$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : "";
$nascimento = date('Y-m-d', strtotime($nascimento));
$ident = isset($_POST['entrevistador']) ? $_POST['entrevistador'] : "";
$idcid = isset($_POST['cidade']) ? $_POST['cidade'] : "";


// echo    "Ação: $acao <br>". "Nome: $nomecid <br>". "Cpf: $cpfcid <br>". 
//         "Profissao: $profissao <br>". "Renda: $renda <br>". "Raça: $raca <br>". 
//         "Data de nascimento: $nascimento <br>". "Entrevistador: $entrevistador <br>". 
//         "Cidade: $cidade <br>";

    if ($acao == "Enviar"){ 

        $listar = Cidade::Listar($tipo = 1, $info = $idcid);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $listar = Entrevistador::Listar($tipo = 1, $info = $ident);

        $entrevistadorobj = new Entrevistador(  $listar[0]['identrevistador'],
                                                $listar[0]['nome_entrevistador'],
                                                $listar[0]['cpf'],$cidadeobj);

        $cidadaoobj = new Cidadao(  null,$nomecid,$cpfcid,$profissao,
                                    $renda,$raca,$nascimento,$entrevistadorobj,
                                    $cidadeobj);

        $final = $cidadaoobj->Salvar();

    }

    if ($final) {
        echo "Cadastrado com sucesso!";
    }
    else {
        echo "Erro ao cadastrar!";
    }
