<?php
class DatabaseConnection {

	public $conn;

	public function __construct()
	{
		//Get MySQL config values from config.ini file
		if($config = parse_ini_file("../config.ini"))
		{
		    $ip = $config["ip"];
		    $username = $config["username"];
		    $password = $config["password"];             
		    $bd = $config["bd"];             
		    $this->conn = new mysqli($ip, $username, $password, $bd);
		
		}
	}

	public function query($sql)
	{	
		if ($this->conn->connect_errno) {
		  echo "Failed to connect to MySQL: " . $conn -> connect_error;
		  exit();
		}
		
		return mysqli_query($this->conn, 'SELECT UserId, Username, Password FROM user;');
	}

}

$dbConnection = new DatabaseConnection();

?>
