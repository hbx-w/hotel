<?php
namespace app\admin\controller;

use think\exception\ValidateException;
use think\facade\Db;

class Order extends Base{
    public function index()
    {
        $map = [];
        $keyword = input('param.keyword');
        $map[] = ['o.order_num','like','%'.$keyword.'%'];
        $Nowpage = input('get.page')?input('get.page'):1;
        $limits = input('get.limit',10);
        $count = Db::name('order')->alias('o')->where($map)->count();
        $allPage = intval(ceil($count/$limits));
        $lists = Db::name('order')->alias('o')->field('o.*,member.real_name,member.phone,room_detalis.room_num')
                                  ->join('member','member.id=o.user_id','left')
                                  ->join('room_detalis','room_detalis.id=o.rd_id','left')
                                  ->where($map)->page($Nowpage,$limits)->order('id asc')->select();
        return json(['code'=>1,'data'=>['lists'=>$lists,'count'=>$count],'msg'=>'']);
    }
    //修改订单
    public function edit()
    {
        if(request()->isPost()){
            $param = input('post.');
            $id = input('param.id');
            try{
                validate('OrderValidate',$param);
            }catch(ValidateException $e){
                return json(['code'=>0,'msg'=>$e->getError()]);
            }
            $param['update_time']=time();
            $flag = Db::name('order')->where(['id'=>$id])->update($param);
            if($flag){
                return json(['code'=>1,'data'=>'','msg'=>'编辑成功']);
            }else{
               return json(['code'=>0,'data'=>'','msg'=>'编辑失败']);
            }
        }
        $id = input('param.id');
        $res = Db::name('order')->where(['id'=>$id])->find();
        return json(['code'=>1,'data'=>$res,'msg'=>'']);
    }
    //订单删除
    public function del()
    {
        $id = input('param.id');
        $flag = Db::name('order')->where(['id'=>$id])->delete();
        if($flag){
           return json(['code'=>1,'data'=>'','msg'=>'删除成功']);
       }else{
          return json(['code'=>0,'data'=>'','msg'=>'删除失败']);
       }
    }
    //订单状态
    public function state()
    {
        $id = input('param.id');
        $map = ['id'=>$id];
        $status = Db::name('order')->where($map)->value('status');
        if($status == 1){
            Db::name('order')->where($map)->update(['status'=>0]);
            return json(['code'=>1,'data'=>'','msg'=>'操作成功']);
        }else{
           Db::name('order')->where($map)->update(['status'=>1]);
           return json(['code'=>0,'data'=>'','msg'=>'操作成功']);
        }
    }
}
?>