function autorizar(id) {
	$.post("/php/permissao.php", {
		'comando': 1,
		'id': id
	}).done(function(data){
		alert(data);
	    window.location.reload();
	});	
}
function recuzar(id) {
	$.post("/php/permissao.php", {
		'comando': 2,
		'id': id
	}).done(function(data){
		alert(data);
        window.location.reload();
    });
}	