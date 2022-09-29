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
    <title>IBGE - Cidades</title>

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
            <h2>Quem nós somos?</h2>
            </main>
            <main class="container1">
            <div class="fotos">
                <img src="../img/fotoUjj.jpg" alt="">
                <h5>Pedro Ujj</h5>
                <p>Desenvolvedor Front-End</p>
            </div>
            <div class="fotos">
                <img src="../img/fotoCelio.png" alt="">
                <h5>Célio Nogueira</h5>
                <p>Desenvolvedor Front-End</p>
            </div>
            <div class="fotos">
                <img src="../img/fotoJoao.jpg" alt="">
                <h5>João Espíndola</h5>
                <p>Desenvolvedor Front-End</p>
            </div>
            <div class="fotos">
                <img src="../img/fotoMurilo.jpg" alt="">
                <h5>Murilo Schneider</h5>
                <p>Desenvolvedor Front-End</p>
            </div>
        </main>
        </center>
        
        <br><br><br>
        <center>
        <br>
        <br>
        </center>
        
        <script src="../js/jQuery/jquery-3.5.1.min.js"></script>
        <script src="../js/ajax.js"></script>
</body>
</html>
