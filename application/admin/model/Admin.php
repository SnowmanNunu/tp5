<?php
namespace app\admin\model;
use think\Model;

class Admin extends Model
{
	public function addadmin($data){
		//dump($data);die;
		if (empty($data) || !is_array($data)) {
			return false;
		}

		if ($data['password']) {
			$data['password'] = md5($data['password']); 
		}

		if ($this->save($data)) {
			return true;
		}else{
			return false;
		}
		// $res=$this->save($data);
		// dump($res);die;
	}

	public function getadmin(){
		return $this::paginate(2);
	}

	public function saveadmin($data,$admins){

		if (!$data['name']) {
              return 2;
          }
          if (!$data['password']) {
              $data['password'] = $admins['password'];
          }else{
            $data['password'] = md5($data['password']);
          }

          //方法一 $res = db('admin')->update($data);
          return $this::update(['name'=>$data['name'],'password'=>$data['password']],['id' => $data['id']]);
	}

	public function deladmin($id){
		if ($this::destroy($id)) {
			return 1;
		}else{
			return 2;
		}
	}

}