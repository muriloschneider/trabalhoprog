<?php

require_once('../classe/autoload.class.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
if(empty($acao)){
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
}
$id = isset($_POST['id']) ? $_POST['id'] : 0;
if(empty($id)){
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
}

$nomecid = isset($_POST['nome']) ? $_POST['nome'] : "";
$cpfcid = isset($_POST['cpf']) ? $_POST['cpf'] : "";
$profissao = isset($_POST['profissao']) ? $_POST['profissao'] : "";
$renda = isset($_POST['renda']) ? $_POST['renda'] : "";
$raca = isset($_POST['raca']) ? $_POST['raca'] : "";

$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : "";
$nascimento = date('Y-m-d', strtotime($nascimento));

$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$ident = isset($_POST['entrevistador']) ? $_POST['entrevistador'] : "";
$idcid = isset($_POST['cidade']) ? $_POST['cidade'] : "";
$idcontato = isset($_POST['idcontato']) ? $_POST['idcontato'] : "";


echo    "Ação: $acao <br>". "Nome: $nomecid <br>". "Cpf: $cpfcid <br>". 
        "Profissao: $profissao <br>". "Renda: $renda <br>". "Raça: $raca <br>". 
        "Data de nascimento: $nascimento <br>". "Entrevistador: $ident <br>". 
        "Cidade: $idcid <br>";
        die();

    if ($acao == "Enviar"){ 

        $listar = Cidade::Listagem($tipo = 1, $info = $idcid);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $listar = Entrevistador::Listagem($tipo = 1, $info = $ident);

        $entrevistadorobj = new Entrevistador(  $listar[0]['identrevistador'],
                                                $listar[0]['nome_entrevistador'],
                                                $listar[0]['cpf'],$cidadeobj);

        $cidadaoobj = new Cidadao(  null,$nomecid,$cpfcid,$profissao,
                                    $renda,$raca,$nascimento,$entrevistadorobj,
                                    $cidadeobj,null,$telefone,$email);

        $final = $cidadaoobj->Salvar();

    }


    if ($acao == "Editar") {

        
        $listar = Cidade::Listagem($tipo = 1, $info = $idcid);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $listar = Entrevistador::Listagem($tipo = 1, $info = $ident);

        $entrevistadorobj = new Entrevistador(  $listar[0]['identrevistador'],
                                                $listar[0]['nome_entrevistador'],
                                                $listar[0]['cpf'],$cidadeobj);

        $cidadaoobj = new Cidadao($id,$nomecid,$cpfcid,$profissao,
                                    $renda,$raca,$nascimento,$entrevistadorobj,
                                    $cidadeobj,$idcontato,$telefone,$email);
        // echo '<pre>';
        //     var_dump($cidadaoobj);
        //     die();
        $final = $cidadaoobj->Editar();
    }


    if ($acao == "Excluir") {

        $listagem = Cidadao::Listagem(1,$id);

        $listar = Cidade::Listagem($tipo = 1, $info = $listagem[0]['cidade']);

        $cidadeobj = new Cidade($listar[0]['idcidade'],$listar[0]['nome_cidade'],
                                $listar[0]['estado']);

        $listar = Entrevistador::Listagem($tipo = 1, $info = $listagem[0]['entrevistador']);

        $entrevistadorobj = new Entrevistador(  $listar[0]['identrevistador'],
                                                $listar[0]['nome_entrevistador'],
                                                $listar[0]['cpf'],$cidadeobj);

        $listar = Cidadao::listagem(1,$id);

        $list = Contato::Listagem(2,$id);

        $cidadaoobj = new Cidadao($id,$listar[0]['nome'],$listar[0]['cpf'],$listar[0]['profissao'],
                                    $listar[0]['renda'],$listar[0]['raca'],$listar[0]['nascimento'],
                                    $entrevistadorobj,$cidadeobj,$list[0]['idcontato'],$list[0]['telefone'],
                                    $list[0]['email']);

        $final = $cidadaoobj->Excluir();
    }

    if ($final) {
        header("Location: ../index/cidadao.php");
    } else {
        echo "Erro";
    }
?>