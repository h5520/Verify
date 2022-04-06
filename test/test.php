<?php
// declare (strict_types = 1);

namespace app\index\controller;
use app\index\BaseController;
use houzhonghua\verify\Verify;
use houzhonghua\verify\SmsVerify;

class Test extends BaseController
{   
    /**
     * 身份证验证
     * @Author   Hou
     * @DateTime 2022-03-29T15:39:18+0800
     * @return   [type]                   [description]
     */
    public function test(){

        $res = Verify::ID("513721199412194010");
        if($res){
            return '验证通过';
        }
        
    }

    /**
     * 短信验证
     * 手册地址：https://www.kancloud.cn/newphper/tpsms/1375119
     * @Author   Hou
     * @DateTime 2022-03-29T15:39:09+0800
     * @return   [type]                   [description]
     */
    public function smsverify()
    {
        // 生成配置文件
        $config = [
            'cachePrefix' => 'tpsms',
            // 验证码字符池
            'character' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            // 验证码过期时间（s），默认 3 分钟
            'expire' => 180,
            // 验证码位数
            'length' => 6,
            // 验证码类型
            'type' => 1,
            // 验证码
            'code' => '',
            // 场景
            'scene' => '',
            // 错误信息
            'error' => '',
            // 手机号字段名
            'mobileName' => 'mobile',
            // 验证码字段名
            'codeName' => 'code'
        ];
        
        // 生成验证码并缓存
        $code = (new SmsVerify($config))->mobile('18888888888')->create();

        // 生成登录（login）场景的验证码并缓存
        $code = (new SmsVerify($config))->scene('login')->create();

        // 手动传入号码和验证码
        $smsVerify->mobile('18888888888')->code('123456')->check();

        // 验证短信验证码
        $smsVerify = new SmsVerify();
        if(! $smsVerify->check()){
            //验证失败，获取失败信息
            $msg = $smsVerify->getErrorMsg();
        }

        // 验证登录（login）场景短信验证码
        $smsVerify = new SmsVerify();
        if(! $smsVerify->scene('login')->check()){
            //验证失败，获取失败信息
            $msg = $smsVerify->getErrorMsg();
        }
    }


}