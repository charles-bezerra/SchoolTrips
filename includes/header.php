	<!-- Start Header Area -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:#4F4F4F">
  			<a class="navbar-brand" href="index.php">
  				<img  class="d-inline-block align-top" width="30" height="30" src="img/icon-bus.png" alt="">
  				SchoolTrips
  			</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link"  href="#home">Ajuda</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link"  href="#functionalities">Sobre</a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  href="#speaker">Equipe</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<?php
						if($name_page == "index" and isset($_SESSION['status']))
						{
							if($_SESSION['status'] == 1)
      						{	
      							echo "<a class='nav-link mr-sm-2' style='color:white'>".$_SESSION['nome']."</a>";
      							echo "<a class='nav-link mr-sm-2' href='php/sair.php' style='color: red'>Sair</a>";
      						}
      						else
      						{
      							echo "<a class='nav-link mr-sm-2' href='login.php' style='color: white'>Entrar</a>";
      							echo "<a class='nav-link mr-sm-2' href='cadastro.php' style='color: white'>Cadastrar-se</a>";
      						}
      			}
      			elseif ($name_page == "Entrar"){
         						echo "<a class='nav-link mr-sm-2' href='cadastro.php' style='color: white'>Cadastrar-se</a>";
      			}
      			elseif ($name_page == "Cadastrar-se"){
								    echo "<a class='nav-link mr-sm-2' href='login.php' style='color: white'>Entrar</a>";
      			}
      			elseif($name_page == "index")
      			{
      					echo "<a class='nav-link mr-sm-2' href='login.php' style='color: white'>Entrar</a>";
      					echo "<a class='nav-link mr-sm-2' href='cadastro.php' style='color: white'>Cadastrar-se</a>";
      			}
            elseif($name_page == 'Adm'){
                echo "<a style='color: white'>Administrador</a>";
                echo "<a class='nav-link' style='color: red' href='php/sairAdm.php'>Sair
                </a>";
            }
      	  ?>
    			</form>
    			<!-- Modal -->
			</div>
	</nav>
	<!-- End Header Area -->