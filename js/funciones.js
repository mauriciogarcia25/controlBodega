$(document).ready(function(){
	validaLogin();
});

function validaLogin(){
	$.post(
		base_url+"controlador/validaLogin",{},
			function(pagina, datos){
				$("#contenedor").html(pagina,datos);
			}
	);
}