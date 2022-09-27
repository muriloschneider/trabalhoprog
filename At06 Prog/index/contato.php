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
    <title>contato</title>
    <?php
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        if(empty($acao)){
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }
        $idcontato = isset($_POST['idcontato']) ? $_POST['idcontato'] : 0;
        if(empty($idcontato)){
            $idcontato = isset($_GET['idcontato']) ? $_GET['idcontato'] : 0;
        }
        $telefone = isset($_POST['te$telefone']) ? $_POST['te$telefone'] : 0;
        if(empty($telefone)){
            $telefone = isset($_GET['te$telefone']) ? $_GET['te$telefone'] : 0;
        }
        $email = isset($_POST['email']) ? $_POST['email'] : 0;
        if(empty($email)){
            $email = isset($_GET['email']) ? $_GET['email'] : 0;
        }
        $cidadaoobj = isset($_POST['ci$cidadaoobj']) ? $_POST['ci$cidadaoobj'] : 0;
        if(empty($cidadaoobj)){
            $cidadaoobj = isset($_GET['ci$cidadaoobj']) ? $_GET['ci$cidadaoobj'] : 0;
        }

        $cont = contato::Listar($idcontato, $telefone, $email, $cidadaoobj);

    ?>
</head>
<body>
    <form action="../acao/acaoCont.php" method="post">
        <input type="hidden" name="id" value="<?php if($acao=="Editar")echo $id; else echo ""; ?>">
        <label for="">Telefone: </label><input type="text" name="telefone" id="telefone" value="<?php if($acao=="Editar")echo $ent[0]['nome_entrevistador']; else echo ""; ?>">
        <label for="">email: </label> <input type="text" name="email" id="email" value="<?php if($acao=="Editar")echo $ent[0]['cpf']; else echo ""; ?>">
        <select name="idCid">
            <?php
               echo ListarContato($cont[0]['idcontato']);
            ?>
        </select>
        <input type="submit" name="acao" value="">
    </form>
    <center>
        <table border="1px">
            <tr>
                <th>Id</th>
                <th>telefone</th>
                <th>email</th>
                <th>Cidadao</th>
                
            </tr>

            <?php
                ListarContato(0, "");
            ?>
        </table>
    </center>

</body>
</html>