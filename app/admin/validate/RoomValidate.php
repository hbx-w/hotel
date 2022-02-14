<?php
namespace app\admin\validate;
use think\facade\Validate;
class RoomValidate extends Validate{
    protected $rule = [
        'type'  => 'require'
    ];
}
?>