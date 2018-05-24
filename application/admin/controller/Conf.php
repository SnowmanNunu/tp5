<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Conf as ConfModel;
use app\admin\controller\Common;

class Conf extends Common
{
    public function lst(){
      if (request()->isPost()) {
        $data=input('post.');
        $conf=new ConfModel();
        foreach ($data as $k => $v) {
          $conf->update(['id'=>$k,'sort'=>$v]);
        }
        $this->success('更新排序成功!',url('lst'));
        return;

      }
      $confres=ConfModel::order('sort asc')->paginate(5);
      $this->assign('confres',$confres);
      return view();
    }


    public function add(){
      if (request()->isPost()) {
      $data=input('post.');
      if($data['values']){
                $data['values']=str_replace('，', ',', $data['values']);
            }
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
      //方法
      // $confs=db('conf')->find(input('id'));
      // $this->assign('confs',$confs);
      // return view();

      if (request()->isPost()) {
        $data=input('post.');
        $conf=new ConfModel();
        $res=$conf->save($data,['id'=>$data['id']]);
        if ($res !==false) {
          $this->success('修改配置成功!',url('lst'));
        }else{
          $this->error('修改配置失败!');
        }
      }
      $confs=ConfModel::find(input('id'));
      $this->assign('confs',$confs);
      return view();
    }


    public function del(){
      $del=ConfModel::destroy(input('id'));
      if ($del) {
        $this->success('删除配置成功！',url('lst'));
      }else{
        $this->error('删除配置失败！');
      }

    }

    public function conf(){
      $confres=ConfModel::order('sort asc')->select();
      $this->assign('confres',$confres);
      return view();
    }

}
