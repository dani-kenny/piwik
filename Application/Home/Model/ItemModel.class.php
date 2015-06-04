<?php
namespace Home\Model;
use Think\Model;
class ItemModel extends Model{
	

	// 获取装备信息
	 function ItemMessage($uid) {
		$table = M ( 'useritem' );
		$map ['Uid'] = $uid;
	
		$rel = $table->where ( $map )->select ();
	
		for($i = 0; $i < count ( $rel ); $i ++) {
				
			if ($rel [$i] ['ItemType'] == 1) {
	
				$tmp [] = array (
						'id' => $rel [$i] ['ItemID'],
						'prototypeID' => $rel [$i] ['ItemPrototypeID'],
						'type' => $rel [$i] ['ItemType'],
						'count' => 1,
						'createTS' => $rel [$i] ['CreateTS'],
						'attack' => $rel [$i] ['HummanAttack']
				);
				// $b=array_push($b,$tmp);
			}
		}
	
		return $tmp;
	}
}