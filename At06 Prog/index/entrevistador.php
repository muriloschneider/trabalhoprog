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
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/logoIBGE.png">
    <script src="../js/index.js"></script>
    <title>IBGE - Entrevistador</title>

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
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if(empty($id)){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
        }

        $ent = Entrevistador::Listagem(1,$id);

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
            <form id='form-cidade' class="forms" action="../acao/acaoEnt.php" method="post">
                <input type="hidden" name="id" value="<?php if($acao=="Editar")echo $id; else echo ""; ?>">
                <div class="campoCidade">
                    <label for="">Nome entrevistador: </label> <br> <input type="text" name="nome" id="nome" value="<?php if($acao=="Editar")echo $ent[0]['nome_entrevistador']; else echo ""; ?>" placeholder="Insira do seu Nome">
                </div>
                <div class="campoEstado">
                    <label for="">Cpf: </label> <br> <input type="text" name="cpf" id="cpf" value="<?php if($acao=="Editar")echo $ent[0]['cpf']; else echo ""; ?>" placeholder="Insira o seu CPF">
                </div>
                <div class="selectCid">
                    <label for="">Cidade:</label> <br>
                <select name="idCid">
                    <?php
                    echo ListarCidade($ent[0]['cidade']);
                    ?>
                </select>
                </div>
                <div class="entrar">
                    <input type="submit" name="acao" value="<?php if($acao=="Editar")echo "Editar"; else echo "Cadastrar"; ?>">
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
                <th>Nome</th>
                <th>Cpf</th>
                <th>Cidade</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <tbody id="resultado">

            </tbody>

            <?php
                ListarEnt(0, "");
            ?>
        </table>
    <br>
    <br>
    </center>
</body>
</html>