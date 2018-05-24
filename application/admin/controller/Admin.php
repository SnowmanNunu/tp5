<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Common;

class Admin extends Common
{

    public function lst()
    {
       // $res = db('admin')->where(array('name'=>'Coco','password'=>123))->select();
        $admin = new AdminModel();
        //$res = db('admin')->where(array('name'=>'Coco','password'=>123))->select();
        
         $adminres = $admin->getadmin();
         //dump($res);
         $this->assign('adminres',$adminres);
         return view();
          //$res = AdminModel::getByPassword(2);

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
    		// $res = db('bk_admin')->insert($data);
        $admin = new AdminModel();

         //验证规则
         $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }

        $res = $admin->addadmin($data);
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
       $admins = db('admin')->find($id);

       if (request()->isPost()) {
          $data = input('post.');
           //dump($data);die;
          $admins= new AdminModel();

           //验证规则
          $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

          $savenum = $admins->saveadmin($data,$admins);
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
        //dump($admins);die;
        if (!$admins) {
            $this->error('该管理员不存在！');
        }

        $this->assign('admins',$admins);
    	return $this->fetch();
    }

    public function del($id){
        $admin = new AdminModel();
        $delnum = $admin->deladmin($id);

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
