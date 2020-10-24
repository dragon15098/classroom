<?php

class Entity_User
{
    public $userId;
    public $username;
    public $password;
    public $name;
    public $email;
    public $phoneNumber;
    public $type;
    public $fbId;

    public function __construct()
    {
    }
    
    public static function construct7(
        $_userId,
        $_username,
        $_password,
        $_name,
        $_email,
        $_phoneNumber,
        $_type
    ) {
        $instance = new self();
        $instance->userId = $_userId;
        $instance->username = $_username;
        $instance->password = $_password;
        $instance->name = $_name;
        $instance->email = $_email;
        $instance->phoneNumber = $_phoneNumber;
        $instance->type = $_type;
        return $instance;
    }
    public static function construct8(
        $_userId,
        $_username,
        $_password,
        $_name,
        $_email,
        $_phoneNumber,
        $_type,
        $_fbId
    ) {
        $instance = new self();
        $instance->userId = $_userId;
        $instance->username = $_username;
        $instance->password = $_password;
        $instance->name = $_name;
        $instance->email = $_email;
        $instance->phoneNumber = $_phoneNumber;
        $instance->type = $_type;
        $instance->fbId = $_fbId;
        return $instance;
    }

    public static function construct6($_userId, $_username, $_name, $_email, $_phoneNumber, $_type)
    {
        $instance = new self();
        $instance->userId = $_userId;
        $instance->username = $_username;
        $instance->name = $_name;
        $instance->email = $_email;
        $instance->phoneNumber = $_phoneNumber;
        $instance->type = $_type;
        return $instance;
    }
}
