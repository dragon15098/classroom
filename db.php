<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "classroomDB";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
$createTableUser = "CREATE TABLE user (	userId int, Username varchar(255), Password varchar(255), Name nvarchar(255), Email varchar(255), PhoneNumber varchar(20), PRIMARY KEY (userId));";


echo $createTableUser;
?>
