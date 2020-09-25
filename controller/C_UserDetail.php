<?php

include_once("./../model/M_User.php");
class  Ctrl_UserDetail
{
    public function process()
    {
        $modelUser = new Model_User();
        session_start();
        if (isset($_GET["id"])) {
            $this->getUserDetail($_GET["id"]);
        } else if (isset($_POST["action"]) && $_POST["action"] === "load") {
            if (
                isset($_POST['email'])
                && isset($_POST['phoneNumber'])
                && isset($_POST['username'])
                && isset($_POST['name'])
                && isset($_POST['userId'])
            ) {
                $status =  $modelUser->updateUser(
                    $_POST['username'],
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['phoneNumber'],
                    $_POST['userId']
                );
                if ($status === true) {
                    //$this->getUserDetail($_POST["userId"]);
                    header("Location: ./C_UserDetail.php?id=" . $_POST['userId']);
                }
            } else {
            }
        } else if (isset($_POST["action"]) && $_POST["action"] === "delete") {
            $this->deleteUser($_POST["userId"]);
        }
    }
    public function getUserDetail($userId)
    {
        $modelUser = new Model_User();
        $user =  $modelUser->getUserById($userId);
        include_once("./../view/user_detail/user_detail.php");
    }
    public function deleteUser($userId)
    {
        $modelUser = new Model_User();
        $status = $modelUser->deleteUser($userId);
        if ($status) {
            echo "SUCCESS";
        }
    }
};

$C_home = new Ctrl_UserDetail();
$C_home->process();
