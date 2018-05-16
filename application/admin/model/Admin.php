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


}