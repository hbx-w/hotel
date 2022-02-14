<?php
namespace app\admin\controller;
class Test extends Base{
    public function index()
    {
       $create_time = time();
       echo $create_time;
    }
}
?>