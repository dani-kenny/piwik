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
		$map['UserSearchTS']=array('lt',time()-60);
		$map['UserLogoutTS']=array('lt',time()-180);
		$rel = $table->where ( $map )->limit ( '3' )->select ();
		if (empty ( $rel )) {
			$tmp = CommonController::returnErro ( 2 );
			$data ['data'] = array ();
		} else {
			   $table=D('User');
			for($i = 0; $i < count ( $rel ); $i ++) {
				$table->searchProtect($rel[$i]['Uid']);
				$user = S ( 'user_' . $rel [$i] ['Uid'] );
				unset ( $user ['coins'], $user ['cash'], $user ['clientId'], $user ['levels'] );
				for($j = 0; $j < count ( $user ['items'] ); $j ++) {
					if ($user ['items'] [$j] ['type'] == 1) {
						unset ( $user ['items'] [$j] ['createTS'] );
					}
				}
				$all [] = $user;
			}
			
			$data ['data'] = array('targets'=>$all);
			$tmp = CommonController::returnErro ( 0 );
		}
		$arr = array_merge ( $tmp, $data );
		echo json_encode ( $arr, JSON_NUMERIC_CHECK );
	}
}