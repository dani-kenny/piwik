<?php

namespace Home\Controller;

use Think\Controller;

class InitController extends TSsanguoController {
	// 初始化游戏接口
	public function Init($usrID) {
		// header('Content-type:text/json');
		// $date=time();
		if ($usrID == null) {
			// $e=InitController::GateErro(10001);
			// $erro=$e[0]['ErroID'];
			// $arr=array('error'=>intval($erro),'data'=>array(),'ts'=>$date,'updatedata'=>array());
			$tmp = CommonController::returnErro ( 1 );
			$data ['data'] = array ();
		} else {
			$uid = $usrID;
			// 假设服务器有1台，就对1取mod
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
			
			// $arr=array('error'=>$erro,'data'=>,'ts'=>$date,'updateData'=>array());
			
			// dump($data);
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