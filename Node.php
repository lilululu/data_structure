<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-9-19
 * Time: 16:08
 */

class Node{

    public $data;

    public $next;

    public function __construct($data=null)
    {
        $this->data=$data;

        $this->next=null;

    }
}

class doubleNode{

    public $data;

    public $next;

    public $prior;

    public function __construct($data=null)
    {
        $this->data=$data;

        $this->next=null;

        $this->prior=null;

    }
}



