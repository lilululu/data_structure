<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/28/18
 * Time: 10:28 AM
 */

//er cha lian biao

class BiTNode{
    public $data='';
    public $lchild;
    public $rchild;
    function __construct($data='')
    {
        $this->data=$data;
        $this->lchild='';
        $this->rchild='';
    }
}