<?php

include_once("./../model/M_User.php");
include_once("./../model/M_UserMessage.php");
class  Ctrl_Message
{
    public function process()
    {
        if (isset($_GET["userId"])) {
            session_start();
            $modelUser = new Model_UserMessage();
            $user =  $modelUser->getAllMessageById($_GET["userId"], $_SESSION("userId"));
            include_once("./../view/user_detail/user_detail.php");
        }
    }
};

$C_home = new Ctrl_Message();
$C_home->process();
