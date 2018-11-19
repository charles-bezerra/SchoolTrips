<?php
	
	
	$host = "arioliveira.com";
	$user = "ariolive_ifrn18";
	$pwd = "ariolive_ifrn18";
	$database = "ariolive_t1g1";

	$con = mysqli_connect($host,$user,$pwd,$database) or die ('Não possível conectar ao banco de dados');
	$mes = date('m');
	$ano = date('Y');

	if($name_page == "index"){
		 $query = "SELECT u.nome, u.matricula, a.data_saida, a.quantidade_ocupantes, o.marca, o.placa, a.destino FROM Usuario AS u, Agendamento AS a, Onibus AS o WHERE a.cod_usuario = u.matricula AND a.cod_onibus = o.id AND a.aprovacao = 'Aprovado' AND  a.data_saida LIKE '" . $ano . "-" . $mes . "%' GROUP BY u.nome, a.data_saida ORDER BY STR_TO_DATE(data_saida,'%d-%m-%Y') DESC";
		 
		 $result = mysqli_query($con,$query);
		 
		 while($row = mysqli_fetch_array($result, MYSQLI_NUM))
		 {
		 	if(mysqli_num_rows($result) > 0){
				echo " <tr>
					      <td scope='row'>" . $row[0] . " (" . $row[1] . ")</td>
					      <td id='data_table'>" . str_replace("-", "/", $row[2]) . "</td>
					      <td>" . $row[3] . "</td>
					      <td>" . $row[4] . " (" . $row[5] . " )</td>
					      <td>" . $row[6] . "</td>
					    </tr>
				";
			}
		 }
	}
	elseif($name_page == "Adm"){
		
		$query = "SELECT u.nome, u.matricula, a.data_saida, a.quantidade_ocupantes, a.quantidade_dias, o.marca, o.placa, a.destino, a.id FROM Usuario AS u, Agendamento AS a, Onibus AS o WHERE a.cod_usuario = u.matricula AND a.cod_onibus = o.id AND a.aprovacao = 'Em processo' GROUP BY u.nome, a.data_saida ORDER BY STR_TO_DATE(data_saida,'%d-%m-%Y') DESC";

		$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_array($result, MYSQLI_NUM))
		{
			if(mysqli_num_rows($result) > 0){
				echo " <tr>
					      <td scope='row'>" . $row[0] . " (" . $row[1] . ")</td>
					      <td>" . str_replace("-", "/", $row[2]) . "</td>
					      <td>" . $row[3] . "</td> 
					      <td>" . $row[4] . "</td>
					      <td>" . $row[5] . " (" . $row[6] . ") </td> 
					      <td>" . $row[7] . "</td>
					      <td>
					      	<div class='row'>
					      		<div class='col-5'>	
						      		<button class='btn btn-success' onclick='autorizar(" . $row[8] . ");' >Sim</button>
						      	</div>
						      	<div class='col-3'>
			                    	<button class='btn btn-danger' onclick='recuzar(" . $row[8] . ");'>Não</button>
			                    </div>
		                  	</div>
		                  </td>
					    </tr>";
			}
		}
	}
	mysqli_close($con);
?>