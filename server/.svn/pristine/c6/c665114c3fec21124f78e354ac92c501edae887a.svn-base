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
var URL = '/Admin/Test';
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
<!-- 列表显示区域结束 -->
<div> <!-- Think 系统列表组件开始 -->
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr><td height="5" colspan="4" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="8%"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','index')" title="按照编号<?php echo ($sortType); ?> ">编号<?php if(($order) == "id"): ?><img src="/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('name','<?php echo ($sort); ?>','index')" title="按照用户名<?php echo ($sortType); ?> ">用户名<?php if(($order) == "name"): ?><img src="/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr class="row" ><td><input type="checkbox" name="key"	value="<?php echo ($user["id"]); ?>"></td><td><?php echo ($user["id"]); ?></td><td><a href="javascript:edit('<?php echo (addslashes($user["id"])); ?>')"><?php echo ($user["name"]); ?></a></td><td><a href="javascript:edit('<?php echo ($user["id"]); ?>')">编辑</a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td height="5" colspan="4" class="bottomTd"></td></tr></table>
<!-- Think 系统列表组件结束 -->

 </div> 
</div>
<!-- 主体内容结束 -->
</div>
<!-- 主页面结束 -->