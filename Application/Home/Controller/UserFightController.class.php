<?php

namespace Home\Controller;

use Think\Controller;

class UserFightController extends Controller {
	// 生成战斗录像
	// 用户队列$userA,$userB
	public function FightRecord() {
		// 测试数据
		// $userA = $user1;
		// $userB = $user2;
		$user1 [0] = array (
				"Patt" => 114,
				"Matt" => 50,
				"HP" => 1000,
				"Pdef" => 50,
				"Mdef" => 60 
		);
		$user1 [1] = array (
				"Patt" => 334,
				"Matt" => 70,
				"HP" => 1800,
				"Pdef" => 80,
				"Mdef" => 30 
		);
		$user2 [0] = array (
				"Patt" => 234,
				"Matt" => 170,
				"HP" => 1200,
				"Pdef" => 80,
				"Mdef" => 130 
		);
		$user2 [1] = array (
				"Patt" => 34,
				"Matt" => 270,
				"HP" => 800,
				"Pdef" => 20,
				"Mdef" => 100 
		);
		// $userA=current($user1);
		// $userB=current($user2);
		// $record=$this->FightTwo($userA, $userB, $first＝1);
		$a = array ();
		for($i = 0; $i < count ( $user1 ); $i ++) {
			for($j = 0; $j < count ( $user2 ); $j ++) {
				echo $i . $j;
				dump ( $user2 [$j] ["HP"] );
				$record = $this->FightTwo ( $user1 [$i], $user2 [$j], $first＝1 );
				// $a=array();
				array_push ( $a, $record );
				$end = end ( $record );
				
				if ($end ["tmp1"] == 0) {
					$user2 [$j] ["HP"] = $end ["tmp2"];
					// $record1=$this->FightTwo(next($user1), $userB, $first＝1);
					break;
				} else {
					$user1 [$i] ["HP"] = $end ["tmp1"];
				}
			}
		}
		
		dump ( $a );
		
		// for($i = 0; $i < count ( $user1 ); $i ++) {
		// foreach ($user1[$i] as $key=>$value)
		// {
		// echo "\$user1[$i][$key] => $value.\n";
		// }
		// 确定回合数
		// $tmp1 = ceil ( $user1 [$i] ["HP"] / ($user1 [$i] ["Patt"] - $user2 [$i] ["Pdef"]) );
		// $tmp2 = ceil ( $user1 [$i] ["HP"] / ($user2 [$i] ["Patt"] - $user1 [$i] ["Pdef"]) );
		// for($j = 1; $j <= $tmp1; $j ++) {
		// $thp = $user1 [$i] ["HP"] - ($user2 [$i] ["Patt"] - $user1 [$i] ["Pdef"]) * $j;
		// if ($thp >= 0) {
		// echo "$thp.\n";
		// }
		
		// }
		// if($i==0)
		// {
		// $record=$this->FightTwo($user1[$i], $user2[$i], $first＝1);
		// }
		// // dump($record);
		// $end=end($record);
		
		// if($end["tmp1"]==0)
		// {
		// $user2[$i]["HP"]=$end["tmp2"];
		// $record1=$this->FightTwo($user1[$i+1], $user2[$i], $first＝1);
		// dump($record1);
		// $a=array_merge($record,$record1);
		// }
		// else{
		// $user1[$i]["HP"]=$end["tmp1"];
		// $record2=$this->FightTwo($user1[$i], $userB[$i+1], $first＝1);
		// $a=array_merge($record,$record1);
		// }
		// //}
		

	}
	// 获取用户的战斗参数值
	private function FightData($uid) {
		// 获取用户战斗阵列
		// 获取用户基础属性
	}
	// 两人战斗
	// 两名队员参数，及谁先手默认A先手
	private function FightTwo($userA, $userB, $first＝1) {
		if ($first == 1) {
			for($i = 1; $i <= 70; $i ++) {
				
				if ($i % 2 == 0) {
					$thp1 [$i] = $userA ["HP"] - ($userB ["Patt"] - $userA ["Pdef"]) * $i;
					$thp2 [$i] = $userB ["HP"] - ($userA ["Patt"] - $userB ["Pdef"]) * ($i - 1);
				} 

				else {
					$thp1 [$i] = $userA ["HP"] - ($userB ["Patt"] - $userA ["Pdef"]) * ($i - 1);
					$thp2 [$i] = $userB ["HP"] - ($userA ["Patt"] - $userB ["Pdef"]) * $i;
				}
				
				if ($thp1 [$i] > 0 && $thp2 [$i] > 0) {
					
					$recod [$i] = array (
							"tmp1" => $thp1 [$i],
							"tmp2" => $thp2 [$i] 
					);
				} elseif ($thp1 [$i] <= 0) {
					$recod [$i] = array (
							"tmp1" => 0,
							"tmp2" => $thp2 [$i] 
					);
					break;
				} elseif ($thp2 [$i] <= 0) {
					$recod [$i] = array (
							"tmp1" => $thp1 [$i],
							"tmp2" => 0 
					);
					break;
				}
				// dump($recod);
			}
		} else {
			for($i = 1; $i <= 10; $i ++) {
				
				if ($i % 2 == 0) {
					$thp1 [$i] = $userA ["HP"] - ($userB ["Patt"] - $user1 ["Pdef"]) * ($i - 1);
					$thp2 [$i] = $userB ["HP"] - ($userA ["Patt"] - $userA ["Pdef"]) * $i;
					// 队1每次剩下的血量
				} 

				else {
					// 队2每次剩下的血量
					$thp1 [$i] = $userA ["HP"] - ($userB ["Patt"] - $user1 ["Pdef"]) * $i;
					$thp2 [$i] = $userB ["HP"] - ($userA ["Patt"] - $userA ["Pdef"]) * ($i - 1);
				}
				
				if ($thp1 [$i] > 0 && $thp2 [$i] > 0) {
					
					$recod [$i] = array (
							"tmp1" => $thp1 [$i],
							"tmp2" => $thp2 [$i] 
					);
				} elseif ($thp1 [$i] <= 0) {
					$recod [$i] = array (
							"tmp1" => 0,
							"tmp2" => $thp2 [$i] 
					);
					break;
				} elseif ($thp2 [$i] <= 0) {
					$recod [$i] = array (
							"tmp1" => $thp1 [$i],
							"tmp2" => 0 
					);
					break;
				}
				// dump($recod);
			}
		}
		return $recod;
	}
}  