<?php /* Smarty version Smarty 3.1.4, created on 2015-12-31 16:27:03
         compiled from "./template\adddetail.html" */ ?>
<?php /*%%SmartyHeaderCode:40375684d8c78bdfa3-78637801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c95e4f554d2ae78a4c93cea61174cbd6415f76f5' => 
    array (
      0 => './template\\adddetail.html',
      1 => 1323950685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40375684d8c78bdfa3-78637801',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'add_res' => 0,
    'add_id' => 0,
    'g_flag' => 0,
    'gmap_res' => 0,
    'fb_flag' => 0,
    'tw_flag' => 0,
    'tw_res' => 0,
    'fb_res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5684d8c7a5de5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5684d8c7a5de5')) {function content_5684d8c7a5de5($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アドレス帳 ～アドレス詳細画面～</title>
<script Language="JavaScript">
<!--
// 削除ボタン押下
function deleterecode(id){
	if(confirm("削除してもよろしいですか?")!=false){
		document.adddetail_f1.judge.value="1";
		document.adddetail_f1.action="index.php?module=adddetail&id="+id;
		document.adddetail_f1.submit();
	} else {
		document.adddetail_f1.judge.value="0";
		document.adddetail_f1.action="index.php?module=adddetail&id="+id;
		document.adddetail_f1.submit();
	}
}
-->
</script>
</head>
<body>
<h1>アドレス詳細（<?php echo $_smarty_tpl->tpl_vars['add_res']->value['name_c'];?>
）</h1>
<table border="0px">
	<tr>
		<td>
			<form name="adddetail_f1" method="post" action="index.php?module=adddetail" >
				<input type="hidden" name="judge" >
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['add_id']->value;?>
" name="id" >
				<input type="submit" value="アドレス削除" name="del" onClick="deleterecode('<?php echo $_smarty_tpl->tpl_vars['add_id']->value;?>
')" >
			</form>
		</td>
		<td>
			<form name="adddetail_f2" method="post" action="index.php?module=adddetail&id=<?php echo $_smarty_tpl->tpl_vars['add_id']->value;?>
" >
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['add_id']->value;?>
" name="id" >
				<input type="submit" value="アドレス編集" name="edit" >
			</form>
		</td>
		<td>
			<form name="adddetail_f3" method="post" action="index.php">
				<input type="submit" value="戻る">
			</form>
		</td>
	</tr>
</table>
<div>
	<div style="float:left;">
		<h2>アドレス</h2>
		<ul>
			<li><strong>名前</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['add_res']->value['name_c'];?>
（<?php echo $_smarty_tpl->tpl_vars['add_res']->value['readname_c'];?>
）</li>
			<li><strong>電話番号</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['add_res']->value['tel_c'];?>
</li>
			<li><strong>電話番号（サブ）</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['add_res']->value['tel_sub_c'];?>
</li>
			<li><strong>メール</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['add_res']->value['mail_c'];?>
</li>
			<li><strong>メール（サブ）</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['add_res']->value['mail_sub_c'];?>
</li>
			<li><strong>郵便番号</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['add_res']->value['postcode_c'];?>
</li>
			<li><strong>住所</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['add_res']->value['add_c'];?>
&nbsp<?php echo $_smarty_tpl->tpl_vars['add_res']->value['building_c'];?>
</li>
		</ul>
		<!--Googleマップ情報の表示-->
		<?php if ($_smarty_tpl->tpl_vars['g_flag']->value==true){?>
			<h2>Goggleマップ</h2>
			<?php echo $_smarty_tpl->tpl_vars['gmap_res']->value->printOnLoad();?>

			<div style="margin-right:10px;"><?php echo $_smarty_tpl->tpl_vars['gmap_res']->value->printMap();?>
</div>
		<?php }elseif($_smarty_tpl->tpl_vars['fb_flag']->value==false){?>
		<?php }else{ ?>
		<?php }?>
		</div>
		<div style="float:left;">
		<!--Twitter情報の表示-->
		<?php if ($_smarty_tpl->tpl_vars['tw_flag']->value==true){?>
		<h2>Twitter</h2>
		<a href="http://twitter.com/#!/<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['id'];?>
" target=_blank><img src = "<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['image'];?>
" border="1"></a>
		<a href="http://twitter.com/#!/<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['id'];?>
" target=_blank><strong>@<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['id'];?>
</strong></a>
		<ul>
			<li><strong>名前</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['name'];?>
</li>
			<li><strong>自己紹介</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['description'];?>
</li>
			<li><strong>Webサイト</strong><br>
			<a href="<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['web'];?>
" target=_blank><?php echo $_smarty_tpl->tpl_vars['tw_res']->value['web'];?>
</a></li>
			<li><strong>最新ツイート</strong><br>
			<?php echo $_smarty_tpl->tpl_vars['tw_res']->value['latest_tweet'];?>
</li>
		</ul>
		<?php }elseif($_smarty_tpl->tpl_vars['tw_flag']->value==false){?>
		<?php }else{ ?>
		<?php }?>
		<!--Facebook情報の表示-->
		<?php if ($_smarty_tpl->tpl_vars['fb_flag']->value==true){?>
			<h2>Facebook</h2>
			<a href="<?php echo $_smarty_tpl->tpl_vars['fb_res']->value['link'];?>
" target=_blank><img src = "<?php echo $_smarty_tpl->tpl_vars['fb_res']->value['img'];?>
" border="1"></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['fb_res']->value['link'];?>
" target=_blank><strong><?php echo $_smarty_tpl->tpl_vars['fb_res']->value['id'];?>
</strong></a>
			<ul>
				<li><strong>名前</strong><br>
				<?php echo $_smarty_tpl->tpl_vars['fb_res']->value['name'];?>
</li>
			</ul>
		<?php }elseif($_smarty_tpl->tpl_vars['fb_flag']->value==false){?>
		<?php }else{ ?>
		<?php }?>
	</div>
</div>
</body>
</html>
<?php }} ?>