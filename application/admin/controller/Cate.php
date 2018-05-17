<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Cate as cateModel;
use app\admin\controller\Common;

class cate extends Common
{

    public function lst()
    {    
        $cate = new CateModel();
        $adminres = db('admin')->select();
        $this->assign('adminres',$adminres);
        return view();

    }

    public function add()
    {
      
    }


}
