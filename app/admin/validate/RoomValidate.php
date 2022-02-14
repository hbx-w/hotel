<?php
namespace app\admin\validate;
use think\facade\Validate;
class RoomValidate extends Validate{
    protected $rule = [
        'type'       => 'require',
        'room_num'   => 'require',
        'yprice'     => 'require|egt:0.00',
        'price'      => 'require|egt:0.00',
        'desc'       => 'require'
    ];
}
?>