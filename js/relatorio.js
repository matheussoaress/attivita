$(document).ready(function () {

	$("#modalRelatorio").modal('show');

	$("#gerar").on('click', function(){
		var where = $("form#relatorio").serialize();
        $("#relat").load("./view/relatorioTabela.php?"+where);
        $("#modalRelatorio").modal('hide');
    });
});