<?php

namespace Home\Controller;

use Think\Controller;

class PvpUserController extends TSsanguoController {
	function seachContion($uid) {
		$usrmess = S ( 'user_' . $uid );
		$table = M ( 'userinfo' );
		$map ['UserVip'] = intval ( $usermess ['level'] );
		$map ['Uid'] = array (
				'neq',
				$usrmess ['id'] 
		);
		$rel = $table->where ( $map )->limit ( '3' )->select ();
		if (empty ( $rel )) {
			$tmp = CommonController::returnErro ( 2 );
			$data ['data'] = array ();
		} else {
			for($i = 0; $i < count ( $rel ); $i ++) {
				
				$user = S ( 'user_' . $rel [$i] ['Uid'] );
				unset ( $user ['coins'], $user ['cash'], $user ['clientId'], $user ['levels'] );
				for($j = 0; $j < count ( $user ['items'] ); $j ++) {
					if ($user ['items'] [$j] ['type'] == 1) {
						unset ( $user ['items'] [$j] ['createTS'] );
					}
				}
				$target [] = $user;
			}
			$data ['data'] = $target;
			$tmp = CommonController::returnErro ( 0 );
		}
		$arr = array_merge ( $tmp, $data );
		echo json_encode ( $arr, JSON_NUMERIC_CHECK );
	}
}