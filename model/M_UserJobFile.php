<?php
include_once("./../backend/db_connect.php");
include_once("E_UserJobFile.php");
include_once("Page.php");
class Model_UserJobFile
{
    public $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function getUserJobFileByUserId($userId)
    {
        $sql = "SELECT 
                    * 
                FROM 
                    user_job_file 
                WHERE userId = ?;";
        $result = $this->db->getResultQuerry($sql, "d", $userId);
        if($result == null){ 
            return null;
        }
        $row = mysqli_fetch_array($result);
        $userFile = Entity_UserJobFile::construct4(
            $row["userJobFileId"],
            $row["userId"],
            $row["jobId"],
            $row["filePath"]
        );
       
        return $userFile;
    }

    public function getAllJobFile($jobId, $currrentPage)
    {
        $limit = PAGE_SIZE;
        $offset = PAGE_SIZE * ($currrentPage -1 );
        $sql = "SELECT 
                    * 
                FROM 
                    user_job_file 
                JOIN users ON user_job_file.userId = users.userId
                WHERE jobId = ? 
                LIMIT ? OFFSET ?;";
        $result = $this->db->getResultQuerry($sql, "ddd", $jobId, $limit, $offset);
        $userJobFiles = [];
        if($result != null){
            while ($userJobFile = mysqli_fetch_array($result)) {
                $userJobFiles[] = Entity_UserJobFile::construct5(
                    $userJobFile["userJobFileId"],
                    $userJobFile["userId"],
                    $userJobFile["jobId"],
                    $userJobFile["filePath"],
                    $userJobFile["username"]
                );
            } 
        }
        $total = $this->getTotal($jobId);
        $numberPage = $total / PAGE_SIZE;
        if($numberPage != (int)$numberPage){
            $numberPage =  (int) $numberPage + 1; 
        }
        return Page::construct5($limit, $offset, $userJobFiles, $currrentPage, $total, $numberPage);
    }

    public function insertNewJob($userId, $jobId, $filePath)
    {
        $sql = "INSERT INTO user_job_file (userId, jobId, filePath) VALUES (?, ?, ?);";
        return $this->db->getStatusQuerry(
            $sql,
            "dds",
            $userId,
            $jobId,
            $filePath
        );
    }

    public function getTotal($jobId)
    {
        $sql = "SELECT COUNT(*) as total FROM user_job_file WHERE jobId = ?;";
        return $this->db->getPageSize(
            $sql,
            "d",
            $jobId
        );
    }
}
