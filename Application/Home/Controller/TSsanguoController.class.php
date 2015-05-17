<?php
namespace Home\Controller;
use Home\Common;
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
		$table=S('user_100000005');
		dump($table);
		echo dirname(dirname(__FILE__)); 
		$file=dirname(dirname(__FILE__)).'/Common/useritem.txt';
		$str= file_get_contents($file);
		dump(C('hero'));
		
		$keywords = explode(";",$str);
		$e=explode(",",$keywords[0]);
 		$b=preg_split('/\s+/',$keywords);
// 		$c=explode("   ",$keywords[0]);
		dump($keywords);
		dump($b);
		dump($e);
		//phpinfo();
// 		$table=M('userinfo');
// 		$map['Uid']=10000;
// 		$rel=$table->where($map)->select();
// 		dump($rel);
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
			$test=InitController::Init($para['userID']);
		
		
	}
	function getUserData()
	{
		$para=$this->getpara();
		$test=GetUserInfoController::GetUserData($para['userID'],$para['channel']);
	}
	function onlineReport()
	{   $data['data']=array();
		$para=$this->getpara();
		$logout=CommonController::logoutTime($para['userID']);
		$tmp=CommonController::returnErro(0);
		$arr=array_merge($tmp,$data);
		$b = ConvertController::array_to_object ( $arr );
		echo  json_encode ( $b ,JSON_NUMERIC_CHECK) ;
	}
	function  searchPvpUser()
	{
		$para=$this->getpara();
		PvpUserController::seachContion($para['userID']);
	}

}