<?php
	session_start();
	unset($_SESSION['type']);
  	unset($_SESSION['request']);
  	unset($_SESSION['nome']);
	unset($_SESSION['matricula']);
	unset($_SESSION['email']);
	unset($_SESSION['campus']);
	unset($_SESSION['Error']);
	unset($_SESSION['status']);
	header('location:../');
?>