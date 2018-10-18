<?php 
    $name_page = "Entrar Adm"; 
    session_start();
    if(isset($_SESSION['request']))
    {
        if($_SESSION['request'] == "index")
        {
            $_SESSION['ErrorAdm'] = ""; 
        }
    } 
    
    if(isset($_SESSION['statusAdm'])){
      if ($_SESSION['statusAdm'] == 1) {
        header('location:Adm.php');
      }
    }
    

    $_SESSION['type'] = "adm";
    $_SESSION['request'] = "login";

?>
<!DOCTYPE html>
<html>
<?php include "includes/head.php" ?>
<body>
		<!-- Start Header Area -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:#4F4F4F">
  			<a class="navbar-brand" href="index.php">
  				<img  class="d-inline-block align-top" width="30" height="30" src="img/icon-bus.png" alt="">
  				Administrador
  			</a>
	</nav>
	<!-- End Header Area -->

	<div class="container text-center" style="margin-top: 90px">
		<h1 class="display-4 m-5"  style="color:black">Validar Credenciais</h1>
    	<form action="php/controllers.php" method="get" style="width: 40%; margin-left: 30%">
          <input required="required" type="number" class="form-control" placeholder="Código" name="codigo"><br/>
      		<input required="required" type="Password" class="form-control" placeholder="Senha" name="senha"><br/>
      		<button class="btn btn-success" type="submit">Entrar</button><br/>
          <p style="color: red">
          <?php 
              if(isset($_SESSION['ErrorAdm']))
              {
                  echo $_SESSION["ErrorAdm"]; 
              }
          ?><br/>
      	  <a href="index.php" style="color: #b30086;">Voltar</a>
      </form>
  	</div>

</body>
</html>>