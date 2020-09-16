<?php
class DatabaseConnection {

	public $conn;

	public function __construct()
	{
		//Get MySQL config values from config.ini file
		if($config = parse_ini_file("config.ini"))
		{	
			$ip = $config["ip"];
		    $username = $config["username"];
		    $password = $config["password"];             
		    $db = $config["db"];        
		    $this->conn = new mysqli($ip, $username, $password, $db);
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
//
	public function prepareQuery($sql, $params_type, ...$params)
	{	
		if ($this->conn->connect_errno) {
		  echo "Failed to connect to MySQL: " . $conn -> connect_error;
		  exit();
		}
		$stmt = $this->conn->prepare($sql);
		$param_size = sizeof($params);
		for($x = 0; $x < $param_size; $x++){
			$stmt->bind_param($x, $params[$x]);
		}
  		$stmt->execute();
		return $result = $stmt->get_result();
	}

}
?>
