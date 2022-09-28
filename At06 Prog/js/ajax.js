$('#form-cidade').submit(function(e){
    e.preventDefault();
    var id = $('#id').val();
    var cidade = $('#cidade').val();
    var estado = $('#estado').val();
    var acao = 'Cadastrar';

    $.ajax({
        url: '../acao/acao.php',
        method: 'POST',
        data: {acao: acao, id: id, cidade: cidade, estado: estado},
        dataType: 'JSON'
    }).done(function(result){
        $('#id').val('');
        $('#cidade').val('');
        $('#estado').val('');
        getCidade();
    });
});

function getCidade(){
    $.ajax({
        url: '../acao/select.php',
        method: 'GET',
        dataType: `JSON`    
    }).done(function(result){
        var resultado = document.querySelector('#resultado');
                while(resultado.firstChild){
                    resultado.firstChild.remove();
                }
        for (var i = 0; i < result.length; i++) {
            $('#resultado').prepend('<tr><td>'+result[i].idcidade+'</td><td>'+result[i].nome_cidade+'</td><td>'+result[i].estado+'</td><td><a href="index.php?acao=Editar&id='+result[i].idcidade+'">Editar</a></td><td><a href="../acao/acao.php?acao=Excluir&id='+result[i].idcidade+'">Excluir</a></td></tr>');
        }
        // console.log(result);
        // console.log('Chegou aqui');
    });
}

getCidade();