$('#submit_modal').click(function(){
	$.post( "/php/agendar.php" , {
		onibus: "1",					
		data_saida: $('input[name = data_saida]').val(),
		quantidade_ocupantes: $('input[name = quantidade_ocupantes').val(),
		quantidade_dias: $('input[name = quantidade_dias').val(),
		aprovacao: "Em processo",
		detalhes: $('textarea[name = detalhes]').val(),
		destino: $('input[name = destino]').val()
	}).done(function(data){
		alert(data);
	    window.location.reload();
	});	
});
$(document).ready(function(){
	$("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myTable tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	});
});