<?php
namespace app\admin\controller;
// use think\View;
use \think\Controller;
use app\admin\model\Admin as AdminModel;

class Admin extends Controller
{

    // public function _initialize()
    // {
    //    $admin = new AdminModel();
    // }


    public function lst()
    {
        // return view();
        // $view = new View([
        // 	'view_suffix' => 'htm',
        // ]);
        // return $view->fetch();
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
            $this->error('修改失败！');
        }
    }
}
