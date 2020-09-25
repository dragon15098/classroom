<?php

class Entity_Challenge
{
    public $challengeId;
    public $fileHintPath;
    public $filePath;

    public function __construct()
    {
    }

    public static function construct1(
        $_challengeId
    ) {
        $instance = new self();
        $instance->challengeId = $_challengeId;
        return $instance;
    }

    public static function construct3(
        $_challengeId,
        $_fileHintPath,
        $_filePath
    ) {
        $instance = new self();
        $instance->challengeId = $_challengeId;
        $instance->fileHintPath = $_fileHintPath;
        $instance->filePath = $_filePath;
        return $instance;
    }
}
