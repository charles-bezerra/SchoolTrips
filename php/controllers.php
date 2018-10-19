<?php
	class ControllerUser
	{
		protected $connect;
		protected $select_user1 = "";
		protected $select_user2 = "";
		protected $nome, $matricula, $senha, $email, $campus;
		
		protected $host = "arioliveira.com";
		protected $user = "ariolive_ifrn18";
		protected $pwd = "ariolive_ifrn18";
		protected $database = "ariolive_t1g1";

		public function __construct($matricula, $senha, $nome = "", $email = "", $campus = "")
		{
			$this->nome = $nome;
			$this->matricula = $matricula;
			$this->senha = $senha;
			$this->email = $email;
			$this->campus = $campus;

			$this->select_user1 = "SELECT * FROM Usuario AS u WHERE u.matricula = '$matricula' AND u.senha = '$senha'";
			$this->select_user2 = "SELECT * FROM Usuario AS u WHERE u.matricula = '$matricula' OR u.nome = '$nome' OR u.senha = '$senha' ";

			$this->connect = mysqli_connect($this->host,$this->user,$this->pwd,$this->database) or die("Não foi possivel conectar ao banco de dados"); 
		}
		public function valid()
		{
			$query = mysqli_query($this->connect, $this->select_user1);
			if(mysqli_num_rows($query) > 0)
			{
				$array = mysqli_fetch_array($query);
				$this->nome = $array['nome'];
				$this->email = $array['senha'];
				$this->campus = $array['campus'];
				return 1;
			}
			else
			{
				return 0;
			}
		}
		public function valid_exist()
		{
			$query1 = mysqli_query($this->connect, $this->select_user2);
			if(mysqli_num_rows($query1) > 0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		public function create()
		{
			$insert = "INSERT INTO Usuario VALUES ('$this->matricula', '$this->senha', '$this->nome', '$this->email', '$this->campus')";
			mysqli_query($this->connect, $insert);
			echo "Cadastrou!!";
		}
		public function close_connect()
		{
			mysqli_close($this->connect);
			return 1;
		}
		public function getNome()
		{
			return $this->nome;
		}
		public function getMatricula()
		{
			return $this->matricula;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getCampus()
		{
			return $this->campus;
		}
	}
	class ControllerAdmin
	{
		public $nome, $matricula;

		public function valid($matricula, $senha)
		{
			$connect = mysqli_connect($this->host,$this->user,$this->pwd,$this->database) or die("Não foi possivel conectar ao banco de dados"); 
			$select = "SELECT * FROM Administrador AS a WHERE a.matricula = '$matricula' AND a.senha = '$senha'";
			$query = mysqli_query($connect, $select);
			if(mysqli_num_rows($query) > 0)
			{
				$array = mysqli_fetch_array($query);
				$this->nome = $array['nome'];
				$this->matricula = $array['matricula'];
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	session_start();

	if(isset($_SESSION['type']) and isset($_SESSION['request']))
	{
		if($_SESSION['type'] == 'user')
		{
			if($_SESSION['request'] == 'login')
			{
				$matricula = $_GET['matricula'];
				$senha = $_GET['senha'];
				$controller = new ControllerUser($matricula, $senha);
				if($controller->valid() == 1)
				{
					$_SESSION['nome'] = $controller->getNome();
					$_SESSION['matricula'] = $controller->getMatricula();
					$_SESSION['email'] = $controller->getEmail();
					$_SESSION['campus'] = $controller->getCampus();
					$_SESSION['Error'] = "";
					$_SESSION['status'] = 1;

					$controller->close_connect();
					header("location: ../");
				}
				else
				{
					$_SESSION['status'] = 0;
					$_SESSION['Error'] = "Senha ou matricula está incorreto!";
					
					$controller->close_connect();
					header("location: ../login.php");
				}
			}
			else if($_SESSION['request'] == 'cadastro')
			{
				$nome = $_GET['nome'];
				$matricula = $_GET['matricula'];
				$senha = $_GET['senha'];
				$email = $_GET['email'];
				$campus = $_GET['campus'];
				$controller = new ControllerUser($matricula, $senha, $nome, $email, $campus);
				if($controller->valid_exist() == 0)
				{
					$controller->create();
					$_SESSION['nome'] = $nome;
					$_SESSION['matricula'] = $matricula;
					$_SESSION['email'] = $email;
					$_SESSION['campus'] = $campus;
					$_SESSION['Error'] = "";
					$_SESSION['status'] = 1;
					
					$controller->close_connect();
					header("location: ../");
				}
				else
				{
					$_SESSION['status'] = 0;
					$_SESSION['Error'] = "Usuario já existente!";
					$controller->close_connect();

					header("location: ../cadastro.php");
				}
			}
		}
		elseif($_SESSION['type'] == 'adm') {
			$controller = new ControllerAdmin();
			$matricula = $_GET['codigo'];
			$senha = $_GET['senha'];
			
			if ($controller->valid($matricula,$senha) == 1) {
				$_SESSION['matriculaAdm'] = $controller->matricula;
				$_SESSION['statusAdm'] = 1;
				header('location:../Adm.php');
			}
			else
			{
				$_SESSION['ErrorAdm'] = 'Informações incorretas!';
				header('location:../loginAdm.php');
			}
		}
	}
	else
	{
		header("location:../");
	}
?>