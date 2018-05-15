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
    	if (request()->isPost()) {
    		$data = input('post.');
    		//dump($data);
    		$res = db('bk_admin')->insert($data);

    		if($res){
    			$this->success('添加管理员成功！',url('lst'));
    		}else{
    			$this->error('添加失败！');
    		}
    		return;
    	}

    	return $this->fetch();
    }

    public function edit()
    {
    	return $this->fetch();
    }
}
