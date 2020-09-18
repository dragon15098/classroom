<?php
	if(isset($_POST['Email']) 
		&& isset($_POST['PhoneNumber']) 
		&& isset($_POST['Username']) 
		&& isset($_POST['Password']) 
		&& isset($_POST['Name']) 
		&& isset($_POST['UserId'])
		&& isset($_POST['VerifyPassword'])){

		require 'db_connect.php';
		
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$verify_password = $_POST['VerifyPassword'];
		$phone_number = $_POST['PhoneNumber'];
		$name = $_POST['Name'];
		$email = $_POST['Email'];
		$id = $_POST['UserId'];
		if(empty($username) || empty($password) || empty($name)){	
			header("Location: ./../frontend/user_detail.php?id=".$id);
			exit();
		}
		else if ($password !== $verify_password){
			header("Location: ./../frontend/user_detail.php?id=".$id);
			exit();
		}
		else{
			$db = new DatabaseConnection();
			$sql = "UPDATE user SET Username = ?, Password = ?, Name = ?, Email = ?, PhoneNumber = ? WHERE UserId = ?;";
			$result = $db->getStatusQuerry($sql, "sssssd", 
				$username, 
				password_hash($password, PASSWORD_DEFAULT),
				$name,
				$email,
				$phone_number,
				$id 
			);
			echo $result;
			if($result === true){
				header("Location: ./../frontend/user_detail.php?id=".$id);
				exit();
			}
			else{
				header("Location: ./../frontend/user_detail.php?id=".$id);
				exit();
			}
		}
	}
	else {
			header("Location: ./../frontend/home.php");
			exit();
	}
?>