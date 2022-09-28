<?php
    require_once('../classe/autoload.class.php');
    require_once('../utils/utilidades.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/logoIBGE.png">
    <script src="../js/index.js"></script>
    <title>IBGE</title>

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
        $acao = isset($_POST['acao']) ? $_POST['acao'] : '';
        if (empty($acao)) {
            $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        }
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        if (empty($cidade)) {
            $cidade = isset($_GET['cidade']) ? $_GET['cidade'] : '';
        }
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        if (empty($estado)) {
            $estado = isset($_GET['estado']) ? $_GET['estado'] : '';
        }
        $id = isset($_GET['id']) ? $_GET['id'] : '';
    ?>

</head>
<body>

    <header>
            <a href="index.php"><img src="../img/logoIBGE.png" class="logo"></a>
            <h1 id="nav-title"><a href="index.php">ibge</a></h1>
            <nav>
                <ul>
                    <li><a href="#">Projetos</a></li>
                    <li><a href="#">Cadastrar</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </nav>
        </header>

        <center>
        <main class="container">
            <hr class="linha1">
            <h2>Cadastrar</h2>
            <form action="../acao/acao.php" class="forms" method="POST" id="form-cidade">
                <input type="hidden" name="id" value="<?php if(isset($id)){ echo $id;} else{ echo "";}?>">
                <div class="campoCidade">
                    <label>Nome da cidade</label> <br> <input type="text" value="<?php if(isset($cidade)){ echo $cidade;} else{ echo "";}?>" name="cidade" placeholder="Insira o nome da cidade">
                </div>
                <div class="campoEstado">
                    <label>Estado</label> <br> <input type="text" name="estado" id="estado" value="<?php if(isset($estado)){ echo $estado;} else{ echo "";}?>" placeholder="Insira o nome do estado">
                </div>
                <br>
                <div class="entrar">
                <input id="acao" type="submit" name="acao" value="<?php if($acao){echo $acao;} else{echo "Cadastrar";}?>">
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
                <th>Cidade</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
                Listar(0,"");
            ?>
        </table>
        </center>
</body>
</html>
