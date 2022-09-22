<?php
    function Listar($tipo, $info){
            $lista = Cidade::Listar($tipo,$info);
            foreach ($lista as $item) {
            echo "
            <tr>
                <td>".$item['idcidade']."</td>
                <td>".$item['nome_cidade']."</td>
                <td>".$item['estado']."</td>
                <td><a href='index.php?acao=Editar&id=".$item['idcidade']."&cidade=".$item['nome_cidade']."&estado=".$item['estado']."'>Editar</a></td>
                <td><a href='../acao/acao.php?acao=Excluir&id=".$item['idcidade']."'>Excluir</a></td>
            </tr>";
        }
    }
?>