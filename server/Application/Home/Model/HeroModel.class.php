<?php
namespace Home\Model;
use Think\Model;
class HeroModel extends ItemModel{
	function FightData($uid) {
		// 获取用户战斗阵列
		$view=D('UserItemView');
		$map['type']=1;
		$map['FormationID']=array('neq',0);
		$map['uid']=$uid;
		// 获取用户基础属性
		$rel=$view->where($map)->order('formation asc')->select();
		return $rel;
	}
	// 获取初始化英雄
	 function getHeroMessage($uid) {
		$line = C ( 'hero' );
		for($i = 0; $i < count ( $line ); $i ++) {
			$e = explode ( ",", $line [$i] );
			// 写入物品表‘ts_useritem’
			$table = M ( 'useritem' );
			$item ['Uid'] = $uid;
			$item ['ItemPrototypeID'] = $e [0];
			if ($e [1] == 1) {
				$item ['ItemType'] = $e [1];
				$item ['IsFormation'] = $e [3];
				$item ['FormationID'] = $e [4];
				$hero = M ( 'hero' );
				$map ['Index'] = $item ['ItemPrototypeID'];
				$rel = $hero->where ( $map )->select ();
				// 物理攻击力
				$item ['HummanAttack'] = $rel [0] ['DC'];
				// 防御力
				$item ['HummanDef'] = $rel [0] ['AC'];
				// ..其中还有一些字段没有假如进去
			}
				
			$item ['ItemCount'] = $e [2];
			$item ['CreateTS'] = time ();
				
			$table->add ( $item );
		}
	}

}