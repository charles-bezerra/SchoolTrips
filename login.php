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
	
  <section style="margin-top: 58px">
      <div class="container">
            

            <div class="row">
                 <div class="col-md-3"></div>
                 <div class="col-md-6">
                       <?php  if( isset($_SESSION['Error']) ){
                           if($_SESSION['Error'] != ""){ echo  "<div class='alert alert-danger' role='alert'>" . $_SESSION["Error"] . "</div>"; } 
                       }?>
                 </div>
                 <div class="col-md-3"></div>
            </div>
           

            <form action="php/controllers.php" method="get">                    

                        <div class="caixa-form rounded z-depth-2">     
                            <div class="display-4 text-center">
                                <p>Faça login aqui</p>          
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required="required" type="number" class="form-control" placeholder="Matrícula" name="matricula">
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
                                    <a  class="btn btn-link" href="cadastro.php">Criar conta!</a>
                                </div>
                            </div>
                        </div>

            </form>
      	</div>
    </section>			
    
    <?php include "includes/footer.php" ?>
  	
</body>
</html>