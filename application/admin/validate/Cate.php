<?php
namespace app\admin\validate;
use think\Validate;

class Cate extends Validate
{ 
    protected $rule = [
        'catename'  => 'unique:cate|require|max:25',
    ];
    
    protected $message = [
        'catename.require'  =>  '栏目名称不能为空!',
        'catename.unique'  =>  '栏目名称不能重复!',
    ];

    protected $scene = [
        //'add'  =>  ['title'=>'require','url','desc'],  对某些字段的规则重新设置
        'add'  =>  ['catename'],
        'edit'  =>  ['catename'],
    ];


}
