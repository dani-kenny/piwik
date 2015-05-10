<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
var URL = '/Admin/Node';
var APP	 =	 '';
var PUBLIC = '/Public';
//-->
</script>
</head>

<body>
<div id="main" class="main" >
<div class="content">
<div class="title"> 新增
<?php if(($level) == "1"): ?>应用<?php endif; if(($level) == "2"): ?>模块<?php endif; if(($level) == "3"): ?>操作<?php endif; ?> [ <a href="/Admin/Node">返回列表</a> ]</div>
<form method='post'  id="form1" action="/Admin/Node/insert/">
<table cellpadding=3 cellspacing=3 >
<tr>
	<td class="tRight" ><?php if(($level) == "1"): ?>应用<?php endif; if(($level) == "2"): ?>模块<?php endif; if(($level) == "3"): ?>操作<?php endif; ?>名：</td>
	<td class="tLeft" ><input type="text" class="medium bLeftRequire"  check='Require' warning="<?php if(($level) == "1"): ?>应用<?php endif; if(($level) == "2"): ?>模块<?php endif; if(($level) == "3"): ?>操作<?php endif; ?>名称不能为空,且不能含有空格" name="name"></td>
</tr>
<tr>
	<td class="tRight" >显示名：</td>
	<td class="tLeft" ><input type="text" class="medium bLeftRequire" check='Require' warning="显示名称必须"  name="title"></td>
</tr>
<tr>
	<td class="tRight" >分 组：</td>
	<td class="tLeft" >
	<SELECT class="medium bLeft" name="group_id">
	<option value="">未分组</option>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</SELECT>
	</td>
</tr>
<tr>
	<td class="tRight">状态：</td>
	<td class="tLeft"><SELECT class="small bLeft"  name="status">
	<option value="1">启用</option>
	<option value="0">禁用</option>
	</SELECT></td>
</tr>
<tr>
	<td class="tRight tTop">描 述：</td>
	<td class="tLeft"><TEXTAREA class="large bLeft" name="remark"  rows="5" cols="57"></textarea></td>
</tr>
<tr>
	<td></td>
	<td class="center"><div style="width:85%;margin:5px">
	<input type="hidden" name="level" value="<?php echo ($level); ?>">
	<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
	<div class="impBtn fLeft"><input type="submit" value="保存" class="save imgButton"></div>
	<div class="impBtn fRig"><input type="reset" class="reset imgButton" value="清空" ></div>
	</div></td>
</tr>
</table>
</form>
</div>
</div>