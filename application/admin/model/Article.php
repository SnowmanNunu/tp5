<?php
namespace app\admin\model;
use think\Model;

class Article extends Model
{
	 protected static function init()
    {
    	//钩子函数（事件函数）
	    Article::event('before_insert', function ($article) {
	        if ($_FILES['thumb']['tmp_name']) {
	        	$file=request()->file('thumb');
	        	//dump($file);die;
	        	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		        if ($info) {
		          // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
		          // $thumb='http://www.tp5.com/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
		          // $thumb='http://www.tp5.com/'.DS . 'uploads'.'/'.$info->getSaveName();
		          $thumb=DS . 'uploads'.'/'.$info->getSaveName();    //相对路径
		          $article['thumb']=$thumb;
		        }
	     	}
        });


        Article::event('before_update', function ($article) {
	        if ($_FILES['thumb']['tmp_name']) {
		        $arts=Article::find($article->id);
		        $thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
		        if (file_exists($arts->thumb)) {
		        	@unlink($arts->thumb);
		        }
	        	$file=request()->file('thumb');	        	
	        	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		        if ($info) {
		          // $thumb='http://www.tp5.com/'.DS . 'uploads'.'/'.$info->getSaveName();
		          $thumb=DS . 'uploads'.'/'.$info->getSaveName();
		          $article['thumb']=$thumb;
		        }
	     	}

        });


        Article::event('before_del', function ($article) {
	        $arts = Article::find($article->id);
	        $thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
	        if (file_exists($thumbpath)) {
	        	@unlink($thumbpath);
	        }
        });




    }

}