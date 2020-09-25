<?php

include_once("./../model/M_User.php");
class  Ctrl_Home
{
    public function process()
    {
        session_start();
        $currentPage = 1;
        if (isset($_GET["currentPage"])) {
            $currentPage = $_GET["currentPage"];
        }
        $modelUser = new Model_User();
        $page =  $modelUser->getAllUserExcept($_SESSION["userId"], $currentPage);
        
        include_once("./../view/home/home.php");
    }
};

$C_home = new Ctrl_Home();
$C_home->process();
