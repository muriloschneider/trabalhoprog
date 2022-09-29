<?php
    require_once('../classe/autoload.class.php');
    require_once('../utils/utilidades.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/logoIBGE.png">
    <script src="../js/index.js"></script>
    <title>IBGE - Contato</title>

    <style>
        @font-face {
            font-family: "amoux";
            src: url(../fonts/AMOÜX.ttf);
        }

        @font-face {
            font-family: "rocket";
            src: url(../fonts/ROCKET.ttf);
        }

        @font-face {
            font-family: "maves";
            src: url(../fonts/Maves-Regular.ttf);
        }
    </style>

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

    <header>
            <a href="index.php"><img src="../img/logoIBGE.png" class="logo"></a>
            <h1 id="nav-title"><a href="index.php">ibge</a></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Cidades</a></li>
                    <li><a href="entrevistador.php">Entrevistador</a></li>
                    <li><a href="contato.php">Contato</a></li>
                    <li><a href="cidadao.php">Cidadão</a></li>
                    <li><a href="sobreNos.php">Sobre</a></li>
                </ul>
            </nav>
        </header>

<center>
<main class="container">
    <hr class="linha1">
    <h2>Cadastrar</h2>
    <form id='form-cidade' class="forms" action="../acao/acaoCont.php" method="post">
        <input type="hidden" name="id" value="<?php if($acao=="Editar")echo $id; else echo ""; ?>">
        <div class="campoCidade">
            <label for="">Telefone: </label> <br> <input type="text" name="telefone" id="telefone" value="<?php if($acao=="Editar")echo $ent[0]['nome_entrevistador']; else echo ""; ?>">
        </div>
        <div class="campoEstado">
            <label for="">email: </label> <br> <input type="text" name="email" id="email" value="<?php if($acao=="Editar")echo $ent[0]['cpf']; else echo ""; ?>">
        </div>
        <select name="idCid">
            <?php
               echo ListarContato($cont[0]['idcontato']);
            ?>
        </select>
        <div class="entrar">
            <input type="submit" name="acao" value="">
        </div>
    </form>
    <hr class="linha2">
</main>
</center>

    <br><br><br>
    <center>
        <table>
            <tr>
                <th>Id</th>
                <th>telefone</th>
                <th>email</th>
                <th>Cidadao</th>
                
            </tr>
            <tbody id="resultado">

            </tbody>
            <?php
                ListarContato(0, "");
            ?>
        </table>
        <br>
        <br>
    </center>
    <script src="../js/jQuery/jquery-3.5.1.min.js"></script>
    <script src="../js/ajax.js"></script>
</body>
</html>