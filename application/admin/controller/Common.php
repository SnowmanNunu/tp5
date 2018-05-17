<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Admin as AdminModel;

class Common extends Controller
{

    public function _initialize()
    {
        if (!session('id') || !session('name')) {  
          $this->error('您尚未登錄，請先登錄!',url('login/index'));
        }
    
    }


    


}
