<?php 
	$name_page = "index";
	session_start();
	$_SESSION['type'] = "user";
  	$_SESSION['request'] = "index";
  	if(isset($_SESSION['Error'])){ $_SESSION['Error'] = ""; }
	if(isset($_SESSION['ErrorAdm'])){ $_SESSION['ErrorAdm'] = ""; }
?>
<!DOCTYPE html>
<html>
	<?php include "includes/head.php" ?>
	
	<body>	
		<?php include "includes/header.php"; ?>

		<div class="container" style="margin-top: 80px">
			
			<div class="row" style="margin-bottom: 20px">
				<div class="col-8">
					<h3 style="color:black">Agendamentos deste mês</h3>
				</div>
				<?php
					if($name_page == "index" and isset($_SESSION['status']))
					{
						if($_SESSION['status'] == 1){
							echo "<div class='col-4'  align='right'>
									<button class='btn btn-success my-2 my-sm-0' data-toggle='modal' data-target='#exampleModal'>Agendar</button>
						 		 </div>";
						}
					}
				?>
			</div>
			<div class="row">
				<div class="table-responsive col-md-12">
					<table class="grid table table-bordered table-sortable" style="box-shadow: 2.5px 5px 9px #888888;">
					  <thead>
					    <tr>
					      <th>Solicitante</th>
					      <th>Data de Saída</th>
					      <th>N° de Pessageiros</th>
					      <th>Ônibus</th>
					      <th>Destino</th>
					    </tr>
					  </thead>
					  <tbody id="myTable" style="font-size: 85%">
					  		<?php include "php/listar.php"; ?>
					  </tbody>
					</table>
				</div>
			</div>
  
		</div>

		<?php include "includes/modal.php"; ?>

	</div>


	<?php include "includes/footer.php" ?>
	</body>
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/demoIndex.js">

	</script>
</html>