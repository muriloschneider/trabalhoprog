<?php
    require_once('../classe/autoload.class.php');
    require_once('../utils/utilidades.php');

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if(empty($acao)){
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    }

    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    if(empty($id)){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
    }
    $cid = Cidadao::Listagem($tipo = 1, $info = $id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidadao</title>
</head>
<body>
    <form action="../acao/acaoCid.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php if($acao=="Editar")echo $id; else echo ""; ?>">
        <label for="">Nome: </label><input type="text" name="nome" id="nome" value="<?php if($acao=="Editar")echo $cid[0]['nome']; else echo ""; ?>">
        <label for="">Cpf: </label><input type="text" name="cpf" id="cpf" value="<?php if($acao=="Editar")echo $cid[0]['cpf']; else echo ""; ?>">
        <label for="">Profissao: </label><input type="text" name="profissao" id="profissao" value="<?php if($acao=="Editar")echo $cid[0]['profissao']; else echo ""; ?>"><br>
        <label for="">Renda: </label><input type="text" name="renda" id="renda" value="<?php if($acao=="Editar")echo $cid[0]['renda']; else echo ""; ?>">
        <label for="">Raça: </label><input type="text" name="raca" id="raca" value="<?php if($acao=="Editar")echo $cid[0]['raca']; else echo ""; ?>">
        <label for="">Data de nascimento: </label><input type="date" name="nascimento" id="nascimento" value="<?php if($acao=="Editar")echo $cid[0]['nascimento']; else echo ""; ?>"><br>
        <label for="">Entrevistador: </label>
        <select name="entrevistador" id="entrevistador">
            <?php
                echo ListarEntrevistador($cid[0]['entrevistador']);
            ?>
        </select>
        <label for="">Sua cidade: </label>
        <select name="cidade" id="cidade">
            <?php
                echo ListarCidade($cid[0]['cidade']);
            ?>
        </select>
        <input type="submit" name="acao" value="<?php if($acao=="Editar")echo "Editar"; else echo "Enviar"; ?>"" >
    </form>
    <center>
        <table border="1px">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Cpf</th>
                <th>Profissao</th>
                <th>Renda</th>
                <th>Raça</th>
                <th>Data de nascimento</th>
                <th>Entrevistador</th>
                <th>Cidade</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php
                ListarCidadao(0, "");
            ?>
        </table>
    </center>
</body>
</html>