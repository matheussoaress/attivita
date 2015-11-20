$(document).ready(function () {
    $("#agendar").datepicker({
        altField: "#actualDate",
        'format' : 'dd/mm/yy',
        'autoclose' : true,
        'language': 'pt-BR'
    });

    $("#lista").load("./view/tarefaLista.php");	
});