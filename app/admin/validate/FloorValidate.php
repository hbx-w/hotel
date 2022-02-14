<?php
namespace app\admin\controller;

use think\facade\Validate;

class FloorValidate extends Validate{
    protected $rule = [
       'floor_num'  => 'require'
    ];
}
?>