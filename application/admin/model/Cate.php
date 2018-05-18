<?php
namespace app\admin\model;
use think\Model;

class Cate extends Model
{
	public function catetree(){
		$cateres = $this->select();
		$this->sort($cateres);
	}

	public function sort(){

	}



}