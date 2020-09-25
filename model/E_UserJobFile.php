<?php

class Entity_UserJobFile
{
    public $userJobFileId;
    public $userId;
    public $jobId;
    public $filePath;
    public $username;

    public function __construct()
    {
    }
    
    public static function construct5(
        $_userJobFileId,
        $_userId,
        $_jobId,
        $_filePath,
        $_username
    ) {
        $instance = new self();
        $instance->userJobFileId = $_userJobFileId;
        $instance->userId = $_userId;
        $instance->jobId = $_jobId;
        $instance->filePath = $_filePath;
        $instance->username = $_username;
        return $instance;
    }
    public static function construct4(
        $_userJobFileId,
        $_userId,
        $_jobId,
        $_filePath
    ) {
        $instance = new self();
        $instance->userJobFileId = $_userJobFileId;
        $instance->userId = $_userId;
        $instance->jobId = $_jobId;
        $instance->filePath = $_filePath;
        return $instance;
    }
}
