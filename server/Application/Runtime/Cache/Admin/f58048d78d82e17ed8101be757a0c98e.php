<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>『ThinkPHP管理平台』By ThinkPHP <?php echo (THINK_VERSION); ?></title>
<link rel="stylesheet" type="text/css" href="/Public/Css/blue.css" />
<script type="text/javascript" src="/Public/Js/Base.js"></script>
<script type="text/javascript" src="/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/Public/Js/Think/ThinkAjax.js"></script>
<script type="text/javascript" src="/Public/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="/Public/Js/common.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '/Admin/Oper';
var APP	 =	 '';
var PUBLIC = '/Public';
//-->
</script>
</head>

<body>
<!-- 菜单区域  -->

<!-- 主页面开始 -->
<div id="main" class="main" >

<!-- 主体内容  -->
<div class="content" >
<div class="title"></div>
<form action="/Admin/Oper/Operation",method='post'>
<select id="server">
  <option value ="1">网关服务器</option>
  <option value ="2">游戏服务器</option>
  <option value="3">缓存服务器</option>
  <option value="4">数据库服务器</option>
</select>
<button type="button">Click Me!</button>
</form>

<!-- 列表显示区域结束 -->

</div>
<!-- 主体内容结束 -->
</div>
<!-- 主页面结束 -->