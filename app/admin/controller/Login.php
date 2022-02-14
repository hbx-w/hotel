<?php
namespace app\admin\controller;

use think\exception\ValidateException;

class Login extends Base{
    public function check()
    {
        if(request()->isPost()){
            $username = input('post.username');
            $password = input('post.password');
            $code = input('post.code');
            try{
                validate('LoginValidate',[$username,$password,$code]);
            }catch(ValidateException $e){
                return json(['code'=>0,'msg'=>$e->getError()]);
            }
            
        }
    }
}
?>