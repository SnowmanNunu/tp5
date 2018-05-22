<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Link as LinkModel;
use app\admin\controller\Common;

class link extends Common
{

    public function lst()
    {
        $link=new LinkModel();
        if (request()->isPost()) {
          $data=input('post.');
          foreach ($data as $k => $v) {       
          $link->update(['id'=>$k,'sort'=>$v]);
          }
          $this->success('更新排序成功!',url('lst'));
          return;
        }
        $linkres=db('link')->order('sort desc')->paginate(3);
        $this->assign('linkres',$linkres);
        return view();

      // $link=new LinkModel();
      //   if(request()->isPost()){
      //       $sorts=input('post.');
      //       foreach ($sorts as $k => $v) {
      //           $link->update(['id'=>$k,'sort'=>$v]);
      //       }
      //       $this->success('更新排序成功！',url('lst'));
      //       return;
      //   }
      //   $linkres=$link->order('sort asc')->paginate(3);
      //   $this->assign('linkres',$linkres);
      //   return view();

    }

    public function add()
    { 
      if (request()->isPost()) {
        $data = input('post.');
        $res=db('link')->insert($data);
        if ($res) {
          $this->success('添加友情链接成功!',url('lst'));
        }else{
          $this->error('添加友情链接失败!');
        }
      }
      return view();
      
    }


    public function edit()
    {
      if (request()->isPost()) {
        $data=input('post.');
        $link=new LinkModel();
        $res=$link->save($data,['id'=>$data['id']]);
        //$save=$link->save($data,['id'=>$data['id']]);

        if ($res) {
          $this->success('修改链接成功！',url('lst'));
        }else{
          $this->error('更新链接失败!');
        }

      }
      $linkres=db('link')->order('sort desc')->find(input('id'));
      $this->assign('linkres',$linkres);
      return view();
    }
  




}
