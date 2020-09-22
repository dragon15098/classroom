<?php
include_once("./../backend/db_connect.php");
include_once("E_User.php");
include_once("E_UserMessage.php");
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
        $sql = "SELECT * FROM user_message 
            WHERE 
                (toUserId = ? AND fromUserId = ?) 
                OR 
                (fromUserId = ? AND toUserId = ?) 
            ORDER BY messageId;";
        $result = $this->db->getResultQuerry($sql, "dddd", $firstUserId, $secondUserId, $firstUserId, $secondUserId);
        $user_messages = [];
        while ($row = mysqli_fetch_array($result)) {
            $user_messages[] = Entity_UserMessage::construct4(
                $row["messageId"],
                $row["fromUserId"],
                $row["toUserId"],
                $row["content"]
            );
        }
        return $user_messages;
    }

    public function insertMessage($fromUserId, $toUserId, $content)
    {
        $sql = "INSERT INTO user_message (fromUserId, toUserId, content) VALUES (?, ?, ?)";
        return $this->db->getStatusQuerry($sql, "dds", $fromUserId, $toUserId, $content);
    }

    public function updateMessage($messageId, $content)
    {
        $sql = "UPDATE user_message SET content = ? WHERE messageId = ?";
        return $this->db->getStatusQuerry($sql, "sd", $content, $messageId);
    }

    public function deleteMessage($messageId)
    {
        $sql = "DELETE FROM user_message WHERE messageId = ?;";
        return $this->db->getStatusQuerry($sql, "d", $messageId);
    }
}
