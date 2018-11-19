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
  				Início
  			</a>
	</nav>
	<!-- End Header Area -->
  <div class="container" style="margin-top: 90px">
        

        <div class="row">
             <div class="col-md-3"></div>
             <div class="col-md-6">
                   <?php  if( isset($_SESSION['ErrorAdm']) ){
                       if($_SESSION['ErrorAdm'] != ""){ echo  "<div class='alert alert-danger' role='alert'>" . $_SESSION["ErrorAdm"] . "</div>"; } 
                   }?>
             </div>
             <div class="col-md-3"></div>
        </div>
       

        <form action="php/controllers.php" method="get">                    

                    <div class="caixa-form rounded z-depth-2">     
                        <div class="display-4 text-center">
                            <p>Administrador</p>          
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input required="required" type="number" class="form-control" placeholder="Código de Entrada" name="codigo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input required="required" type="Password" class="form-control" placeholder="Senha" name="senha">
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-12 text-center">
                                <button class="btn btn-success" type="submit">Começar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <a  class="btn btn-link" href="index.php">Página inicial</a>
                            </div>
                        </div>
                    </div>

        </form>
    </div>
    <br>
    <br>     
    <?php include "includes/footer.php"; ?>
</body>
</html>