<?php

class Page
{
    public $limit;
    public $offset;
    public $currentPage;
    public $data;
    public $total;
    public $numberPage;
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
    public static function construct5($_limit, $_offset, $_data, $_currentPage, $_total, $_numberPage)
    {
        $instance = new self();
        $instance->limit = $_limit;
        $instance->offset = $_offset;
        $instance->data = $_data;
        $instance->currentPage = $_currentPage;
        $instance->total = $_total;
        $instance->numberPage = $_numberPage;
        return $instance;
    }
    
}
