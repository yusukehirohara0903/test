<?php /* Smarty version Smarty 3.1.4, created on 2015-12-31 15:37:49
         compiled from "./template\address_setting.html" */ ?>
<?php /*%%SmartyHeaderCode:241185684cd3ddcc896-53047106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c622bf85c04c0e5af008bd4052da34967d0bb803' => 
    array (
      0 => './template\\address_setting.html',
      1 => 1323602939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241185684cd3ddcc896-53047106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'form' => 0,
    'error' => 0,
    'h1' => 0,
    'insertflag' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5684cd3e07f62',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5684cd3e07f62')) {function content_5684cd3e07f62($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
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
<h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
 class="def">
	<?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

	<?php echo $_smarty_tpl->tpl_vars['form']->value['action']['html'];?>

	<dl>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['name_c']['required']){?><font color="red">*</font> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['name_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['name_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['readname_c']['required']){?><font color="red">*</font> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['readname_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['readname_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['tel_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['tel_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['tel_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['tel_sub_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['tel_sub_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['tel_sub_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['mail_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['mail_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['mail_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['mail_sub_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['mail_sub_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['mail_sub_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['postcode_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['postcode_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['postcode_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['add_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['add_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['add_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['building_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['building_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['building_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['tw_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['tw_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['tw_c']['html'];?>
</dd>
		<dt><?php if ($_smarty_tpl->tpl_vars['form']->value['fb_c']['required']){?> <?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['fb_c']['label'];?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['form']->value['fb_c']['html'];?>
</dd>
		<dt></dt>
		<dd><?php if ($_smarty_tpl->tpl_vars['insertflag']->value!=true){?><?php echo $_smarty_tpl->tpl_vars['form']->value['buttons']['send']['html'];?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['form']->value['buttons']['reset']['html'];?>

			<?php if ($_smarty_tpl->tpl_vars['id']->value!=null){?>
				<input type="button" onclick="location.href='index.php?module=adddetail&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'" value="戻る" />
			<?php }else{ ?>
				<input type="button" onclick="location.href='index.php'" value="戻る" />
			<?php }?>
		</dd>
	</dl>
</form>
<?php if ($_smarty_tpl->tpl_vars['form']->value['requirednote']&&!$_smarty_tpl->tpl_vars['form']->value['frozen']){?>
	<?php echo $_smarty_tpl->tpl_vars['form']->value['requirednote'];?>

<?php }?>
</body>
</html>
<?php }} ?>