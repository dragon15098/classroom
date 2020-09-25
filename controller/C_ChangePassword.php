<?php

include_once("./../model/M_User.php");
class  Ctrl_ChangePassword
{
    public function process()
    {
        session_start();
        if (isset($_POST["action"]) && $_POST["action"] === "changePassword") {
            if (isset($_POST["userId"])) {
                if (
                    isset($_POST["password"]) && isset($_POST["verifyPassword"])
                    && $_POST["password"] === $_POST["verifyPassword"]
                ) {
                    $this->changePassword($_POST["password"], $_POST["userId"]);
                }
            } else {
                if (
                    isset($_POST["password"]) && isset($_POST["verifyPassword"])
                    && $_POST["password"] === $_POST["verifyPassword"]
                ) {
                    $this->changePassword($_POST["password"], $_SESSION["userId"]);
                }
            }
        }
        if (isset($_GET["id"])) {
            include_once("./../view/change_password/change_password.php");
        }
    }
    function changePassword($password, $userId)
    {
        $modelUser = new Model_User();
        $status =  $modelUser->updatePassword($password, $userId);
        if ($status) {
            header("Location: C_Home.php");
        }
    }
};

$C_changePassword = new Ctrl_ChangePassword();
$C_changePassword->process();
