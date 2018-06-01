<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\AuthRule as AuthRuleModel;
use app\admin\controller\Common;

class AuthRule extends Common
{

  public function lst(){

    // $authRuleRes=AuthRuleModel::paginate(5);
    // $this->assign('authRuleRes',$authRuleRes);
     $authRule=new AuthRuleModel();
     $authRuleRes=$authRule->authRuleTree();
     $this->assign('authRuleRes',$authRuleRes);
     return view();
  }    


  public function add(){
    if (request()->isPost()) {
      $data=input('post.');
      $plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
      if ($plevel) {
        $data['level']=$plevel['level']+1;
      }else{
        $data['level']=0;
      }
      $add=db('auth_rule')->insert($data);
      if ($add) {
        $this->success('添加权限成功!',url('lst'));
      }else{
        $this->error('添加权限失败!');
      }
      return;
    }
    $authRuleRes=db('auth_rule')->select();
    $this->assign('authRuleRes',$authRuleRes);
    return view();
  }



}
