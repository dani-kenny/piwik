<?php
return array (
		// 英雄初始化
		'hero' => array (
				'0' => '1,1,1,1,1',
				'1' => '1,1,1,2,1',
				'2' => '1,1,1,3,1' 
		),
		// 错误代码定义10000开头为游戏代码，0-1000为系统代码
		'error' => array (
				'0' => '正确数据',
				'1' => '数据验证不正确',
				'10001' => '无用户id',
				'10002' => '没有匹配挑战的用户' ,
				'10003'=>'挑战的用户在线，请重新挑战',
				'10004'=>'挑战的用户被挑战冷冻时间内，请过10s后再挑战'
		) 
);