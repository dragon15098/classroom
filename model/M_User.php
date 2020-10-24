<?php
include_once("/storage/ssd1/108/14948108/public_html/backend/db_connect.php");
include_once("E_User.php");
include_once("Page.php");
class Model_User
{
	public $db;

	public function __construct()
	{
		$this->db = new DatabaseConnection();
	}

	public function getAllUserExcept($exceptUserId, $currentPage)
	{
		$limit = PAGE_SIZE;
		$offset = ($currentPage - 1) * PAGE_SIZE;
		$sql = 'SELECT * FROM users WHERE userId <> ? LIMIT ? OFFSET ?;';
		$result = $this->db->getResultQuerry($sql, "ddd", $exceptUserId, $limit, $offset);
		$users = [];
		if ($result != null) {
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
		}

		$total = $this->getTotalPageExcept($exceptUserId);
		$numberPage = ($total / PAGE_SIZE);
		if ($numberPage != (int)$numberPage || $numberPage === 0) {
			$numberPage =  (int) $numberPage + 1;
		}
		return Page::construct5($limit, $offset, $users, $currentPage, $total, $numberPage);
	}

	public function getUserById($userId)
	{
		$sql = 'SELECT * FROM users WHERE userId = ?;';
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

	public function addUser($username, $password, $name, $email, $phoneNumber, $type)
	{
		$sql = "INSERT INTO users (username, password, name, email, phonenumber, type) VALUES (?, ?, ?,?, ?, ?);";
		return $this->db->getStatusQuerry(
			$sql,
			"sssssd",
			$username,
			$password,
			$name,
			$email,
			$phoneNumber,
			$type
		);
	}

	public function addFbUser($name, $email, $phoneNumber, $type, $fbId)
	{
		$sql = "INSERT INTO users (name, email, phonenumber, type, fbId) VALUES (?, ?,?, ?, ?);";
		return $this->db->getStatusQuerry(
			$sql,
			"sssds",
			$name,
			$email,
			$phoneNumber,
			$type,
			$fbId
		);
	}

	public function getUserWithFbId($fbId)
	{
		$sql = "SELECT * FROM users WHERE fbID = ?;";
		$result = $this->db->getResultQuerry($sql, "s", $fbId);
		if ($result == null) {
			return null;
		} else {
			$user_detail = mysqli_fetch_array($result);
			return Entity_User::construct8(
				$user_detail['userId'],
				$user_detail['username'],
				$user_detail['password'],
				$user_detail['name'],
				$user_detail['email'],
				$user_detail['phoneNumber'],
				$user_detail['type'],
				$user_detail['fbId']
			);
		}
	}

	public function getUserByUsername($username)
	{
		$sql = "SELECT * FROM users WHERE username = ?;";
		$result = $this->db->getResultQuerry($sql, "s", $username);

		if ($result!=null && $result->num_rows != 1) {
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

	public function updateUser($username, $name, $email, $phone_number, $id)
	{
		$sql = "UPDATE users SET username = ?, name = ?, email = ?, phoneNumber = ? WHERE userId = ?;";
		return $this->db->getStatusQuerry(
			$sql,
			"ssssd",
			$username,
			$name,
			$email,
			$phone_number,
			$id
		);
	}

	public function updatePassword($password, $id)
	{
		$sql = "UPDATE users SET password = ? WHERE userId = ?;";
		return $this->db->getStatusQuerry(
			$sql,
			"sd",
			password_hash($password, PASSWORD_DEFAULT),
			$id
		);
	}

	public function deleteUser($userId)
	{
		$sql = "DELETE FROM users WHERE userId = ?";
		return $this->db->getStatusQuerry(
			$sql,
			"d",
			$userId
		);
	}

	public function getTotalPageExcept($exceptUserId)
	{
		$sql = 'SELECT COUNT(*) AS total FROM users WHERE userId <> ?';
		$total = $this->db->getPageSize($sql, "d", $exceptUserId);
		return $total;
	}
}
