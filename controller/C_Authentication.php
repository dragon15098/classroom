<?php

declare(strict_types=1);

require './../vendor/autoload.php';
class  Ctrl_Authentication
{
    public function process()
    {
        $secret = 'XVQ2UIGO75XRUKJO';
        if (isset($_POST['code'])) {
            $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
            $code = $_POST['code'];
            if ($g->checkCode($secret, $code)) {
                 header("Location: ./C_Home.php");
            } else {
                $imageLink = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('nmq', $secret, 'Class room');
                include_once("./../view/2fa/2fa.php");
            }
        } else {
            $imageLink = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('nmq', $secret, 'Class room');
            include_once("./../view/2fa/2fa.php");
        }
    }
};

$C_authentication = new Ctrl_Authentication();
$C_authentication->process();
