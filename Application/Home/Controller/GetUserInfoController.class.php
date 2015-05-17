<?php

namespace Home\Controller;
use Home\Common;
use Think\Controller;
use Think\Controller\FristController;

class GetUserInfoController extends Controller {
	// 创建用户信息
	
	// 获取用户信息
	public function GetUserData($userid, $channel) {
		$uid = $userid;
		if ($uid == null) {
			$tmp=CommonController::returnErro(1);
			$data['data']=array();
		}
		else{
			$tmp=CommonController::returnErro(0);
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
			GetUserInfoController::isUser ( $uid, $plat );
			$user = S ( "user_" . $uid . $plat );
			$data['data']=$user;
		}
        $arr=array_merge($tmp,$data);
	//	$b = ConvertController::array_to_object ( $arr );
		//$this->ajaxReturn ( $b );
		echo stripslashes ( json_encode ( $arr ,JSON_NUMERIC_CHECK) );
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
			$data['Uid']=GetUserInfoController::createUid($plat);
			$data['ClientId'] = $userid;
			$data['FromPlatformId'] = $plat;
			$data['UserName']="user".$data['Uid'];
			$data['UserCash']=10;
			$data['UserMoney']=1000;
			$data['UserRegTS'] = time ();
			$data['UserLoginTS']  = time ();			
			$table->add ($data);			
			//初始化英雄部分
			GetUserInfoController::getHeroMessage($data['Uid']);
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

		// 以下先写死
		$unit ['name'] =$rel [0] ['UserName'];
		$unit ['coins'] = $rel[0]['UserMoney'];
		$unit ['cash'] = $rel[0]['UserCash'];
		$unit['level']=$rel[0]['UserVip'];
		$unit['exp']=$rel[0]['UserExp'];
		// 物品
		$unit ['items'] = GetUserInfoController::ItemMessage($rel [0] ['Uid']);
		// 阵型
		$unit ['formation'] =GetUserInfoController::GetFormation($rel [0] ['Uid']);
		// 关卡
		$unit ['levels'] = array();
		
		// 人物所有信息写入cache
		S ( "user_" . $userid . $plat, $unit );
	}
	// 获取装备信息
	private function ItemMessage($uid) {
		$table=M('useritem');
		$map['Uid']=$uid;
		
		$rel=$table->where($map)->select();
	
		
			for($i=0;$i<count($rel);$i++)
			{
				
				if($rel[$i]['ItemType']==1)
		     {
		     	
				$tmp[]=array('id'=>$rel[$i]['ItemID'],'prototypeID'=>$rel[$i]['ItemPrototypeID'],'type'=>$rel[$i]['ItemType'],'count'=>1,'createTS'=>$rel[$i]['CreateTS'],'attack'=>$rel[$i]['HummanAttack']);
		        //$b=array_push($b,$tmp);	
		     }
		}
	
		return $tmp;
	}
	// 获取人物过关卡信息
	private function GetMission($uid) {
		return object(
	
		);
	}
	//获取英雄阵型信息
	private function GetFormation($uid)
	{
		$table=M('useritem');
		$map['Uid']=$uid;
		
		for($i=0;$i<=5;$i++)
		{
			$a=$i+1;
           $map['IsFormation']=$a;
           $rel=$table->where($map)->select();
         
           
           if($rel==null)
           {
           	$formation['pos'.$a]=0;
           }
           else 
           {
           	$formation['prototypeID']=$rel[0]['FormationID'];
           	$formation['pos'.$a]=$rel[0]['ItemID'];
           }
           
			
		}
		return $formation;
		
	}
	//获取初始化英雄
	private function getHeroMessage($uid)
	{
		
		
		
		$line = C('hero');
		for($i=0;$i<count($line);$i++)
		{
			$e=explode(",",$line[$i]);
			//写入物品表‘ts_useritem’
			$table=M('useritem');
			$item['Uid']=$uid;
			$item['ItemPrototypeID']=$e[0];
			if($e[1]==1)
			{
				$item['ItemType']=$e[1];
				$item['IsFormation']=$e[3];
				$item['FormationID']=$e[4];
				$hero=M('hero');
				$map['Index']=$item['ItemPrototypeID'];
				$rel=$hero->where ( $map )->select ();
				//物理攻击力
				$item['HummanAttack']=$rel[0]['DC'];
				//防御力
				$item['HummanDef']=$rel[0]['AC'];
				//..其中还有一些字段没有假如进去
			}
			
			$item['ItemCount']=$e[2];
			$item['CreateTS']=time();
			
			$table->add($item);
		}
	  
		
	}
	private function createUid($plat)
	{
		
		$table=M('userinfo');
		//$map['ClientId']=$uid;
		$map['FromPlatformId']=$plat;
		$rel=$table->where($map)->select();
		
		if($rel==null)
		{
			switch ($plat){
				case 1:
					return 100000000;
					break;
				case 2:
					return 200000000;
					break;
				case 3:
					return 300000000;
					break;
			}
			
			
		}
		else 
		{
			$rel=$table->where($map)->max('Uid');
			return $rel+1;
		}
		
	}
	
}