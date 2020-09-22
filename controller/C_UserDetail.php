<?php

include_once("./../model/M_User.php");
class  Ctrl_UserDetail
{
    public function process()
    {
        if (isset($_GET["id"])) {
            session_start();
            $this->getUserDetail($_GET["id"]);
        } else if (isset($_POST["action"]) && $_POST["action"] === "load") {
            if (
                isset($_POST['email'])
                && isset($_POST['phoneNumber'])
                && isset($_POST['username'])
                && isset($_POST['name'])
                && isset($_POST['userId'])
            ) {
                $modelUser = new Model_User();
                $status =  $modelUser->updateUser(
                    $_POST['username'],
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['phoneNumber'],
                    $_POST['userId']
                );
                if ($status === true) {
                    $this->getUserDetail($_POST["userId"]);
                }
            } else {
            }
        } else if (isset($_POST["action"]) && $_POST["action"] === ""){
            
        }
    }
    public function getUserDetail($userId)
    {
        $modelUser = new Model_User();
        $user =  $modelUser->getUserById($userId);
        include_once("./../view/user_detail/user_detail.php");
    }
};

$C_home = new Ctrl_UserDetail();
$C_home->process();
