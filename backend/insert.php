<?php
	require 'db_connect.php';
	$db = new DatabaseConnection();
	$password = password_hash("123456a@A", PASSWORD_DEFAULT);

	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student1', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student2', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student3', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student4', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student5', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student6', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student7', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student8', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student9', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student10', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student11', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student12', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('student13', \"" . $password ."\", 'Student test 1', 'student@gmail.com', '123456789', 0);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO users ( username, password, name, email, phonenumber, type) VALUES ('teacher', \"" . $password ."\", 'Teacher', 'teacher@gmail.com', '123456789', 1);";

	if ($db->conn->query($sql) === TRUE) {
	  echo "New record created successfully\n";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>
