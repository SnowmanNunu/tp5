<?php
namespace app\index\controller;
use \think\Controller;

class Artlist extends Common
{
    public function index()
    {
        return $this->fetch('artlist');
    }
}
