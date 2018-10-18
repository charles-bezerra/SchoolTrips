<?php
	$host = "arioliveira.com";
	$user = "ariolive_ifrn18";
	$senha = "ariolive_ifrn18";
	$database = "ariolive_t1g1";
	
	$comando = $_POST['comando'];	
	$id = $_POST['id'];

	$con = mysqli_connect($host,$user,$senha,$database) or die ('Não possível conectar ao banco de dados');
	if($comando == '1'){
		$update = "UPDATE Agendamento SET aprovacao = 'Aprovado' WHERE id = $id";
		mysqli_query($con,$update);
	}
	elseif($comando == 2){
		$update = "UPDATE Agendamento SET aprovacao = 'Reprovado' WHERE id = $id";
		mysqli_query($con,$update);
	}

	mysqli_close($con);
	echo "Operação feita com sucesso";
?>