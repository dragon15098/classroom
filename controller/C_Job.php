<?php

include_once("./../model/M_Job.php");
class  Ctrl_Job
{
    public function process()
    {
        session_start();
        $modelJob = new Model_Job();
        if (isset($_GET["jobId"])) {
            $jobDetail = $modelJob->getJobById($_GET["jobId"]);
            include_once("./../view/job/job_detail.php");
        } else {
            $pageJobs =  $modelJob->getAllJob(5, 0);
            include_once("./../view/job/job.php");
        }
    }
};

$C_home = new Ctrl_Job();
$C_home->process();
