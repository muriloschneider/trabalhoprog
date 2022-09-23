<?php
    require_once('../classe/autoload.class.php');
    require_once('../utils/utilidades.php');

    $acao = $_GET['acao'];
    $id = $_GET['id'];

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
        <input type="hidden" name="id" id="id">
        <label for="">Nome: </label><input type="text" name="nome" id="nome">
        <label for="">Cpf: </label><input type="text" name="cpf" id="cpf">
        <label for="">Profissao: </label><input type="text" name="profissao" id="profissao"><br>
        <label for="">Renda: </label><input type="text" name="renda" id="renda">
        <label for="">Raça: </label><input type="text" name="raca" id="raca">
        <label for="">Data de nascimento</label><input type="date" name="nascimento" id="nascimento"><br>
        <label for="">Entrevistador: </label>
        <select name="entrevistador" id="entrevistador">
            <?php
                echo ListarEntrevistador(0);
            ?>
        </select>
        <label for="">Sua cidade: </label>
        <select name="cidade" id="cidade">
            <?php
                echo ListarCidade(0);
            ?>
        </select>
        <input type="submit" name="acao" value="Enviar">
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