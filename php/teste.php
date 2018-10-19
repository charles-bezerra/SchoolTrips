<?php

	$host = "arioliveira.com";
	$user = "ariolive_ifrn18";
	$pwd = "ariolive_ifrn18";
	$database = "ariolive_t1g1";

	$matricula = $_GET['matricula'];
	$senha = $_GET['senha'];
	$connect = mysqli_connect($host, $user,$pwd, $database) or die("Não foi possivel conectar ao banco de dados");
	$query = mysqli_query($connect, "SELECT * FROM Usuario as u WHERE u.matricula = $matricula or u.senha = '$senha'");
	echo mysqli_num_rows($query);
?>