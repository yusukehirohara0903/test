<?php /* Smarty version Smarty 3.1.4, created on 2015-12-31 16:26:09
         compiled from "./template\search.html" */ ?>
<?php /*%%SmartyHeaderCode:303375684d891cd5d54-53910227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '261b49d5d503d7a1523aa04ba1ef7d41fff14d8a' => 
    array (
      0 => './template\\search.html',
      1 => 1323598577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303375684d891cd5d54-53910227',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
    'data' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5684d891dc8af',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5684d891dc8af')) {function content_5684d891dc8af($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アドレス帳 ～アドレス検索画面～</title>
</head>
<body>
<h1>アドレス検索</h1>
<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
 class="def">
	<?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

	<table border="0px">
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['form']->value['search']['label'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['form']->value['search']['html'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['form']->value['buttons']['send']['html'];?>
</td>
			<td><input type="button" onclick="location.href='index.php'" value="戻る" /></td>
		</tr>
	</table>
</form>
<table border="1px">
	<?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value){
$_smarty_tpl->tpl_vars["value"]->_loop = true;
?>
		<form name="addlist_f1" method="POST" action="index.php">
			<tr>
				<td width="150px"><?php echo $_smarty_tpl->tpl_vars['value']->value['name_c'];?>
</td>
				<td>
					<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" name="id" >
					<input type="submit" value="詳細" name="detail" >
				</td>
			</tr>
		</form>
	<?php } ?>
</table>
</body>
</html>
<?php }} ?>