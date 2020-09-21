<?php

include_once("./../model/M_User.php");
class  Ctrl_Home
{
    public function process()
    {
        session_start();
        $modelUser = new Model_User();
        $pageUsers =  $modelUser->getAllUserExcept($_SESSION["userId"], 5, 0);
        include_once("./../view/home/home.php");
        
    }
};

$C_home = new Ctrl_Home();
$C_home->process();