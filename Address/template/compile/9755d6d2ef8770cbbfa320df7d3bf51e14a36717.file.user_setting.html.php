<?php /* Smarty version Smarty 3.1.4, created on 2015-12-31 16:25:47
         compiled from "./template\user_setting.html" */ ?>
<?php /*%%SmartyHeaderCode:322705684d87bafbd46-03561434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9755d6d2ef8770cbbfa320df7d3bf51e14a36717' => 
    array (
      0 => './template\\user_setting.html',
      1 => 1323598729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322705684d87bafbd46-03561434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userflag' => 0,
    'form' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5684d87bcbdb9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5684d87bcbdb9')) {function content_5684d87bcbdb9($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アドレス帳 ～ユーザ設定画面～</title></title>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['userflag']->value==true){?>
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
	<h1>ユーザ設定</h1>
	<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
 class="def">
		<?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

		<dl>
			<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['name']['required']){?><font color="red">*</font> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['html'];?>
</dd>
			<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['pass_sim']['required']){?><font color="red">*</font> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['pass_sim']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['pass_sim']['html'];?>
</dd>
			<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['pass']['required']){?><font color="red">*</font> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['pass']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['pass']['html'];?>
</dd>
			<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['pass_conf']['required']){?><font color="red">*</font> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['pass_conf']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['pass_conf']['html'];?>
</dd>
			<dd>
				<?php echo $_smarty_tpl->tpl_vars['form']->value['buttons']['send']['html'];?>
<?php echo $_smarty_tpl->tpl_vars['form']->value['buttons']['reset']['html'];?>

				<input type="button" onclick="location.href='index.php'" value="戻る" />
			</dd>
		</dl>
	</form>
<?php if ($_smarty_tpl->tpl_vars['form']->value['requirednote']&&!$_smarty_tpl->tpl_vars['form']->value['frozen']){?>
	<?php echo $_smarty_tpl->tpl_vars['form']->value['requirednote'];?>

<?php }?>
<?php }elseif($_smarty_tpl->tpl_vars['userflag']->value==false){?>
	<form name="addlist_f1" method="post" action="index.php">
	<input type="submit" value="ログイン画面へ" name="logout">
	</form>
<?php }else{ ?>
<?php }?>
</body>
</html>
<?php }} ?>