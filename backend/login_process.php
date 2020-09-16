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
			$sql = "SELECT * FROM user WHERE Username = ?;";
			$result = $db->prepareQuery($sql, "s", $username);

			if($result->num_rows != 1){
				header("Location: ../index.php?error=duplicate_user");
				exit();		
			}
			else{
				$user_detail = mysqli_fetch_array($result);	
				$pwdCheck = password_verify($password, $user_detail["Password"]);
				if($pwdCheck == true){
					session_start();
					$_SESSION['userId'] = $user_detail["UserId"];
					$_SESSION['username'] = $user_detail["Username"];
					header("Location: ../frontend/home.php");
				}
				else{
					header("Location: ../index.php?error=error_pwd");
				}
				exit();	
			}
		}
	}
?>
