<?php
namespace app\index\controller;
use \think\Controller;

class Common extends Controller
{
    public function _initialize()
    {
        $conf= new \app\index\model\Conf();
        $_confres=$conf->getAllConf();
        $confres=array();
        foreach ($_confres as $k => $v) {
        	$confres[$v['enname']]=$v['cnname'];
        }
        //dump($confres);
        $this->assign('confres',$confres);
        $this->getNavCates();
    }

        
    //导航栏
    public function getNavCates(){
        $cateres=db('cate')->where(array('pid'=>0))->select();
        foreach ($cateres as $k => $v) {
            $children=db('cate')->where(array('pid'=>$v['id']))->select();
            if($children){
                $cateres[$k]['children']=$children;
            }else{
                $cateres[$k]['children']=0;
            }
        }
        $this->assign('cateres',$cateres);
    }









}
