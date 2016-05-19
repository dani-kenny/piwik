<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
//生成后台管理admin模块，生成完后需要注释掉才能正常访问之前的模块
define('BIND_MODULE','Admin');
// 定义应用目录
define('APP_PATH','./Application/');


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';