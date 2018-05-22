<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Cate as CateModel;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Common;
use think\Request;

class Article extends Common
{
  public function lst(){

    //$article = new ArticleModel(); 
    $artres = db('article')->field('a.*,b.catename')->alias('a')->join('bk_cate b','a.cateid=b.id')->paginate(2);
    //dump($artres);
    $this->assign('artres',$artres); 
    return view();
  }


  public function add(){
    if (request()->isPost()) {
      $data=input('post.');
      $article = new ArticleModel;

      // if ($_FILES['thumb']['tmp_name']) {
      //   $file=request()->file('thumb');
      //   $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
      //   if ($info) {
      //     $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
      //     $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
      //     $data['thumb']=$thumb;
      //   }
      // }

      if ($article->save($data)) {
        $this->success('添加文章成功!',url('lst'));
      }else{
        $this->error('添加文章失败!');
      }
      return;
    }

    $cate=new CateModel();
    $cateres=$cate->catetree();
    $this->assign('cateres',$cateres);
    return view();
  }



  public function edit($id){
    if (request()->isPost()) {
      $article = new ArticleModel;
      $data= input('post.');
      $save=$article->update($data);
      if ($save) {
        $this->success('修改文章成功!',url('lst'));
      }else{
        $this->error('修改文章失败!');
      }
      return;

    }
    $arts = db('article')->where(array('id'=>input('id')))->find($id);
    $cate=new CateModel();
    $cateres=$cate->catetree();
    $this->assign(array(
      'cateres'=>$cateres,
      'arts'=>$arts,
    ));

    return view();
  }
  


    




}
