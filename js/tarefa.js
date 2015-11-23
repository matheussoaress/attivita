$(document).ready(function () {

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

    $("#agendar").mask('99/99/9999');

    $("#agendar").datepicker({
        altField: "#actualDate",
        'format' : 'dd/mm/yyyy',
        'autoclose' : true,
        'language': 'pt-BR'
    });

    $.validator.messages.required = '';
    $("form#cadastra").validate({
        rules:{
            titulo:{
                required:true
            },
            duracao:{
                required:true
            },
            prioridade:{
                required:true
            },
            tarefa:{
                required:true
            }
        }
    });

    $("#lista").load("./view/tarefaLista.php");	
    $("#listaConcluida").load("./view/tarefaListaConcluida.php"); 

    $("#cadastrar").on('click', function(){
        if($("form#cadastra").valid()){
            var data = $("#cadastra").serializeArray();
            $.ajax({
                async: false,
                url: 'view/fCadastroTarefa.php',
                method:'post',
                dataType:'json',
                data: data,
                success: function ( retorno){
                    if( retorno.codigo == 1){
                        $("#lista").load("./view/tarefaLista.php"); 
                        $("#listaConcluida").load("./view/tarefaListaConcluida.php"); 
                        retornoSucesso(retorno.mensagem);
                        $("#inserir").modal('hide');
                    }else{
                        retornoErro(retorno.mensagem);
                        $("#inserir").modal('hide');
                    }
                },
                error: function ( retorno){
                    console.log(retorno);
                }
            });
        }
    });

    $("#modalDelegar").on('show.bs.modal', function(event){
        var id = event.relatedTarget.getAttribute('data-id');
        $("#delegaTarefa").val(id);
        var data = {};
        $.ajax({
            async: false,
            url: 'view/fDelegarTarefa.php',
            method:'get',
            dataType:'json',
            data: data,
            success: function ( retorno){
                if( retorno){
                    for (var i = 0; i < retorno.length; i++) {
                        $("#usuario").append("<option value='"+retorno[i].id+"'>"+retorno[i].nome+"</option>");
                    };
                }
            },
            error: function ( retorno){
                console.log(retorno);
            }
        });
    });
    $("#modalDelegar").on('hide.bs.modal', function(){
        $("#usuario").html("");
    }); 

    $("#modalStatus").on('show.bs.modal', function(event){
        var id = event.relatedTarget.getAttribute('data-id');
        $("#alteraTarefa").val(id);
        var data = {};
        $.ajax({
            async: false,
            url: 'view/fListarStatus.php',
            method:'get',
            dataType:'json',
            data: data,
            success: function ( retorno){
                if( retorno){
                    for (var i = 0; i < retorno.length; i++) {
                        $("#status").append("<option value='"+retorno[i].id+"'>"+retorno[i].nome+"</option>");
                    };
                }
            },
            error: function ( retorno){
                console.log(retorno);
            }
        });
    });

    $("#modalStatus").on('hide.bs.modal', function(){
        $("#status").html("");
    });

    $("#alterar").on('click', function(){
        var data = $("#altera").serializeArray();
        $.ajax({
            async: false,
            url: 'view/fListarStatus.php',
            method:'post',
            dataType:'json',
            data: data,
            success: function ( retorno){
                if( retorno.codigo >= 1 ){
                    $("#lista").load("./view/tarefaLista.php"); 
                    $("#listaConcluida").load("./view/tarefaListaConcluida.php"); 
                    retornoSucesso(retorno.mensagem);
                    $("#modalStatus").modal('hide');
                }else{
                    retornoErro(retorno.mensagem)
                    $("#modalStatus").modal('hide');
                }
            },
            error: function ( retorno){
                console.log(retorno);
            }
        });        
    });

    $("#delegar").on('click', function(){
        var data = $("#delega").serializeArray();
        $.ajax({
            async: false,
            url: 'view/fDelegarTarefa.php',
            method:'post',
            dataType:'json',
            data: data,
            success: function ( retorno){
                if( retorno.codigo == 1){
                    $("#lista").load("./view/tarefaLista.php"); 
                    retornoSucesso(retorno.mensagem);
                    $("#modalDelegar").modal('hide');
                }else{
                    retornoErro(retorno.mensagem)
                    $("#modalDelegar").modal('hide');
                }
            },
            error: function ( retorno){
                console.log(retorno);
            }
        });
    });

    $("#filtrar").on('click', function(){
        var where = $("#filtra").serialize();
        $("#lista").load("./view/tarefaLista.php?"+where);
        $("#modalFiltrar").modal('hide');
    });

    $("#filtrarConcluidas").on('click', function(){
        var where = $("#filtraConcluida").serialize();
        $("#listaConcluida").load("./view/tarefaListaConcluida.php?"+where);
        $("#modalFiltrarConcluida").modal('hide');
    });

    $("#sair").on("click", function (){
        var data = {};
        $.ajax({
            async: false,
            url: 'view/fSair.php',
            method:'post',
            dataType:'get',
            data: data,
            success: function ( retorno){
                window.location.assign('/attivita/');
            },
            error: function ( retorno){
                console.log(retorno);
            }
        });
    });

});