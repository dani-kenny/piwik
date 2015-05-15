<?php
namespace Home\Controller;
use Think\Controller;
class TSsanguoController extends Controller{
	function getpara()
	{   
	    
		if(json_decode($_POST['para'],true)==null)
		{
			return $para=json_decode($_GET['para'],true);
		}
		else 
		{
			return $para=json_decode($_POST['para'],true);
		}
	}
	function test()
	{
		//phpinfo();
		$table=M('userinfo');
		$map['Uid']=10000;
		$rel=$table->where($map)->select();
		dump($rel);
// 		$table=M('userinfo');
// 		$data['ClientId'] = 11111;
// 		$data['FromPlatformId'] = 111;
// 		$data['UserRegTS'] = time ();
// 		$data['UserLoginTS'] = time ();

// 		$table->add ($data);
	}
	function Init()
	{
		//http://127.0.0.1:1100/TSsanguo/init?para={"channel":"base","debug":1,"os":"ios","userid":"1431347899928","version":"1.0.0"}&ts=1431349709&hash=ff0e28c93426b96dea1a348020fd5dee
		$para=$this->getpara();
		//dump(json_decode($para,true));
			$test=InitController::Init($para['userid']);
		
		
	}
	function getUserData()
	{
		$para=$this->getpara();
		//dump($para);
		$test=GetUserInfoController::GetUserData($para['userid'],$para['channel']);
	}

}