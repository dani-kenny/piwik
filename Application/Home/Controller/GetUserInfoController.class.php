<?php

namespace Home\Controller;

use Think\Controller;
use Think\Controller\FristController;

class GetUserInfoController extends Controller {
	// 创建用户信息
	
	// 获取用户信息
	public function GetUserData($userid, $channel) {
		$uid = $userid;
		if ($uid == null) {
			$e = InitController::GateErro ( 10001 );
			$erro = $e [0] ['ErroID'];
			$arr = array (
					'error' => intval ( $erro ),
					'data' => array (),
					'ts' => time (),
					'updateData' => array () 
			);
			$b = ConvertController::array_to_object ( $arr );
			
			$this->ajaxReturn ( $b );
			break;
		}
		switch ($channel) {
			case "base" :
				$plat = 1;
				break;
			case "" :
				$plat = 2;
				break;
			case "" :
				$plat = 3;
				break;
		}
		
		// 判断缓存中是否存在这个键值的缓存，不存在创建一个新用户，并写入数据库
		GetUserInfoController::isUser ( $uid, $plat );
		$user = S ( "user_" . $uid . $plat );
		$arr = array (
				'erro' => 0,
				'data' => $user 
		);
		$b = ConvertController::array_to_object ( $arr );
		$this->ajaxReturn ( $b );
	}
	// 判断是否存在此用户
	private function IsUser($userid, $plat) {
		$user = S ( "user_" . $userid . $plat );
		if ($user == True) {
			// 读出$uid的所有信息返回给客户端
			return $user;
		} else {
			// 如果没有的话创建所有的初始常亮并返回客户端
			GetUserInfoController::GetUserMessage ( $userid, $plat );
		}
	}
	// 获取人物数据的信息
	private function GetUserMessage($userid, $plat) {
		$table = M ( 'userinfo' );
		$map ['ClientId'] = $userid;
		$map ['FromPlatformId'] = $plat;
		$rel = $table->where ( $map )->select ();
		if (empty($rel)) {
			//$table = M ( 'userinfo' );
			//写入人物基本信息表‘ts_userinfo’
			$data['ClientId'] = $userid;
			$data['FromPlatformId'] = $plat;
			$data['UserRegTS'] = time ();
			$data['UserLoginTS']  = time ();			
			$newid=$table->add ($data);
			
			
			//初始化英雄部分
			GetUserInfoController::getHeroMessage($newid);
			//初始化装备部分
			
			// 并写入cache
			GetUserInfoController::WriteMem ( $userid, $plat );
		} else {
			return $rel;
		}
	}
	// 将数据写入cache
	private function WriteMem($userid, $plat) {
		$table = M ( 'userinfo' );
		$map ['ClientId'] = $userid;
		$map ['FromPlatformId'] = $plat;
		$rel = $table->where ( $map )->select ();
		$unit ['id'] = $rel [0] ['Uid'];
		$unit ['clientId'] = $userid;
		$unit ['fromPlatFormId'] = $plat;
		$unit ['ts'] = $rel [0] ['UserRegTS'];
		// 以下先写死
		$unit ['name'] = "user".$rel [0] ['Uid'];
		$unit ['Money'] = 1000;
		$unit ['Cash'] = 10;
		// 物品
		$unit ['items'] = GetUserInfoController::ItemMessage($userid);
		// 阵型
		$unit ['formation'] = array (
				"prototypeID" => 1,
				"pos1" => 3000001 
		);
		// 关卡
		$unit ['levels'] = GetUserInfoController::GetMission ( $userid );
		
		// 人物所有信息写入cache
		S ( "user_" . $userid . $plat, $unit );
	}
	// 获取装备信息
	private function ItemMessage($uid) {
		//$a=array("id"=>1000001,"prototypeID"=>1001,"count"=>1,"CreateTS"=>time());
		//$b=array("id"=>2000001,"prototypeID"=>3001,"count"=>1,"CreateTS"=>time(),"attack"=>1000);
		//$c=array("id"=>2000001,"prototypeID"=>3001,"count"=>1,"CreateTS"=>time(),"attack"=>1000,"eqID1"=>2000001,"eqID2"=>-1);
		return array($a,$b,$c);
	}
	// 获取人物过关卡信息
	private function GetMission($uid) {
		return array (
				array (
						"id" => 1001,
						"star" => 1 
				),
				array (
						"id" => 1002,
						"star" => 2 
				) 
		);
	}
	//获取初始化英雄
	private function getHeroMessage($uid)
	{
	   //写入人物物品表‘ts_useritem’
		$table=M('ts_useritem');
		$item['Uid']=$uid;
		$item['ItemType']=1;
		$item['ItemCount']=2;
		//人物原型id
		$item['ItemPrototypeID']=1;
		//查找英雄表
		$hero=M('hero');
		$map['id']=$item['ItemPrototypeID'];
		$rel=$hero->where ( $map )->select ();
		//物理攻击力
		$item['HummanAttack']=$rel[0]['DC'];
		//防御力
		$item['HummanDef']=$rel[0]['AC'];
		//..其中还有一些字段没有假如进去
		$table->add($item);
		
	}
	
}