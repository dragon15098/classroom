<?php
include_once("./../backend/db_connect.php");
include_once("E_User.php");
include_once("Page.php");
class Model_User
{
	public $db;

	public function __construct()
	{
		$this->db = new DatabaseConnection();
	}

	public function getAllUserExcept($exceptUserId, $limit, $offset)
	{
		$sql = 'SELECT * FROM user WHERE userId <> ? LIMIT ? OFFSET ?;';
		$result = $this->db->getResultQuerry($sql, "ddd", $exceptUserId, $limit, $offset);
		$users = [];
		while ($row = mysqli_fetch_array($result)) {
			$users[] = Entity_User::construct6(
				$row["userId"],
				$row["username"],
				$row["name"],
				$row['email'],
				$row['phoneNumber'],
				$row['type']
			);
		}
		return Page::construct3($limit, $offset, $users);
	}
	
	public function getUserById($userId){
		$sql = 'SELECT * FROM user WHERE userId = ?;';
		$result = $this->db->getResultQuerry($sql, "d", $userId);
		$row = mysqli_fetch_array($result);
		return Entity_User::construct6(
			$row["userId"],
			$row["username"],
			$row["name"],
			$row['email'],
			$row['phoneNumber'],
			$row['type']
		);
	}

	public function getUserByUsername($username)
	{
		$sql = "SELECT * FROM user WHERE username = ?;";
		$result = $this->db->getResultQuerry($sql, "s", $username);

		if ($result->num_rows != 1) {
			return null;
		} else {
			$user_detail = mysqli_fetch_array($result);
			return Entity_User::construct7(
				$user_detail['userId'],
				$user_detail['username'],
				$user_detail['password'],
				$user_detail['name'],
				$user_detail['email'],
				$user_detail['phoneNumber'],
				$user_detail['type']
			);
		}
	}

	public function updateUser($user)
	{
	}
}