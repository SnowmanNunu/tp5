<?php
namespace app\admin\controller;
// use think\View;
use \think\Controller;

class Admin extends Controller
{
    public function lst()
    {
        // return view();
        // $view = new View([
        // 	'view_suffix' => 'htm',
        // ]);
        // return $view->fetch();
        return $this->fetch();
    }

    public function add()
    {
    	return $this->fetch();
    }

    public function edit()
    {
    	return $this->fetch();
    }
}
