<?php

include_once("./../model/M_User.php");
class  Ctrl_UserDetail
{
    public function process()
    {
        if (isset($_GET["id"])) {
            session_start();
            $modelUser = new Model_User();
            $user =  $modelUser->getUserById($_GET["id"]);
            include_once("./../view/user_detail/user_detail.php");
        }
    }
};

$C_home = new Ctrl_UserDetail();
$C_home->process();
