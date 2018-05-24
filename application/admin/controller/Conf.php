<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Conf as ConfModel;
use app\admin\controller\Common;

class Conf extends Common
{
    public function lst(){

      $list=db('conf')->select();
      return view();
    }


    public function add(){
      if (request()->isPost()) {
      $data=input('post.');
      $conf= new ConfModel();

      $res=db('conf')->insert($data);
      if ($res) {
        $this->success('添加配置成功!',url('lst'));
      }else{
        $this->error('添加配置失败!');
      }
      }

      return view();
    }
     

    public function edit(){
      return view();
    }

}
