<?php

namespace Home\Controller;

use Think\Controller;

class UserFightController extends Controller {
	// 生成战斗录像
	// 用户队列$userA,$userB
	 function FightRecord($uid,$tarid){
		if(UserFightController::isUserOnline($tarid)==1)
		{
			$tmp= CommonController::returnErro(3);
			$data ['data'] = array ();
		}
		else{
			$tmp= CommonController::returnErro(0);
			//$sinfo=S('user_'.$uid);
			//$tarinfo=S('user_'.$tarid);
			$user1=UserFightController::FightData($uid);
			$user2=UserFightController::FightData($tarid);
			$a = array ();
			$b=current($user1);
			$c=current($user2);
			do {
				$record=UserFightController::Fight ( $b, $c);
				array_push($a, $record);
				$end=end($record);
				if($end["ahp"]==0)
				{
					$c['HP']=$end['bhp'];
					if(count($user1)>0)
					{
						$b=next($user1);
						array_shift($user1);
					}
				}
				elseif($end["bhp"]==0)
				{
					$b['HP']=$end['ahp'];
					if(count($user2)>0)
					{
						$c=next($user2);
						array_shift($user2);
					}
				}
			
			}
			while(count($user1)>0&&count($user2)>0); 
			foreach ( $a as $k => $v ) {
				foreach ( $v as $m => $n ) {
					unset($n['ahp'],$n['bhp']);
					//unset();
					$log[] = $n;
				}
			}
			$usermess=D('UserItem');
			$sinfo=$usermess->getUserhero($uid);
			$tarinfo=$usermess->getUserhero($tarid);
			$endlog=end($log);
			$vuid=$endlog['auid'];
			$data['data']=array('aud'=>$sinfo,'tud'=>$tarinfo,'vuid'=>$vuid,'log'=>$log);
		}
		
		$arr = array_merge ( $tmp, $data );
		echo json_encode ( $arr, JSON_NUMERIC_CHECK );
		
	}
	function isUserOnline($tarid){
		$view=D('UserItemView');
		$map['uid']=$tarid;
		$rel=$view->where($map['uid'])->find();
		if((time()-$rel['logoutTS'])<180)		
		{
			return 1;
		}
	}
	// 获取用户的战斗参数值
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
	function Fight($userA,$userB)
	{
		$userAdmg=$userA['ac']-$userB['dc'];
		$userBdmg=$userB['ac']-$userA['dc'];
		$tempB=intval($userB['HP']);
		$tempA=intval($userA['HP']);
	
		do{
			

			if($tempB>0)
			{
				//dump($tempB);
				$tempB=$tempB-$userAdmg;
				$replay[]=array(
						'auid'=>$userA['uid'],
						'aid'=>$userA['heroid'],			
						'tid'=>$userB['heroid'],
						'dmg'=>$userA['ac']-$userB['dc'],
						'crit'=>0,
						'ahp'=>$tempA,
						'bhp'=>$tempB
				);
				
			}
			else
			{
				$replay[]=array(
						'auid'=>$userA['uid'],
						'aid'=>$userA['heroid'],
						'tid'=>$userB['heroid'],
						'dmg'=>$userA['ac']-$userB['dc'],
						'crit'=>0,
						'ahp'=>$tempA,
						'bhp'=>0);
				break ;
			}
			
			if($tempA>0&&$tempB>0)
			{
				$tempA=$tempA-$userBdmg;
				$replay[]=array(
						'auid'=>$userB['uid'],
						'aid'=>$userB['heroid'],
						'tid'=>$userA['heroid'],
						'dmg'=>$userB['ac']-$userA['dc'],
						'crit'=>0,
						'ahp'=>$tempA,
						'bhp'=>$tempB
				);
			}
			elseif($tempB>0)
			{
				//dump($tempB);
				$replay[]=array(
						'auid'=>$userB['uid'],
						'aid'=>$userB['heroid'],
						'tid'=>$userA['heroid'],
						'dmg'=>$userB['ac']-$userA['dc'],
						'crit'=>0,
						'ahp'=>0,
						'bhp'=>$tempB
				);
				break ;
			}
		}while($tempB>0&&$tempA>0);
		
		return $replay;
	}
	// 两人战斗
	// 两名队员参数，及谁先手默认A先手

}  