<?php
namespace Home\Controller;
use Think\Controller;
class TSsanguoController extends Controller{
	function Init()
	{
		//http://42.121.4.140/TSsanguo/init?para={"channel":"base","debug":1,"os":"ios","userid":"1431347899928","version":"1.0.0"}&ts=1431349709&hash=ff0e28c93426b96dea1a348020fd5dee
		$para=json_decode($_POST['para'],true);
		//dump(json_decode($para,true));
			$test=InitController::Init($para['userid']);
		
		
	}
	function getUserData()
	{
		$para=json_decode($_GET['para'],true);
		$test=GetUserInfoController::GetUserData($para['userid']);
	}
}