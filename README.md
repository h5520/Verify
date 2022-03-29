# 使用方式

```bash
composer require houzhonghua/verify dev-main
```

身份证验证
=============

## 引入

```php
use houzhonghua\verify\Verify;
```

## 调用验证身份证号码格式方法
```php
$res = Verify::ID("513721199412194010");
if($res){
    return '验证通过';
}
```

短信验证
===========

手册地址：https://www.kancloud.cn/newphper/tpsms/1375119

## 引入
```php
use houzhonghua\verify\SmsVerify;
```

```php
// 生成验证码并缓存
$code = (new TpSms())->mobile('18888888888')->create();

// 生成登录（login）场景的验证码并缓存
$code = (new TpSms())->scene('login')->create();

// 手动传入号码和验证码
$tpSms->mobile('18888888888')->code('123456')->check();

// 验证短信验证码
$tpSms = new TpSms();
if(! $tpSms->check()){
    //验证失败，获取失败信息
    $msg = $tpSms->getErrorMsg();
}

// 验证登录（login）场景短信验证码
$tpSms = new TpSms();
if(! $tpSms->scene('login')->check()){
    //验证失败，获取失败信息
    $msg = $tpSms->getErrorMsg();
}
```