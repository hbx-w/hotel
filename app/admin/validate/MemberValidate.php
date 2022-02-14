<?php
namespace app\admin\controller;

use think\facade\Validate;

class MenberValidate extends Validate{
    protected $rule = [
        'nickname'      => 'require',
        'phone'         => 'require',
        'real_time'     => 'require'
    ];
}
?>