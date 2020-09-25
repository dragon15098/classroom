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

    public function getAllJob($currentPage)
    {
        $limit = PAGE_SIZE;
		$offset = ($currentPage - 1) * PAGE_SIZE;
        $sql = "SELECT * FROM job LIMIT ? OFFSET ?;";
        $result = $this->db->getResultQuerry($sql, "dd", $limit, $offset);
        $jobs = [];
        if($result != null){
            while ($job = mysqli_fetch_array($result)) {
                $jobs[] = Entity_Job::construct3(
                    $job["jobId"],
                    $job["jobName"],
                    $job["filePath"]
                );
            }
        }
        $total = $this->getTotalPageExcept();
        $numberPage = ($total / PAGE_SIZE);
        if($numberPage != (int)$numberPage || $numberPage === 0){
            $numberPage =  (int) $numberPage + 1; 
        }
        return Page::construct5($limit, $offset, $jobs, $currentPage, $total, $numberPage);
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

    public function getTotalPageExcept()
    {
        $sql = 'SELECT COUNT(*) AS total FROM job;';
		$total = $this->db->getPageSize($sql, "");
		return $total;
    }
    
}
