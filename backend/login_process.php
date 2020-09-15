<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
		require 'db_connect.php';
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username) || empty($password)){	
			header("Location: ../index.php?error=empty");
			exit();
		}
		else{
			$db = new DatabaseConnection();
			header("Location: ./../frontend/home.php");
			exit();
		}
	}
?>
