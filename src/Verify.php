<?php
namespace houzhonghua\verify;

// 身份证验证
use houzhonghua\verify\extend\VerifyID;

class Verify
{	
	// 身份证验证
	public static function ID($id){

		return VerifyID::isCard($id);
	}
}