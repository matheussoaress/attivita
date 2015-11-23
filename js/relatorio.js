$(document).ready(function () {

	$("#modalRelatorio").modal('show');

	$("#gerar").on('click', function(){
		var where = $("form#relatorio").serialize();
        $("#relat").load("./view/relatorioTabela.php?"+where);
        $("#modalRelatorio").modal('hide');
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