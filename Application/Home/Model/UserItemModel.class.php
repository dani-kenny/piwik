<?php
namespace Home\Model;
use Think\Model\ViewModel;
use Think\Model;
class UserItemModel extends Model
{
	function getUserhero($uid)
	{
		$usrmess = S ( 'user_' . $uid );
		$table = M ( 'userinfo' );
		//$map ['UserVip'] = intval ( $usermess ['level'] );
		$map ['Uid'] = array (
				'eq',
				$usrmess ['id']
		);
		$rel = $table->where ( $map )->select ();
		//dump($rel);
		if(!empty ( $rel )){
			for($i = 0; $i < count ( $rel ); $i ++) {
					
				$user = S ( 'user_' . $rel [$i] ['Uid'] );
				unset ( $user ['coins'], $user ['cash'], $user ['clientId'], $user ['levels'] );
				for($j = 0; $j < count ( $user ['items'] ); $j ++) {
					if ($user ['items'] [$j] ['type'] == 1) {
						unset ( $user ['items'] [$j] ['createTS'] );
					}
				}
			}
		}
		return $user;
	}
}