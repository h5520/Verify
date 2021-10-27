# 使用方式

```bash
composer require houzhonghua/verify dev-main
```

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