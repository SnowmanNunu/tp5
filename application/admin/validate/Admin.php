<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{ 
    protected $rule = [
        'name'=>'unique:admin|require|max:25',
        'password'=>'require|min:6',
    ];
    
    protected $message = [
        'name.require'  =>  '用户名不能为空!',
        'name.unique'  =>  '用户名不能重复!',
        'name.max'  =>  '用户名长度不能大于25个字符!',
        'password.require'  =>  '密码不能为空!',
        'password.min'  =>  '密码长度不得少于6个字符!',
    ];

    protected $scene = [
        //'add'  =>  ['title'=>'require','url','desc'],  对某些字段的规则重新设置
        'add'  =>  ['name','password'],
        'edit'  =>  ['name','password'],
    ];


}
