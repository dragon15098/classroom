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
			echo $this->conn->connect_error;
		}
	}

	public function query($sql)
	{	
		if ($this->conn->connect_errno) {
		  echo "Failed to connect to MySQL: " . $this->conn->connect_error;
		  exit();
		}
		
		return mysqli_query($this->conn, $sql);
	}
//
	private function prepareQuery($sql, $param_types, ...$params)
	{	
		if ($this->conn->connect_errno) {
		  echo "Failed to connect to MySQL: " . $this->conn->connect_error;
		  exit();
		}
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param($param_types, ...$params);
		return $stmt;
	}

	public function getResultQuerry($sql, $param_types, ...$params){
		// echo $sql;
		$stmt = $this->prepareQuery($sql, $param_types, ...$params);
		$result = $stmt->execute();
		// printf("Error: %s.\n", $stmt->error);
		return $stmt->get_result();
	}

	public function getStatusQuerry($sql, $param_types, ...$params){
		//  echo $sql;
		$stmt = $this->prepareQuery($sql, $param_types, ...$params);
		$result = $stmt->execute();
		// echo $stmt->error;
	//	printf("Error: %s.\n", $stmt->error);
		return $result;
	}
}
?>
