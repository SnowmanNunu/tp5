<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Cate as cateModel;
use app\admin\controller\Common;

class cate extends Common
{

  protected $beforeActionList = [
        'first',
        'second' =>  ['except'=>'hello'],
        'three'  =>  ['only'=>'hello,data'],
    ];

    public function first(){
      echo 123;die;
    }


    public function lst()
    {    
        $cate = new CateModel();
        $cateres=$cate->catetree();
        $this->assign('cateres',$cateres);
        return view();

    }

    public function add()
    {
       $cate = new CateModel();

      if (request()->isPost()) {
        //$data = input('post.');
        $cate->data(input('post.'));
        $add = $cate->save();
        if ($add) {
          $this->success('添加栏目成功!',url('lst'));
        }else{
          $this->error('添加栏目失败!');
        }
      }

      $cateres=$cate->catetree();
      $this->assign('cateres',$cateres);
      return $this->fetch();
    }

    public function del()
    {
      $del=db('cate')->delete(input('id'));
      if ($del) {
        $this->success('删除栏目成功!',url('lst'));
      }else{
        $this->error('删除栏目失败!');
      }
    }


}
