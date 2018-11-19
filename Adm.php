<?php
	session_start();
	$name_page = "Adm";
	$_SESSION['type'] = "Adm";
  	$_SESSION['request'] = "Adm";
	if(isset($_SESSION['statusAdm'])){
		if ($_SESSION == 0) {
			$_SESSION['ErrorAdm'] = "Vocé precisa se logar primeiro!";
			header('location:loginAdm.php');
		}
	}
	else{
		$_SESSION['ErrorAdm'] = "Vocé precisa se logar primeiro!";
		header('location:loginAdm.php');
	}
?>

<!DOCTYPE html>
<html>
		<?php include "includes/head.php" ?>
		<body style="background-color: ##F8F8FF">
				<?php include "includes/header.php" ?>
				<div class="container" style="margin-top: 80px">
					<div class="row" style="margin-bottom: 18px">
						<div class="col-12">
							<h3 style="color:black"><i class="fa fa-calendar-o" aria-hidden="true"></i> Agendamentos <span style="color: #DAA520">Pendentes</span></h3>
						</div>
					</div>

					<div class="row">
				        <div class="table-responsive col-md-12">
				        <table id="sort2" class="grid table table-bordered table-sortable" style="background-color: white;padding: 10px; box-shadow: 2.5px 5px 9px #888888;">
				            <thead>	
				                <tr>
				                	<th>Servidor</th><th>Data de saída</th><th>N° de pessoas</th><th>N° dias</th><th>Ônibus</th><th>Destino</th><th>Autorizar?</th>
				                </tr>
				            </thead>
				            <tbody style="font-size: 80%">
				                <?php include "php/listar.php" ?>
				            </tbody>
				        </table>
				        </div>
				    </div>
				</div>
		</body>

		<script type="text/javascript" src="js/demoAdm.js"></script>
		<?php include "includes/footer.php"; ?>

		
</html>