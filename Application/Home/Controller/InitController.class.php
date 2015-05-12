<?php
namespace Home\Controller;
use Think\Controller;
class InitController extends TSsanguoController{
	//初始化游戏接口
	public function  Init($usrid)
	{
		//header('Content-type:text/json');
		$uid=$usrid;
		//假设服务器有1台，就对1取mod
		$i=$uid%1;
		switch($i){
		case 0:
		
			$url="127.0.0.1";
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
		$date=time();
		$e=InitController::GateErro(10001);
		//dump($e[0]['ErroID']);
		$arr=array('error'=>$e[0]['ErroID'],'data'=>array('url'=>$url),'TS'=>$date,'update'=>array());
		 $b=ConvertController::array_to_object($arr);
		
		$this->ajaxReturn($b);
		
		
	
	}
	//错误代码
	private function GateErro($erro)
	{
		
		$use=M('erro');
		$map['ErroID']=$erro;
		return $use->where($map)->select();
		
	}
}