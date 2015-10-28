function validaEntrada (form) {
	
}

$(document).ready(function(){
	$("#nascimento").datepicker({
		altField: "#actualDate",
		'format' : 'dd/mm/yy',
		'autoclose' : true,
		'language': 'pt-BR'
	});

	$("#entrar").on('click', function(){
		var d = $("form#login").serialize();
		console.log(d);
	});

});