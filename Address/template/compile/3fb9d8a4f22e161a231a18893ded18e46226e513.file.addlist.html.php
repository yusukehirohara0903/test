<?php /* Smarty version Smarty 3.1.4, created on 2015-12-31 15:36:59
         compiled from "./template\addlist.html" */ ?>
<?php /*%%SmartyHeaderCode:253365684cd0bc22cb4-12681485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fb9d8a4f22e161a231a18893ded18e46226e513' => 
    array (
      0 => './template\\addlist.html',
      1 => 1323598910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253365684cd0bc22cb4-12681485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'res' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5684cd0bd464c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5684cd0bd464c')) {function content_5684cd0bd464c($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アドレス帳 ～アドレス一覧画面～</title>
</head>
<body>
<h1>アドレス一覧</h1>
<form name="addlist_f1" method="post" action="index.php">
	<input type="submit" value="アドレス新規作成" name="new">
	<input type="submit" value="アドレス検索" name="search">
	<input type="submit" value="ユーザ設定" name="user_set">
	<input type="submit" value="ログアウト" name="logout">
</form>
<table border=1 cellspacing=0 cellpadding=5>
	<tr bgcolor="#adff2f">
		<th>名前</th>
		<th>電話番号</th>
		<th>メール</th>
		<th>詳細表示</th>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['res']->value!=null){?>
		<?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['res']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value){
$_smarty_tpl->tpl_vars["value"]->_loop = true;
?>
		<form name="addlist_f2" method="post" action="index.php">
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" name="id" >
			<tr>
				<th><?php echo $_smarty_tpl->tpl_vars['value']->value['name_c'];?>
</th>
				<th><?php echo $_smarty_tpl->tpl_vars['value']->value['tel_c'];?>
</th>
				<th><?php echo $_smarty_tpl->tpl_vars['value']->value['mail_c'];?>
</th>
				<th><input type="submit" value="詳細" name="detail" ></th>
			</tr>
		</form>
		<?php } ?>
	<?php }?>
</table>
</body>
</html>
<?php }} ?>