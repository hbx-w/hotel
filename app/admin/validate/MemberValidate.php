<?php
namespace app\admin\controller;

use think\facade\Validate;

class MenberValidate extends Validate{
    protected $rule = [
        'username'           => 'require',
        'phone'              => 'require|mobile',
        'real_time'          => 'require',
        'id_card'            => 'require|idCard'
    ];
}
?>