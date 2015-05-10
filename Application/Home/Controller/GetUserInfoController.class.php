<?php
namespace Home\Controller;
use Think\Controller;
use Think\Controller\FristController;
class GetUserInfoController extends Controller{
	//创建用户信息

	//获取用户信息
	public function GetUserData()
	{
		$uid=$_GET['uid'];
		$plat=$_GET['plat'];
		//判断缓存中是否存在这个键值的缓存，不存在创建一个新用户，并写入数据库
		$this->IsUser($uid, $plat);
		$user=S("user_".$uid.$plat);
		$arr=array('erro'=>0,'data'=>$user);
		$b=ConvertController::array_to_object($arr);
		$this->ajaxReturn($b);
	}
	//判断是否存在此用户
	private function IsUser($userid,$plat)
	{
		$user=S("user_".$userid.$plat);		
		if($user==True)
		{
			//读出$uid的所有信息返回给客户端
			return $use;
						
		}
		else 
		{
			//如果没有的话创建所有的初始常亮并返回客户端
			$this->GetUserMessage($userid, $plat);
			
		}

	}
	//获取人物数据的信息
	private function GetUserMessage($userid,$plat)
	{
		$table=M('Userinfo');
		$map['ClientId']=$userid;
		$map['FromPlatformId']=$plat;
		$rel=$table->where($map)->select();
		 if($rel==false)
		 {
		 	$table->ClientId=$userid;
		 	$table->FromPlatformId=$plat;
		 	$table->UserRegTS=time();
		 	$table->UserLoginTS=time();
		 	$table->add();
		 	//并写入cache
		 	$this->WriteMem($userid, $plat);
		 } 
		 else 
		 {
		 	return $rel;
		 }	
	}
	//将数据写入cache
	private  function WriteMem($userid,$plat)
	{
		$table=M('Userinfo');
		$map['ClientId']=$userid;
		$map['FromPlatformId']=$plat;
		$rel=$table->where($map)->select();
		$unit['ID']=$rel[0]['Uid'];
		$unit['ClientId']=$userid;
		$unit['FromPlatformId']=$plat;
		$unit['ts']=$rel[0]['UserRegTS'];
		//以下先写死
		$unit['name']='qinxiaosao';
		$unit['Money']=1000;
		$unit['Cash']=10;
		$unit['items']=null;
		$unit['Formation']=array("PrototypeID"=>1,"pos1"=>3000001);
		$unit['updatedata']=array();
		//人物所有信息写入cache
		S("user_".$userid.$plat,$unit);
	}
	//获取装备信息
	private function ItemMessage($uid)
	{
		
	}
	//获取人物过关卡信息
	
}