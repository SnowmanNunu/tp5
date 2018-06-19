<?php
namespace app\admin\model;
use think\Model;
class AuthRule extends Model
{
	public function authRuleTree(){
		$authRuleres = $this->order('sort asc')->select();
		return $this->sort($authRuleres);
	}

	public function sort($data,$pid=0,$level=0){
		static $arr = array();
		foreach ($data as $k => $v) {
			if ($v['pid'] == $pid) {
				$v['level']=$level;
				$arr[]=$v;
				$this->sort($data,$v['id'],$level+1);
			}
		}
		return $arr;
	}


	public function getchildrenid($authRuleId){
		$AuthRuleRes=$this->select();
		return $this->_getchildrenid($AuthRuleRes,$authRuleId);
	}

	public function _getchildrenid($AuthRuleRes,$authRuleId){
		static $arr = array();
		foreach ($AuthRuleRes as $k => $v) {
			if ($v['pid'] == $authRuleId) {
				$arr[]=$v['id'];
				$this->_getchildrenid($AuthRuleRes,$v['id']);
			}
		}
		return $arr;
	}



}


