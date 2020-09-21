<?php

class Page
{
    public $limit;
    public $offset;
    public $data;
    public function __construct()
    {

    }
    public static function construct3($_limit, $_offset, $_data)
    {
        $instance = new self();
        $instance->limit = $_limit;
        $instance->offset = $_offset;
        $instance->data = $_data;
        return $instance;
    }
    
}

?>