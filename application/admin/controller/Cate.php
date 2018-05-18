<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Cate as cateModel;
use app\admin\controller\Common;

class cate extends Common
{

  protected $beforeActionList = [
        // 'first',
        // 'second' =>  ['except'=>'hello'],
        'delsoncate'  =>  ['only'=>'del'],
    ];


    public function lst()
    {    
        $cate = new CateModel();
        if (request()->isPost()) {
          print_r(input('post.'));die;
          return;
        }
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


    public function edit(){

      $cate = new CateModel();
      if (request()->isPost()) {
        $data=input('post.');
        $save=$cate->save($data,['id'=>$data['id']]);
        if($save !== false){
                $this->success('修改栏目成功！',url('lst'));
            }else{
                $this->error('修改栏目失败！');
            }
            return;
      }
        $cates=$cate->find(input('id'));
        $cateres=$cate->catetree();
        $this->assign(array(
            'cateres'=>$cateres,
            'cates'=>$cates,
            ));
      return $this->fetch();
    }



    public function delsoncate(){
      $cateid= input('id');  //要删除的当前栏目的ID
      $cate = new CateModel;
      $sonids = $cate->getchildrenid($cateid);
      if ($sonids) {
      db('cate')->delete($sonids);
      }
    }




}
