<?php
	$name_page = "Cadastrar-se";
  session_start();

  if(isset($_SESSION['request']))
  {
      if($_SESSION['request'] == "login")
      {
          $_SESSION['Error'] = ""; 
      }
  } 

  $_SESSION['type'] = "user";
  $_SESSION['request'] = "cadastro";

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
            <div class="rounded z-depth-2" style="padding: 20px">
            		<h1 class="display-4 m-3 text-center"  style="color:black">Crie seu cadastro aqui</h1>
                	<form action="php/controllers.php" method="get" style="width: 90%; margin-left: 5%">
                		<div class="form-group">
                			<div class="row">
                				<div class="col-6">
                          <label for="Nome">Nome</label>
                					<input type="text" class="form-control" required="required" placeholder="Nome completo" name="nome">
                				</div>
                				<div class="col-6">
                          <label for="Matricula">Matrícula</label>
                					<input type="number" class="form-control" required="required" placeholder="Matrícula" name="matricula">
                				</div>
                			</div>
                		</div>
                		<div class="form-group">    		
                			<div class="row">
                				<div class="col-12">
                          <label for="Email">Email</label>
                					<input type="email" class="form-control" required="required" placeholder="Email" name="email">
                  				</div>
                  			</div>
                  		</div>
                  		<div class="form-group">    		
                			<div class="row">
                				<div class="col-6">
                            <label for="Senha">Senha</label>
                  					<input type="Password" class="form-control" required="required" placeholder="Defina uma senha aqui" name="senha">
                  				</div>
                  				<div class="col-6">
                            <label for="Senha-c">Confirme a senha</label>
                  					<input type="Password" class="form-control"  placeholder="Confirme sua nova senha" name="senha-c">
                  				</div>
                  			</div>
                  		</div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="Campus">Campus</label>
                                <select class="form-control" id="exampleFormControlSelect1" placeholder="Campus" name="campus">
                                    <option>Apodi</option>
                                    <option>CNAT</option>
                                    <option>Caicó</option>
                                    <option>Canguaretama</option>
                                    <option>Ceará Mirim</option>
                                    <option>Currais Novos</option>
                                    <option>Macau</option>
                                    <option>Mossoró</option>
                                    <option>Ipanguaçu</option>
                                    <option>Parelhas</option>
                                    <option>Lajes</option>
                                    <option>João Câmara</option>
                                    <option>Parnamirim</option>
                                    <option>Santa Cruz</option>
                                    <option>São Gonsalo do Amarante</option>
                                    <option>São Paulo do Potengi</option>
                                    <option>Zona Norte</option>
                                </select>
                            </div>
                        </div>
                      </div>		
            			    <div class="text-center">
                         <div class="form-group">
                              <div class="row">
                                  <div class="col-12">
                                      <p style="color: red">
                                      <?php 
                                          if(isset($_SESSION['Error']))
                                          {
                                             echo $_SESSION["Error"]; 
                                          }
                                      ?></p>
                                  </div>
                              </div>
                              <button class="btn btn-outline-secondary" type="submit">Cadastrar</button><br/>
                  	          <a href="login.php">Entrar em sua conta</a>
                         </div>
                      </div>
                	</form>
              	</div>
            </div>
    </section>
    <?php include "includes/footer.php"; ?>

</body>
</html>