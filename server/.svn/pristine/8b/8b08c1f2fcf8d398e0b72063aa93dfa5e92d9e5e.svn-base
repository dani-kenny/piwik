<?php

namespace Home\Controller;

use Home\Common;
use Think\Controller;
use Think\Controller\FristController;

class GetUserInfoController extends Controller {
	// 创建用户信息
	
	// 获取用户信息
	public function GetUserData($userid, $channel) {
		$uid = $userid;
		if ($uid == null) {
			$tmp = CommonController::returnErro ( 1 );
			$data ['data'] = array ();
		} else {
			$tmp = CommonController::returnErro ( 0 );
			switch ($channel) {
				case "base" :
					$plat = 1;
					break;
				case "" :
					$plat = 2;
					break;
				case "" :
					$plat = 3;
					break;
			}
			$user = GetUserInfoController::isUser ( $uid, $plat );
			
			// $user = S ( "user_" . $uid . $plat );
			$data ['data'] = $user;
		}
		$arr = array_merge ( $tmp, $data );
		$b = ConvertController::array_to_object ( $arr );
		// $this->ajaxReturn ( $b );
		echo stripslashes ( json_encode ( $arr, JSON_NUMERIC_CHECK ) );
	}
	// 判断是否存在此用户
	private function IsUser($userid, $plat) {
		$data=D('User');
		$table = M ( 'userinfo' );
		$map ['ClientId'] = $userid;
		$map ['FromPlatformId'] = $plat;
		$rel = $table->where ( $map )->select ();
		if (! empty ( $rel )) {
			// 读出$uid的所有信息返回给客户端
			$user = S ( "user_" . $rel [0] ['Uid'] );
			return $user;
		} else {
			// 如果没有的话创建所有的初始常亮并返回客户端
			$user = $data->GetUserMessage ( $userid, $plat );
			return $user;
		}
	}
	


	


	
	

}