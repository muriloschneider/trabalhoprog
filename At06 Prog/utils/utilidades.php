<?php
    function Listar($tipo, $info){
            $lista = Cidade::Listagem($tipo,$info);
            foreach ($lista as $item) {
            echo "
            <tr>
                <td>".$item['idcidade']."</td>
                <td>".$item['nome_cidade']."</td>
                <td>".$item['estado']."</td>
                <td><a href='index.php?acao=Editar&id=".$item['idcidade']."&cidade=".$item['nome_cidade']."&estado=".$item['estado']."'><img src='../img/pencil-square.svg' alt=''></a></td>
                <td><a href='../acao/acao.php?acao=Excluir&id=".$item['idcidade']."'><img src='../img/trash-fill.svg' alt=''></a></td>
            </tr>";
        }
    }

    function ListarCidadao($tipo, $info){
        $lista = Cidadao::Listagem($tipo,$info);
        foreach ($lista as $item) {
        echo "
        <tr>
            <td>".$item['idcidadao']."</td>
            <td>".$item['nome']."</td>
            <td>".$item['cpf']."</td>
            <td>".$item['profissao']."</td>
            <td>".$item['renda']."</td>
            <td>".$item['raca']."</td>
            <td>".$item['nascimento']."</td>
            <td>".$item['entrevistador']."</td>
            <td>".$item['cidade']."</td>
            <td><a href='cidadao.php?acao=Editar&id=".$item['idcidadao']."'><img src='../img/pencil-square.svg' alt=''></a></td>
            <td><a href='../acao/acaoCid.php?acao=Excluir&id=".$item['idcidadao']."'><img src='../img/trash-fill.svg' alt=''></a></td>
        </tr>";
    }
}

function ListarEnt($tipo, $info){
    $lista = Entrevistador::Listagem($tipo,$info);
    foreach ($lista as $item) {
    echo "
    <tr>
        <td>".$item['identrevistador']."</td>
        <td>".$item['nome_entrevistador']."</td>
        <td>".$item['cpf']."</td>
        <td>".$item['cidade']."</td>
        <td><a href='entrevistador.php?acao=Editar&id=".$item['identrevistador']."'><img src='../img/pencil-square.svg' alt=''></a></td>
        <td><a href='../acao/acao.php?acao=Excluir&id=".$item['identrevistador']."'><img src='../img/trash-fill.svg' alt=''></a></td>
    </tr>";
}
}

function ListarContato($tipo, $info){
    $lista = Contato::Listagem($tipo,$info);
    foreach ($lista as $item) {
    echo "
    <tr>
        <td>".$item['idcontato']."</td>
        <td>".$item['telefone']."</td>
        <td>".$item['email']."</td>
        <td>".$item['idcidadao']."</td>
        <td><a href='contato.php?acao=Editar&id=".$item['idcontato']."'><img src='../img/pencil-square.svg' alt=''></a></td>
        <td><a href='../acao/acao.php?acao=Excluir&id=".$item['idcontato']."'><img src='../img/trash-fill.svg' alt=''></a></td>
    </tr>";
}
}

    function Exibir($chave, $dado, $selecao = 0){
        $str = "<option value=0>Selecione</option>";
        $check="";
        foreach($dado as $linha){
            if($selecao > 0 && $linha[$chave[0]] == $selecao){
                $check = "selected";
            }
            $str .= "<option ".$check." value='".$linha[$chave[0]]."'>Nome: ".$linha[$chave[1]]."</option>";
            $check = "";
        }
        return $str;
    }

    function ListarEntrevistador($selecao){
        $lista = Entrevistador::Listagem();
        var_dump($lista);
        return Exibir(array('identrevistador','nome_entrevistador'),$lista, $selecao);
    }

    function ListarCidade($selecao){
        $lista = Cidade::Listagem();
        var_dump($lista);
        return Exibir(array('idcidade','nome_cidade'),$lista, $selecao);
    }

    
?>