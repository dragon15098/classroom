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
		
		return mysqli_query($this->conn, $sql);
	}
//
	private function prepareQuery($sql, $params_type, ...$params)
	{	
		if ($this->conn->connect_errno) {
		  echo "Failed to connect to MySQL: " . $conn -> connect_error;
		  exit();
		}
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param($params_type, ...$params);
		return $stmt;
	}

	public function getResultQuerry($sql, $params_type, ...$params){
		$stmt = $this->prepareQuery($sql, $params_type, ...$params);
		$result = $stmt->execute();
		return $stmt->get_result();
	}

	public function getStatusQuerry($sql, $params_type, ...$params){
		echo $sql;
		$stmt = $this->prepareQuery($sql, $params_type, ...$params);
		$result = $stmt->execute();
		echo $stmt->error;
		return $result;
	}
}
?>
