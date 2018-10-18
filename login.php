<?php 
    $name_page = "Entrar"; 
    session_start();
    if(isset($_SESSION['request']))
    {
        if($_SESSION['request'] == "cadastro")
        {
            $_SESSION['Error'] = ""; 
        }
    } 
    
    $_SESSION['type'] = "user";
    $_SESSION['request'] = "login";
    

    if(isset($_SESSION['status']))
    { 
        if($_SESSION['status'] == 1)
        {
            header("location:index.php");
        } 
    }
?>
<!DOCTYPE html>
<html>
<?php include "includes/head.php" ?>
<body>
	<?php include "includes/header.php"; ?>
	<div class="container text-center" style="margin-top: 90px">
		<h1 class="display-4 m-5"  style="color:black">Faça login aqui</h1>
    	<form action="php/controllers.php" method="get" style="width: 40%; margin-left: 30%">
          <input required="required" type="number" class="form-control" placeholder="Matrícula" name="matricula"><br/>
      		<input required="required" type="Password" class="form-control" placeholder="Senha" name="senha"><br/>
      		<button class="btn btn-success" type="submit">Entrar</button><br/>
          <p style="color: red">
          <?php 
              if(isset($_SESSION['Error']))
              {
                  echo $_SESSION["Error"]; 
              }
          ?><br/>
      		<a href="cadastro.php" style="color: #b30086;">Não tem conta? Crie uma aqui!</a>
      </form>
  	</div>			
  	

</body>
</html>