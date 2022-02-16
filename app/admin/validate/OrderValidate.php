<?php
namespace app\admin\validate;
use think\Validate;
class OederValidate extends Validate{
    protected $rule = [
        'real_name'  => 'require',
        'phone'      => 'require|mobile'
 
    ];
}
?>