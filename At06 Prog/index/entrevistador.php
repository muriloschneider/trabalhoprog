<?php
    require_once('../classe/autoload.class.php');
    require_once('../utils/utilidades.php');;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrevistador</title>
    <?php
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        if(empty($acao)){
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if(empty($id)){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
        }

        $ent = Entrevistador::Listagem(1,$id);

    ?>
</head>
<body>
    <form action="../acao/acaoEnt.php" method="post">
        <input type="hidden" name="id" value="<?php if($acao=="Editar")echo $id; else echo ""; ?>">
        <label for="">Nome entrevistador: </label><input type="text" name="nome" id="nome" value="<?php if($acao=="Editar")echo $ent[0]['nome_entrevistador']; else echo ""; ?>">
        <label for="">Cpf: </label> <input type="text" name="cpf" id="cpf" value="<?php if($acao=="Editar")echo $ent[0]['cpf']; else echo ""; ?>">
        <select name="idCid">
            <?php
               echo ListarCidade($ent[0]['cidade']);
            ?>
        </select>
        <input type="submit" name="acao" value="<?php if($acao=="Editar")echo "Editar"; else echo "Enviar"; ?>">
    </form>
    <center>
        <table border="1px">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Cpf</th>
                <th>Cidade</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php
                ListarEnt(0, "");
            ?>
        </table>
    </center>

</body>
</html>