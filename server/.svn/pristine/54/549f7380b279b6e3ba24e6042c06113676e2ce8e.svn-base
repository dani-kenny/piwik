<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
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
	function searchProtect($uid)
	{
		$table=M('userinfo');
		$data['UserSearchTS']=time();
		$map['Uid']=$uid;
		$table->where($map)->save($data);
	}
	function fightProtect($uid)
	{
		$table=M('userinfo');
		$data['UserFightTS']=time();
		$map['Uid']=$uid;
		$table->where($map)->save($data);
	}
	function isUserOnline($tarid){
		$view=M('userinfo');
		$map['Uid']=$tarid;
		$rel=$view->where($map)->select();
		if((time()-$rel['logoutTS'])<180)
		{
			return 1;
		}
		}
	 function logoutTime($uid)
		{
			$table=M('userinfo');
			$data['UserLogoutTS']=time();
			$map['Uid']=$uid;
			$table->where($map)->save($data);
		
		}
		// 获取人物数据的信息
	 function GetUserMessage($userid, $plat) {
			$table = M ( 'userinfo' );
			$map ['ClientId'] = $userid;
			$map ['FromPlatformId'] = $plat;
			$rel = $table->where ( $map )->select ();
			if (empty ( $rel )) {
				// $table = M ( 'userinfo' );
				// 写入人物基本信息表‘ts_userinfo’
				$data ['Uid'] =$this->createUid ( $plat );
				$data ['ClientId'] = $userid;
				$data ['FromPlatformId'] = $plat;
				$data ['UserName'] = "user" . $data ['Uid'];
				$data ['UserCash'] = 10;
				$data ['UserMoney'] = 1000;
				$data ['UserRegTS'] = time ();
				$data ['UserLoginTS'] = time ();
				$table->add ( $data );
				// 初始化英雄部分
				$hero=D('Hero');
			    $hero->getHeroMessage ( $data ['Uid'] );
				// 初始化装备部分
					
				// 并写入cache
				//$mem=D('User');
				$rel = $this->WriteMem ( $userid, $plat );
				return $rel;
			} else {
				$rel = S ( "user_" . $rel [0] ['Uid'] );
				return $rel;
			}
		}
	 function createUid($plat) {
			$table = M ( 'userinfo' );
			// $map['ClientId']=$uid;
			$map ['FromPlatformId'] = $plat;
			$rel = $table->where ( $map )->select ();
		
			if ($rel == null) {
				switch ($plat) {
					case 1 :
						return 100000000;
						break;
					case 2 :
						return 200000000;
						break;
					case 3 :
						return 300000000;
						break;
				}
			} else {
				$rel = $table->where ( $map )->max ( 'Uid' );
				return $rel + 1;
			}
		}
		// 将数据写入cache
		 function WriteMem($userid, $plat) {
			$table = M ( 'userinfo' );
			$map ['ClientId'] = $userid;
			$map ['FromPlatformId'] = $plat;
			$rel = $table->where ( $map )->select ();
			$unit ['id'] = $rel [0] ['Uid'];
			$unit ['clientId'] = $userid;
			$unit ['name'] = $rel [0] ['UserName'];
			$unit ['coins'] = $rel [0] ['UserMoney'];
			$unit ['cash'] = $rel [0] ['UserCash'];
			$unit ['level'] = $rel [0] ['UserVip'];
			$unit ['exp'] = $rel [0] ['UserExp'];
			// 物品
			$data=D('Item');
			$unit ['items'] = $data->ItemMessage ( $rel [0] ['Uid'] );
			// 阵型
			$unit ['formation'] =$data->GetFormation ( $rel [0] ['Uid'] );
			// 关卡
			$unit ['levels'] = array ();
			// 人物所有信息写入cache
			S ( "user_" . $rel [0] ['Uid'], $unit );
			return S ( "user_" . $rel [0] ['Uid'] );
		}
	
}