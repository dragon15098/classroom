<?php
include_once("./../model/M_User.php");
class  Ctrl_AddUser
{
    public function process()
    {
        if (isset($_POST["action"]) && $_POST["action"] == "create") {
            $modelUser = new Model_User();
            if ($_POST["password"] === $_POST["verifyPassword"]) {
                $hashPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $status = $modelUser->addUser(
                    $_POST["username"],
                    $hashPassword,
                    $_POST["name"],
                    $_POST["email"],
                    $_POST["phoneNumber"],
                    $_POST["type"]
                );
                if ($status === true) {
                    header("Location: C_Home.php");
                    exit();
                }
            }
        }
        else{
            include_once("./../view/add_user/add_user.php");
        }
    }

    public function getUserDetail($userId)
    {
        include_once("./../view/user_detail/user_detail.php");
    }
};

$C_home = new Ctrl_AddUser();
$C_home->process();
