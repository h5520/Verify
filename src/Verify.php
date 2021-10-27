<?php
namespace houzhonghua\verify;

// 身份证验证
use houzhonghua\verify\extends\VerifyID;

class Verify
{	
	// 身份证验证
	static function ID($id){

		return VerifyID::isCard($id);
	}
}