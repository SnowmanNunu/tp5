<?php
namespace app\index\controller;
use \think\Controller;

class Imglist extends Common
{
    public function index()
    {
        return $this->fetch('imglist');
    }
}
