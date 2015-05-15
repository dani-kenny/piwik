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
					return array('erro'=>0,'ts'=>time(),'updateData'=>array());
					break;
					//无uid的时候
				case  1:
					return array('erro'=>10001,'ts'=>time(),'updateData'=>array());
			}
	
	
	}
}