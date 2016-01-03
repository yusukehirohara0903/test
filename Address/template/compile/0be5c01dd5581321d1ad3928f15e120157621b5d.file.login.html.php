<?php /* Smarty version Smarty 3.1.4, created on 2015-12-31 14:55:52
         compiled from "./template\login.html" */ ?>
<?php /*%%SmartyHeaderCode:29455684c36805ee65-49785415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0be5c01dd5581321d1ad3928f15e120157621b5d' => 
    array (
      0 => './template\\login.html',
      1 => 1323598861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29455684c36805ee65-49785415',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5684c3680eae0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5684c3680eae0')) {function content_5684c3680eae0($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アドレス帳 ～ログイン画面～</title>
</head>
<body>
<!-- エラー時の表示 -->
<div style="color:red">
	<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['form']->value['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['field_name']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
		<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<br>
	<?php } ?>
</div>
<!-- フォーム表示 -->
<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
 class="def">
	<?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

	<dl>
		<dt><?php echo $_smarty_tpl->tpl_vars['form']->value['uname']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['uname']['html'];?>
</dd>
		<dt><?php echo $_smarty_tpl->tpl_vars['form']->value['upass']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['upass']['html'];?>
</dd>
		<dd><?php echo $_smarty_tpl->tpl_vars['form']->value['send']['html'];?>
</dd>
	</dl>
</form>
</body>
</html><?php }} ?>