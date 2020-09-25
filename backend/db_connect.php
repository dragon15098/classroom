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
			if(!defined('PAGE_SIZE')){
			    define('PAGE_SIZE', $config["pageSize"]);
			}
		}
	}

	public function query($sql)
	{	
		if ($this->conn->connect_errno) {
		  exit();
		}
		return mysqli_query($this->conn, $sql);
	}

	private function prepareQuery($sql, $param_types, ...$params)
	{	
		if ($this->conn->connect_errno) {
		  exit();
		}
		$stmt = $this->conn->prepare($sql);
		if($param_types !== ""){
		    $stmt->bind_param($param_types, ...$params);
		}
		return $stmt;
	}

	public function getResultQuerry($sql, $param_types, ...$params){
		$stmt = $this->prepareQuery($sql, $param_types, ...$params);
		$stmt->execute();
		$data = $stmt->get_result();
		if(mysqli_num_rows($data)==0){
			return null;
		}
		return $data;
	}
	
	public function getStatusQuerry($sql, $param_types, ...$params){
		$stmt = $this->prepareQuery($sql, $param_types, ...$params);
		$result = $stmt->execute();
		return $result;
	}
	public function getPageSize($sql, $param_types, ...$params){
		$stmt = $this->prepareQuery($sql, $param_types, ...$params);
		$result = $stmt->execute();
		$data = mysqli_fetch_array($stmt->get_result());
		return $data["total"];
	}
}
?>
