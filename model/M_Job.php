<?php
include_once("./../backend/db_connect.php");
include_once("E_Job.php");
include_once("Page.php");
class Model_Job
{
    public $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function getAllJob($limit, $offset)
    {
        $sql = "SELECT * FROM job;";
        $result = $this->db->getResultQuerry($sql, "");
        $jobs = [];
        while ($job = mysqli_fetch_array($result)) {
            $jobs[] = Entity_Job::construct3(
                $job["jobId"],
                $job["jobName"],
                $job["filePath"]
            );
        }
        return Page::construct3($limit, $offset, $jobs);
    }

    public function getJobById($jobId)
    {
        $sql = "SELECT * FROM job WHERE jobId = ? ;";
        $result = $this->db->getResultQuerry($sql, "d", $jobId);
        $row = mysqli_fetch_array($result);
		return Entity_Job::construct3(
			$row["jobId"],
			$row["jobName"],
			$row["filePath"]
		);
    }
    
    
    public function insertNewJob($jobName, $filePath)
    {
        $sql = "INSERT INTO job (jobName, filePath) VALUES (?, ?);";
        return $this->db->getStatusQuerry(
            $sql,
            "ss",
            $jobName,
            $filePath
        );
    }
}
