<?php
namespace app\index\controller;
use \think\Controller;

class Common extends Controller
{
    public function _initialize()
    {
        echo 123;
    }

    public function abc(){
    	echo 456;
    }

    public function test(){
    	echo 11111;
    }
}
