<?php
namespace app\admin\controller;

use think\Validate;

class MenberValidate extends Validate{
    protected $rule = [
        'username'           => 'require',
        'phone'              => 'require|mobile',
        'real_time'          => 'require',
        'id_card'            => 'require|idCard'
    ];
}
?>