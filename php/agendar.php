<?php

	$host = "arioliveira.com";
	$user = "ariolive_ifrn18";
	$pwd = "ariolive_ifrn18";
	$database = "ariolive_t1g1";

	session_start();
	$matricula = $_SESSION['matricula'];
	
	$onibus = $_POST['onibus'];
	$data_saida = $_POST['data_saida'];
	$quantidade_ocupantes = $_POST['quantidade_ocupantes'];
	$quantidade_dias = $_POST['quantidade_dias'];
	$aprovacao = $_POST['aprovacao'];
	$detalhes = $_POST['detalhes'];
	$destino = $_POST['destino'];

	$msg = "";

	if(intval($quantidade_ocupantes)>=45){
		$msg = $msg . "> Não foi possível fazer seu cadastro, pois o ônibus só possui 45 assentos.";
	}
	if(intval($quantidade_dias) > 5){
		$msg = $msg . "\n" . "> Não foi possível realizar o cadastro. Só é ofertado até 5 dias, por escassez de recursos!";
	}
	else{
		$insert =  "INSERT INTO Agendamento (cod_usuario,cod_onibus,data_saida,quantidade_dias,quantidade_ocupantes,aprovacao,detalhes,destino) VALUES ('$matricula',$onibus,'$data_saida',$quantidade_dias,$quantidade_ocupantes,'$aprovacao','$detalhes', '$destino')";

		$con = mysqli_connect($host,$user,$pwd,$database) or die ('Não possível conectar ao banco de dados');

		mysqli_query($con, $insert);
		mysqli_close($con);

		$msg = "Inserido com sucesso, agora espere a autorização de sua viagem!";
	}
	echo $msg;
?>