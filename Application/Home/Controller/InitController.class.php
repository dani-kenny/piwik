<?php
namespace Home\Controller;
use Think\Controller;
class InitController extends TSsanguoController{
	//初始化游戏接口
	public function  Init($usrid)
	{
		//header('Content-type:text/json');
		$date=time();
		if($usrid==null)
		{
			$e=InitController::GateErro(10001);
			$erro=$e[0]['ErroID'];
			$arr=array('error'=>intval($erro),'data'=>array(),'ts'=>$date,'updatedata'=>array());
		}
		else 
		{
		$uid=$usrid;
		//假设服务器有1台，就对1取mod
		$i=$uid%1;
		switch($i){
		case 0:
		
			$url="http://42.121.4.140/TSsanguo/";
		
		    break;
		case 1:
			$url="";
			break;
		case 2:
			$url="";
			break;
		case 3:
			$url="";
			break;
		
		}
		$erro=0;
		$arr=array('error'=>$erro,'data'=>array('url'=>$url),'ts'=>$date,'updateData'=>array());
		}
		
		
		
		
		 $b=ConvertController::array_to_object($arr);
		
	      echo stripslashes(json_encode($b));
		
		
	
	}
	//错误代码
	public function GateErro($erro)
	{
		
		$use=M('erro');
		$map['ErroID']=$erro;
		return $use->where($map)->select();
		
	}
}