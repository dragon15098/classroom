<?php

class Entity_UserMessage
{
    public $messageId;
    public $fromUserId;
    public $toUserId;
    public $content;

    public function __construct()
    {
    }

    public static function construct4(
        $_messageId,
        $_fromUserId,
        $_toUserId,
        $_content
    ) {
        $instance = new self();
        $instance->messageId = $_messageId;
        $instance->fromUserId = $_fromUserId;
        $instance->toUserId = $_toUserId;
        $instance->content = $_content;
        return $instance;
    }
}
