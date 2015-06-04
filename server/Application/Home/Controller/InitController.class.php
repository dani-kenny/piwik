<?php

namespace Home\Controller;

use Think\Controller;

class InitController extends TSsanguoController {
	// 初始化游戏接口
	public function Init($usrID) {

		if ($usrID == null) {
			$tmp = CommonController::returnErro ( 1 );
			$data ['data'] = array ();
		} else {
			$uid = $usrID;
			$i = $uid % 1;
			switch ($i) {
				case 0 :
					
					$url = "http://42.121.4.140/TSsanguo/";
					
					break;
				case 1 :
					$url = "";
					break;
				case 2 :
					$url = "";
					break;
				case 3 :
					$url = "";
					break;
			}
			$data ['data'] = array (
					'url' => $url 
			);
			$tmp = CommonController::returnErro ( 0 );

		}
		
		$arr = array_merge ( $tmp, $data );
		
		
		$b = ConvertController::array_to_object ( $arr );
		
		echo stripslashes ( json_encode ( $b ,JSON_NUMERIC_CHECK) );
	}
	// 错误代码
	public function GateErro($erro) {
		$use = M ( 'erro' );
		$map ['ErroID'] = $erro;
		return $use->where ( $map )->select ();
	}
}