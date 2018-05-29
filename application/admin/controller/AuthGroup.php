<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\controller\Common;

class AuthGroup extends Common
{

    public function lst(){
      $authGroupRes=AuthGroupModel::paginate(1);
      $this->assign('authGroupRes',$authGroupRes);
      return view();
    }


    public function add(){
      if(request()->isPost()){
        $data=input('post.');
        $add=db('auth_group')->insert($data);
        if ($add) {
          $this->success('添加用户组成功!',url('lst'));
        }else{
          $this->error('添加用户组失败!');
        }
        return;
      }
      return view();
    }


    public function del(){
      $data=input('id');
      $del=db('auth_group')->delete($data);
      if ($del) {
        $this->success('删除用户组成功!',url('lst'));
      }else{
        $this->error('删除用户组失败!');
      }
    }

    public function edit(){

    }


  





}
