<?php
namespace Home\Model;
use Think\Model;
class ItemModel extends Model{
	
	// 获取英雄阵型信息
	 function GetFormation($uid) {
		$table = M ( 'useritem' );
		$map ['Uid'] = $uid;
	
		for($i = 0; $i <= 5; $i ++) {
			$a = $i + 1;
			$map ['IsFormation'] = $a;
			$rel = $table->where ( $map )->select ();
				
			if ($rel == null) {
				$formation ['pos' . $a] = 0;
			} else {
				$formation ['prototypeID'] = $rel [0] ['FormationID'];
				$formation ['pos' . $a] = $rel [0] ['ItemID'];
			}
		}
		return $formation;
	}
	// 获取人物过关卡信息
	 function GetMission($uid) {
		return object ()
	
		;
	}
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