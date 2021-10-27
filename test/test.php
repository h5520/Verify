<?php
// declare (strict_types = 1);

namespace app\index\controller;
use app\index\BaseController;
use houzhonghua\verify\Verify;

class Test extends BaseController
{   
    public function test(){

        $res = Verify::ID("513721199412194010");
        if($res){
            return '验证通过';
        }
        
    }
}