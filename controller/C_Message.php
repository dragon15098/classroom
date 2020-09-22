<?php

include_once("./../model/M_User.php");
include_once("./../model/M_UserMessage.php");
class  Ctrl_Message
{
    public function process()
    {
        session_start();
        if (isset($_GET["userId"])) {
            $this->getAllMessage($_SESSION["userId"], $_GET["userId"]);
        } else if (isset($_POST["toUserId"]) && isset($_POST["content"])) {
            $modelUserMessage = new Model_UserMessage();
            $status  =  $modelUserMessage->insertMessage($_SESSION["userId"], $_POST["toUserId"], $_POST["content"]);
            if ($status === true) {
                header("Location: ./C_Message.php?userId=" . $_POST["toUserId"]);
                exit();
            } else {
                header("Location: ./C_Message.php?userId=" . $_POST["toUserId"] . "&error=error");
            }
        } else if (isset($_POST["action"]) && $_POST["action"] === "edit") {
            $modelUserMessage = new Model_UserMessage();
            $status =  $modelUserMessage->updateMessage($_POST["messageId"], $_POST["content"]);
            if ($status === true) {
                echo "SUCCESS";
            } else {
                echo "FALSE";
            }
        } else if (isset($_POST["action"]) && $_POST["action"] === "delete") {
            $modelUserMessage = new Model_UserMessage();
            $status =  $modelUserMessage->deleteMessage($_POST["messageId"]);
            if ($status === true) {
                echo "SUCCESS";
            } else {
                echo "FALSE";
            }
        }
    }

    public function getAllMessage($fromUserId, $toUserId)
    {
        $modelUserMessage = new Model_UserMessage();
        $user_messages =  $modelUserMessage->getAllMessageById($fromUserId, $toUserId);
        include_once("./../view/user_message/user_message.php");
    }
};

$C_home = new Ctrl_Message();
$C_home->process();
