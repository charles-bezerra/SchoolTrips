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

		<section id="agendamentos">
			<div class="container">
					<div class="row" style="margin-bottom: 20px">
						<div class="col-8">
							 <h4 style="color:black"><i class="fa fa-calendar-o fa-1x" aria-hidden="true"></i> Viagens confirmadas desse mês</h4>
						</div>
			
						<?php
							if($name_page == "index" and isset($_SESSION['status']))
							{
								if($_SESSION['status'] == 1){
									echo "
										<div class='col-4'  align='right'> 
											<button class='btn btn-success my-2 my-sm-0' data-toggle='modal' data-target='#exampleModal'>
												<i class='fa fa-plus' aria-hidden='true'></i>
											</button>
										</div>";
								}
							}
						?>
			
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped table-dark rounded z-depth-3">
							  <thead>
							    <tr>
									<th>Solicitante</th>
									<th>Data de Saída</th>
									<th>N° de Pessageiros</th>
									<th>Ônibus</th>
									<th>Destino</th>
							    </tr>
							  </thead>
							  <tbody>
							  		<?php include "php/listar.php"; ?>
							  </tbody>
							</table>
						</div>
					</div>
					<?php include "includes/modal.php"; ?>
			</div>	
		</section>


		<?php include "includes/footer.php"; ?>

</body>
	<script type="text/javascript" src="js/demoIndex.js"></script>
</html>