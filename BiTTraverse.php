<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/28/18
 * Time: 10:33 AM
 */

require './BiTNode.php';

require './queueLink.php';

class BiTTraverse{

    public $head;

    public function __construct()
    {

        if(empty($this->head)){


            $k=$this->getNewNode('k');

            $h=$this->getNewNode('h');

            $h->rchild=$k;


            $i=$this->getNewNode('i');
            $j=$this->getNewNode('j');
            $f=$this->getNewNode('f');

            $f->lchild=$i;
            $g=$this->getNewNode('g');

            $g->rchild=$j;

            $d=$this->getNewNode('d');

            $d->lchild=$h;
            $e=$this->getNewNode('e');




            $b=$this->getNewNode('b');

            $b->rchild=$e;
            $b->lchild=$d;

            $c=$this->getNewNode('c');

            $c->rchild=$g;
            $c->lchild=$f;

            $this->head=$this->getNewNode('a');


            $this->head->lchild=$b;

            $this->head->rchild=$c;



        }
    }

    public function getNewNode($data){

        return new BiTNode($data);

    }

    public function preOrder($tree){


        if(empty($tree)){

            return;
        }

        echo 'the data is --'.$tree->data;

        echo "\n";


        $this->preOrder($tree->lchild);
        $this->preOrder($tree->rchild);
    }


    public function inOrder($tree){

        if(empty($tree)){

            return;
        }

        $this->inOrder($tree->lchild);

        echo 'the data is --'.$tree->data;

        echo "\n";

        $this->inOrder($tree->rchild);



    }

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

        echo 'the data is --'.$tree->data;

        echo "\n";



    }


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
}


$tree=new BiTTraverse();

//echo $tree->head->data;

//$tree->preOrder($tree->head);
//$tree->inOrder($tree->head);
//$tree->postOrder($tree->head);
$tree->sequence($tree->head);