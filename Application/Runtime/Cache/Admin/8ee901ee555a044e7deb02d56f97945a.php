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
var URL = '/Admin/Public';
var APP	 =	 '';
var PUBLIC = '/Public';
//-->
</script>
</head>

<body>
<div class="main" >
<div class="content">
<TABLE id="checkList" class="list" cellpadding=0 cellspacing=0 >
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<TR class="row" ><th colspan="2" class="space">系统信息</th></tr>
<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><TR class="row" onmouseover="over()" onmouseout="out()" onclick="change()" ><TD width="15%"><?php echo ($key); ?></TD><TD><?php echo ($v); ?></TD></TR><?php endforeach; endif; else: echo "" ;endif; ?>
<tr><td height="3" colspan="2" class="bottomTd"></td></tr>
</TABLE>
</div>
</div>
<!-- 主页面结束 -->