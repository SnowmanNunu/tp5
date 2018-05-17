<?php
namespace app\cate\controller;
use \think\Controller;
use app\cate\model\cate as cateModel;
use app\cate\controller\Common;

class cate extends Common
{

    public function lst()
    {
       // $res = db('cate')->where(array('name'=>'Coco','password'=>123))->select();
        $cate = new cateModel();
        //$res = db('cate')->where(array('name'=>'Coco','password'=>123))->select();
        
         $cateres = $cate->getcate();
         //dump($res);
         $this->assign('cateres',$cateres);
         return view();
          //$res = cateModel::getByPassword(2);

        // foreach ($res as $k => $v) {
        //    // echo $k.'--'.$v;
        //    echo $v->password; 
        //    echo '<br>';
        // }
        // dump($res);
     //    die;
        
    }

    public function add()
    {
    	if (request()->isPost()) {
    		$data = input('post.');
    		//dump($data);
    		// $res = db('bk_cate')->insert($data);
            $cate = new cateModel();
            $res = $cate->addcate($data);

    		if($res){
    			$this->success('添加管理员成功！',url('lst'));
    		}else{
    			$this->error('添加失败！');
    		}
    		return;
    	}

    	return $this->fetch();
    }

    public function edit($id)
    {
       $cates = db('cate')->find($id);

       if (request()->isPost()) {
          $data = input('post.');
           //dump($data);die;
          $cates= new cateModel();
          $savenum = $cates->savecate($data,$cates);
          if ($savenum == '2') {        
              $this->error('管理员用户名不得为空！');
          }

          if ($savenum !==false) {        
              $this->success('修改成功！',url('lst'));
          }else{
              $this->error('修改失败！');
          }
           return ;
       }
        //dump($cates);die;
        if (!$cates) {
            $this->error('该管理员不存在！');
        }

        $this->assign('cates',$cates);
    	return $this->fetch();
    }

    public function del($id){
        $cate = new cateModel();
        $delnum = $cate->delcate($id);

        if ($delnum == '1') {   
            $this->success('删除管理员成功！',url('lst'));
        }else{
            $this->error('刪除管理員失败！');
        }
    }

    public function logout(){
        session(null);
        $this->success('退出成功！',url('login/index'));
    }



}
