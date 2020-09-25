<?php

include_once("./../model/M_User.php");
class  Ctrl_LogOut
{
    public function process()
    {
        session_unset();
        session_destroy();
        header("Locaton: ./Login.php");
    }
};

$C_home = new Ctrl_LogOut();
$C_home->process();