<?php

include_once("./../model/M_Job.php");
include_once("./../model/M_UserJobFile.php");

class  Ctrl_Job
{
    public function process()
    {
        session_start();
        $modelJob = new Model_Job();
        if (isset($_GET["jobId"])) {
            $modelUserJobFile = new Model_UserJobFile();
            $jobDetail = $modelJob->getJobById($_GET["jobId"]);
            $currentPage = 1;
            if (isset($_GET["currentPage"])) {
                $currentPage = $_GET["currentPage"];
            }
            $addParam = "&jobId=" . $_GET["jobId"];
            $page = $modelUserJobFile->getAllJobFile($_GET["jobId"], $currentPage);
            $userHasSubmit =  $modelUserJobFile->getUserJobFileByUserId($_SESSION["userId"]);
            include_once("./../view/job/job_detail.php");
        } else {
            $currentPage = 1;
            if (isset($_GET["currentPage"])) {
                $currentPage = $_GET["currentPage"];
            }
            $page =  $modelJob->getAllJob($currentPage);
            include_once("./../view/job/job.php");
        }
    }
};

$C_home = new Ctrl_Job();
$C_home->process();
