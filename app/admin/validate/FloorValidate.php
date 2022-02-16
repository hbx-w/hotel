<?php
namespace app\admin\controller;

use think\Validate;

class FloorValidate extends Validate{
    protected $rule = [
       'floor_num'  => 'require'
    ];
}
?>