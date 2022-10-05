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

    $cont = Contato::Listagem($tipo = 2, $info = $id);
    
    // var_dump($cont);

    // die();

    $cid = Cidadao::Listagem($tipo = 1, $info = $id );

    
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
    <title>IBGE - Cidadao</title>

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
                    <li><a href="cidadao.php">Cidadão</a></li>
                    <li><a href="sobreNos.php">Sobre</a></li>
                </ul>
            </nav>
        </header>

        <center>
        <main class="container">
            <hr class="linha1">
            <h2>Cadastrar</h2>
    <form id='form-cidade' class="formsCidadao" action="../acao/acaoCid.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php if($acao=="Editar")echo $id; else echo ""; ?>">
        <input type="hidden" name="idcontato" id="idcontato" value="<?php if($acao=="Editar")echo $cont[0]['idcontato']; else echo ""; ?>">
        <div class="campoCidade">
            <label for="">Nome: </label> <br> <input type="text" name="nome" id="nome" value="<?php if($acao=="Editar")echo $cid[0]['nome']; else echo ""; ?>" placeholder="Insira o seu Nome">
        </div>
        <div class="campoEstado">
            <label for="">Cpf: </label> <br> <input type="text" onkeypress="$(this).mask('000.000.000-00');" maxlength="14" name="cpf" id="cpf" value="<?php if($acao=="Editar")echo $cid[0]['cpf']; else echo ""; ?>" placeholder="Insira o seu CPF">
        </div>
        <div class="campoEstado">
            <label for="">Profissao: </label> <br> <input type="text" name="profissao" id="profissao" value="<?php if($acao=="Editar")echo $cid[0]['profissao']; else echo ""; ?>" placeholder="Insira a sua Profissão">
        </div>
        <div class="campoEstado">
            <label for="">Renda: </label> <br> <input type="text" maxlength="13" name="renda" id="renda" value="<?php if($acao=="Editar")echo $cid[0]['renda']; else echo ""; ?>" placeholder="Insira a sua Renda">
        </div>
        <div class="campoEstado">
            <label for="">Raça: </label> <br> <input type="text" name="raca" id="raca" value="<?php if($acao=="Editar")echo $cid[0]['raca']; else echo ""; ?>" placeholder="Insira a sua Raça">
        </div>
        <div class="campoEstado">
            <label for="">Data de nascimento: </label> <br> <input type="date" name="nascimento" id="nascimento" value="<?php if($acao=="Editar")echo $cid[0]['nascimento']; else echo ""; ?>" placeholder="Insira a sua Data de Nascimento">
        </div>
        <div class="campoEstado">
            <label for="">Email: </label> <br> <input type="text" name="email" id="email" value="<?php if($acao=="Editar")echo $cont[0]['email']; else echo ""; ?>" placeholder="Insira o seu Email">
        </div>
        <div class="campoEstado">                                                            
            <label for="">Telefone: </label> <br> <input type="text" onkeypress="$(this).mask('+55 (00) 00000-0000');" maxlength="18" name="telefone" id="telefone" value="<?php if($acao=="Editar")echo $cont[0]['telefone']; else echo ""; ?>" placeholder="Insira o seu Telefone">
        </div>
        <div class="selectCidadao">    
            <label for="">Entrevistador: </label> <br>
            <select name="entrevistador" id="entrevistador">
            <?php
                echo ListarEntrevistador($cid[0]['entrevistador']);
            ?>
        </select>
        </div>
        <div class="selectCidadao2">
        <label for="">Sua cidade: </label> <br>
        <select name="cidade" id="cidade">
            <?php
                echo ListarCidade($cid[0]['cidade']);
            ?>
        </select>
        </div>
        <div class="entrarCidadao">
        <input type="submit" name="acao" value="<?php if($acao=="Editar")echo "Editar"; else echo "Enviar"; ?>">
        </div>
    </form>
    <hr class="linha2">
</main>
</center>

    <br><br><br>
    <center>
        <table class="tabelaCidadao">
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
                <th>Telefone</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <tbody id="resultado">

            </tbody>
            <?php
                ListarCidadao(2, "");
            ?>
        </table>
        <br>
        <br>
    </center>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>