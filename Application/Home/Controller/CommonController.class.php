<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	//通用方法
	//生成放回数据包头错误提示
	public function returnErro($codeErroId)
	{
			switch ($codeErroId){
				//数据没有问题时
				case 0:
					return array('error'=>0,'ts'=>time(),'updateData'=>(object)array());
					break;
					//无uid的时候
				case  1:
					return array('error'=>10001,'ts'=>time(),'updateData'=>(object)array());
					break;
				case 2:
					return array('error'=>10002,'ts'=>time(),'updateData'=>(object)array());
					break;
				case 3:
						return array('error'=>10003,'ts'=>time(),'updateData'=>(object)array());
						break;
				case 4:
							return array('error'=>10004,'ts'=>time(),'updateData'=>(object)array());
							break;
			}
	
	
	}

	public function checkClient()
	{
		if (json_decode ( $_POST ['para'], true ) == null) {
			 $para =   $_GET ['para'];
			   $ts =   $_GET ['ts'];
			   $hash=$_GET ['hash'];
		} else {
			 $para = $_POST['para'];
			 $ts = $_POST['ts'];
			 $hash=$_POST['hash'];
		}
		$code='7InVuB0Q';
		$str1='para='."$para"."&ts="."$ts"."&code="."$code";
		$str=md5('para='."$para"."&ts="."$ts"."&code="."$code");
		 dump($para);
		 dump($str1);
		 dump(md5($str));
		 if($str==$hash)
		 {
		 	return 0;
		 }
		 else 
		 {
		 	return 1;
		 }
		 	
	}
}