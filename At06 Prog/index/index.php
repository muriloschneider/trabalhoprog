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

    <?php
        $acao = isset($_POST['acao']) ? $_POST['acao'] : '';
        if (empty($acao)) {
            $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        }
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        
        if($acao == 'Editar')
            $lista = Cidade::Listagem(1,$id);
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
                    <li class="sobreNos"><a href="sobreNos.php">Sobre</a></li>
                </ul>
            </nav>
        </header>

        <center>
        <main class="container">
            <hr class="linha1">
            <h2>Cadastrar</h2>
            <form id='form-cidade' class="forms" method="POST" >
                <input type="hidden" id="id" name="id" value="<?php if(isset($lista)){ echo $lista[0]['idcidade'];} else{ echo "";}?>">
                <div class="campoCidade">
                    <label>Nome da cidade</label> <br> <input type="text" id="cidade" value="<?php if(isset($lista)){ echo $lista[0]['nome_cidade'];} else{ echo "";}?>" name="cidade" placeholder="Insira o nome da cidade">
                </div>
                <div class="campoEstado">
                    <label>Estado</label> <br> <input type="text" name="estado" id="estado" value="<?php if(isset($lista)){ echo $lista[0]['estado'];} else{ echo "";}?>" placeholder="Insira o nome do estado">
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
            <tbody id="resultado">

            </tbody>
        </table>
        <br>
        <br>
        </center>
        
        <script src="../js/jQuery/jquery-3.5.1.min.js"></script>
        <script src="../js/ajax.js"></script>
</body>
</html>
