$(document).ready(function(){

    $.validator.messages.required = '';
    $("form#novo").validate({
        onfocusout: true,
        onkeyup: true,
        rules:{
            nome:{
                required: true
            },
            email:{
                required: true
            },
            senha:{
                required: true
            },
            nova_senha:{
                required: true,
                equalTo: "#senha"
            }
        },
        // messages:{
        //     nome:{
        //         required: false
        //     },
        //     email:{
        //         required: false
        //     },
        //     senha:{
        //         required: false
        //     },
        //     nova_senha:{
        //         required: false,
        //         equalTo: "Senhas são diferentes"
        //     }
        // }
    });
    $("#nascimento").mask('00/00/0000');

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
        if ($("form#novo").valid()) {
            var data = $("form#novo").serializeArray();
            $.ajax({
                async: false,
                url: 'sys/view/fCadastro.php',
                method:'post',
                dataType:'json',
                data: data,
                success: function ( retorno){
                    if( retorno.result == 1){
                        $("#novo").modal('hide');
                        $("#nome").val('');
                        $("#nascimento").val('');
                        $("#email").val('');
                        $("#senha").val('');
                        $("#nova_senha").val('');
                        retornoSucesso("Sucesso ao cadastrar o usuário.")
                    }else{
                        $("#novo").modal('hide');
                        retornoErro("Impossivel cadastrar usuário no momento.");
                    }
                },
                error: function ( retorno){
                    console.log(retorno);
                }
            });
        };
    });
});