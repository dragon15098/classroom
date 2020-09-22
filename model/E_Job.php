<?php

class Entity_Job
{
    public $jobId;
    public $jobName;
    public $filePath;

    public function __construct()
    {
    }

    public static function construct3(
        $_jobId,
        $_jobName,
        $_filePath
    ) {
        $instance = new self();
        $instance->jobId = $_jobId;
        $instance->jobName = $_jobName;
        $instance->filePath = $_filePath;
        return $instance;
    }
}
