<?php
include_once("./../backend/db_connect.php");
include_once("E_User.php");
include_once("Page.php");
class Model_UserMessage
{
    public $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function getAllMessageById($firstUserId, $secondUserId)
    {

        $sql = 'SELECT * FROM user_message 
            WHERE 
                (toUserId = ? AND fromUserId = ?) 
                OR 
                (fromUserId = ? AND toUserId = ?) 
            ORDER BY messageId;';
        $result = $this->db->getResultQuerry($sql, "dddd", $firstUserId, $secondUserId, $firstUserId, $secondUserId);
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
        
    }
}
