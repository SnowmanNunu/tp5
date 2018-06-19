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
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k => $v) {
                $authRule->update(['id'=>$k,'sort'=>$v]);
            }
            $this->success('更新排序成功！',url('lst'));
            return;
        }
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


  public function edit(){
    if (request()->isPost()) {
      $data=input('post.');
      $plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
      if ($plevel) {
        $data['level']=$plevel['level']+1;
      }else{
        $data['level']=0;
      }
      $save=db('auth_rule')->update($data);
      if ($save) {
        $this->success('修改权限成功!',url('lst'));
      }else{
        $this->error('修改权限失败!');
      }

      return;
    }
    $authRule=new AuthRuleModel();
    $authRuleRes=$authRule->authRuleTree();
    $authRules=$authRule->find(input('id'));
    $this->assign(array(
        'authRuleRes'=>$authRuleRes,
        'authRules'  =>$authRules,
      ));
    return view();
  }

  public function del(){
    $authRule = new AuthRuleModel();
    $authRuleIds = $authRule->getchildrenid(input('id'));
    $authRuleIds[]=input('id');
    //dump($authRuleIds);die;
    $del=AuthRuleModel::destroy($authRuleIds);
    if ($del) {
      $this->success('删除权限成功！',url('lst'));
    }else{
      $this->error('删除权限失败!');
    }
  }





}
