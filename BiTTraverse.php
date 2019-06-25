<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/28/18
 * Time: 10:33 AM
 */

require './BiTNode.php';

require './queueLink.php';

//二叉树遍历
class BiTTraverse{
    public $head;
    public function __construct()
    {
        if(empty($this->head)){
//            生成二叉树
            $k=$this->getNewNode(11);
            $h=$this->getNewNode(8);
            $h->rchild=$k;
            $i=$this->getNewNode(9);
            $j=$this->getNewNode(10);
            $f=$this->getNewNode(6);
            $f->lchild=$i;
            $g=$this->getNewNode(7);
            $g->rchild=$j;
            $d=$this->getNewNode(4);
            $d->lchild=$h;
            $e=$this->getNewNode(5);

            $b=$this->getNewNode(2);
            $b->rchild=$e;
            $b->lchild=$d;
            $c=$this->getNewNode(3);
            $c->rchild=$g;
            $c->lchild=$f;
            $this->head=$this->getNewNode(1);
            $this->head->lchild=$b;
            $this->head->rchild=$c;

        }
    }
//  生成结点
    public function getNewNode($data){

        return new BiTNode($data);

    }
//  前序遍历，先输出根结点
    public function preOrder($tree){
        if(empty($tree)){
            return;
        }
        echo $tree->data;
        echo "<br/>";
        $this->preOrder($tree->lchild);
        $this->preOrder($tree->rchild);
    }
// 中序遍历，左 中 右
    public function inOrder($tree){
        if(empty($tree)){
            return;
        }
        $this->inOrder($tree->lchild);
        echo $tree->data;
        echo "\n";
        $this->inOrder($tree->rchild);
    }

//    后序遍历，左右 中
    function postOrder($tree){
        if(empty($tree)){
            return;
        }
        if($tree->lchild){
            $this->postOrder($tree->lchild);
        }
        if($tree->rchild){
            $this->postOrder($tree->rchild);
        }
        echo $tree->data;
        echo "\n";
    }
//    层序遍历
    function sequence($tree){
        if(empty($tree)){
            return;
        }
        $queue=new queueLink();
//        var_dump($tree->data);exit;
        $queue->push($tree);
        while(!$queue->isFull()){

            $node=$queue->pop();
            echo 'the data is --'.$node->data;

            echo "\n";

            if($node->lchild){

                $queue->push($node->lchild);
            }

            if($node->rchild){

                $queue->push($node->rchild);
            }

        }

    }
//    找出从根结点出发路径中，所有数据总和最大的一条
    function getMaxPath($tree){
        if(empty($tree)){
            return 0;
        }
        $left=$this->getMaxPath($tree->lchild);
        $right=$this->getMaxPath($tree->rchild);
        return $tree->data+max($left,$right);
    }
}


$tree=new BiTTraverse();
//echo $tree->head->data;
$res=$tree->getMaxPath($tree->head);

var_dump($res);exit;
//$tree->preOrder($tree->head);
//$tree->inOrder($tree->head);
//$tree->postOrder($tree->head);
//$tree->sequence($tree->head);