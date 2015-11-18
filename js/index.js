function validaEntrada (form) {
	
}

$(document).ready(function(){
    var retornoSucesso = function(mensagem) {
        //$('.alert').remove();
        $('#conteudo-mensagem span').html(mensagem);
        $('#conteudo-mensagem').show(500);
        $('#conteudo-mensagem').removeClass("hidden");
        $('#conteudo-mensagem').removeClass("alert-danger").addClass("alert-info");
        setTimeout(function(){
            $('#conteudo-mensagem').hide(500);
        },4000);
    };
    
    var retornoErro = function(mensagem) {    
        //$('.alert').remove();
        $('#conteudo-mensagem span').html(mensagem);
        $('#conteudo-mensagem').show(500);
        $('#conteudo-mensagem').removeClass("alert-info").addClass("alert-danger");
        setTimeout(function(){
            $('#conteudo-mensagem').hide(500);
        },5000);
    };

    $("#nascimento").datepicker({
        altField: "#actualDate",
        'format' : 'dd/mm/yyyy',
        'autoclose' : true,
        'language': 'pt-BR'
    });

    $("#entrar").on('click', function(){
        var data = $("form#login").serializeArray();
        $.ajax({
            async: false,
            url: 'sys/view/fLogin.php',
            method:'post',
            dataType:'json',
            data: data,
            success: function ( retorno){
                if( retorno.result == 1){
                    window.location.assign('http://localhost/attivita/sys/tarefa.php');
                }else{
                    retornoErro("Usuário ou senha incorretos ou inexistêntes");
                }
            },
            error: function ( retorno){
                console.log(retorno);
            }
        });
    });
    $("#cadastrar").on('click', function (){
        var data = $("form#novo").serializeArray();
        $.ajax({
            async: false,
            url: 'sys/view/fCadastro.php',
            method:'post',
            dataType:'html',
            data: data,
            success: function ( retorno){
                if( retorno.result == 1){
                    retornoSucesso("Sucesso ao cadastrar o usuário.")
                }else{
                    retornoErro("Impossivel cadastrar usuário no momento.");
                }
            },
            error: function ( retorno){
                console.log(retorno);
            }
        });
    });
});