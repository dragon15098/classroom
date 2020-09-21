<?php
	if(isset($_POST['email']) 
		&& isset($_POST['phoneNumber']) 
		&& isset($_POST['username']) 
		&& isset($_POST['password']) 
		&& isset($_POST['name']) 
		&& isset($_POST['userId'])
		&& isset($_POST['verifyPassword'])){

		require 'db_connect.php';
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$verify_password = $_POST['verifyPassword'];
		$phone_number = $_POST['phoneNumber'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$id = $_POST['userId'];
		if(empty($username) || empty($password) || empty($name)){	
			header("Location: ./../frontend/user_detail.php?id=".$id ."&error=missing_attr");
			exit();
		}
		else if ($password !== $verify_password){
			header("Location: ./../frontend/user_detail.php?id=".$id ."&error=verify_password_not_match");
			exit();
		}
		else{
			$db = new DatabaseConnection();
			$sql = "UPDATE user SET username = ?, password = ?, name = ?, email = ?, phoneNumber = ? WHERE userId = ?;";
			$result = $db->getStatusQuerry($sql, "sssssd", 
				$username, 
				password_hash($password, PASSWORD_DEFAULT),
				$name,
				$email,
				$phone_number,
				$id 
			);
			if($result === true){
				header("Location: ./../frontend/user_detail.php?id=".$id);
				exit();
			}
			else{
				header("Location: ./../frontend/user_detail.php?id=".$id."&error=error");
				exit();
			}
		}
	}
	else {
		header("Location: ./../frontend/user_detail.php?id=".$id ."&error=missing_attr");
		exit();
	}
?>