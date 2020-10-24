<?php
include_once("./../model/M_User.php");
class  Ctrl_Login
{
    public function process()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username) || empty($password)) {
                header("Location: ../index.php?error=empty");
                exit();
            } else {
                $modelUser = new Model_User();
                $userDetail = $modelUser->getUserByUsername($username);
                if ($userDetail != null) {
                    $pwdCheck = password_verify($password, $userDetail->password);
                    if ($pwdCheck == true) {
                        if (!isset($_SESSION)) {
                           session_start();
                        }
                        $_SESSION['userId'] = $userDetail->userId;
                        $_SESSION['type'] = $userDetail->type;
                        $_SESSION['name'] = $userDetail->name;
                        $_SESSION['loggedin'] = true;
                        header("Location: ./C_Authentication.php");
                    } else {
                        header("Location: ../index.php?error=error_pwd");
                        exit();
                    }
                } else {
                    header("Location: ../index.php?error=login_false");
                    exit();
                }
            }
        } else {
            header("Location: ../index.php?error=missing");
            exit();
        }
    }
};
$C_login = new Ctrl_Login();
$C_login->process();
?>