<?php
//
namespace Home\Controller;

use Home\Common;
use Think\Controller;

class TSsanguoController extends Controller {
	function getpara() {
		if (json_decode ( $_POST ['para'], true ) == null) {
			return $para = json_decode ( $_GET ['para'], true );
		} else {
			return $para = json_decode ( $_POST ['para'], true );
		}
	}
	function Init() {
		// http://127.0.0.1:1100/TSsanguo/init?para={"channel":"base","debug":1,"os":"ios","userid":"1431347899928","version":"1.0.0"}&ts=1431349709&hash=ff0e28c93426b96dea1a348020fd5dee
		$para = $this->getpara ();
		$test = InitController::Init ( $para ['userID'] );
	}
	function getUserData() {
		$para = $this->getpara ();
		$test = GetUserInfoController::GetUserData ( $para ['userID'], $para ['channel'] );
	}
	function reportOnline() {
		$data ['data'] = array ();
		$para = $this->getpara ();
		$logout = CommonController::logoutTime ( $para ['userID'] );
		$tmp = CommonController::returnErro ( 0 );
		$arr = array_merge ( $tmp, $data );
		$b = ConvertController::array_to_object ( $arr );
		echo json_encode ( $b, JSON_NUMERIC_CHECK );
	}
	function pvpSearchUser() {
		$para = $this->getpara ();
		PvpUserController::seachContion ( $para ['userID'] );
	}
	function pvpFight(){
		$para = $this->getpara ();
		UserFightController::FightRecord( $para ['userID'],$para['targetUserID']);
	}
	function checkData()
	{
		$errocode=CommonController::checkClient();
		echo $errocode;
	}
	function test()
	{
		$view=D('UserItemView');
		$map['uid']='100000000';
		$list=$view->where($map)->select();
		dump($list);
		$info=S('user_'.'100000000');
		dump($info);
	}
}