<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>IBGE</title>

    <style>
        @font-face {
            font-family: "amoux";
            src: url(fonts/AMOÜX.ttf);
        }

        @font-face {
            font-family: "rocket";
            src: url(fonts/ROCKET.ttf);
        }

        @font-face {
            font-family: "maves";
            src: url(fonts/Maves-Regular.ttf);
        }
    </style>

</head>
<body>

    <header>
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
            <form action="" class="forms">
                <div class="campoNome">
                    <label>Nome</label> <br> <input type="text" name="sla" placeholder="Insira alguma coisa">
                </div>
                <div class="campoCPF">
                    <label>CPF</label> <br> <input type="text" name="sla" placeholder="Insira seu CPF">
                </div>
                <div class="campoSenha">
                    <label>Senha</label> <br> <input type="password" name="sla2" placeholder="Insira uma senha">
                </div>
                <br>
                <div class="entrar">
                <input type="submit" value="Cadastrar">
                </div>
            </form>
            <hr class="linha2">
        </main>
        </center>   

</body>
</html>
