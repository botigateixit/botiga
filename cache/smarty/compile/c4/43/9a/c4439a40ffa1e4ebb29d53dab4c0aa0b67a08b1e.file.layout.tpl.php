<?php /* Smarty version Smarty-3.1.19, created on 2015-10-19 23:19:30
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117050655855f1b633114f22-31646867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4439a40ffa1e4ebb29d53dab4c0aa0b67a08b1e' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/layout.tpl',
      1 => 1445288499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117050655855f1b633114f22-31646867',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f1b633175883_22281178',
  'variables' => 
  array (
    'header' => 0,
    'conf' => 0,
    'errors' => 0,
    'disableDefaultErrorOutPut' => 0,
    'error' => 0,
    'informations' => 0,
    'info' => 0,
    'confirmations' => 0,
    'warnings' => 0,
    'warning' => 0,
    'page' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1b633175883_22281178')) {function content_55f1b633175883_22281178($_smarty_tpl) {?>
<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php if (isset($_smarty_tpl->tpl_vars['conf']->value)) {?>
	<div class="bootstrap">
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

		</div>
	</div>
<?php }?>
<?php if (count($_smarty_tpl->tpl_vars['errors']->value)&&current($_smarty_tpl->tpl_vars['errors']->value)!=''&&(!isset($_smarty_tpl->tpl_vars['disableDefaultErrorOutPut']->value)||$_smarty_tpl->tpl_vars['disableDefaultErrorOutPut']->value==false)) {?>

	<div class="bootstrap">
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php if (count($_smarty_tpl->tpl_vars['errors']->value)==1) {?>
			<?php echo reset($_smarty_tpl->tpl_vars['errors']->value);?>

		<?php } else { ?>
			<?php echo smartyTranslate(array('s'=>'%d errors','sprintf'=>count($_smarty_tpl->tpl_vars['errors']->value)),$_smarty_tpl);?>

			<br/>
			<ol>
				<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
					<li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
				<?php } ?>
			</ol>
		<?php }?>
		</div>
	</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['informations']->value)&&count($_smarty_tpl->tpl_vars['informations']->value)&&$_smarty_tpl->tpl_vars['informations']->value) {?>
	<div class="bootstrap">
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<ul id="infos_block" class="list-unstyled">
				<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['informations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
					<li><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['confirmations']->value)&&count($_smarty_tpl->tpl_vars['confirmations']->value)&&$_smarty_tpl->tpl_vars['confirmations']->value) {?>
	<div class="bootstrap">
		<div class="alert alert-success" style="display:block;">
			<?php  $_smarty_tpl->tpl_vars['conf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['confirmations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->key => $_smarty_tpl->tpl_vars['conf']->value) {
$_smarty_tpl->tpl_vars['conf']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

			<?php } ?>
		</div>
	</div>
<?php }?>
<?php if (count($_smarty_tpl->tpl_vars['warnings']->value)) {?>
	<div class="bootstrap">
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php if (count($_smarty_tpl->tpl_vars['warnings']->value)>1) {?>
				<h4><?php echo smartyTranslate(array('s'=>'There are %d warnings:','sprintf'=>count($_smarty_tpl->tpl_vars['warnings']->value)),$_smarty_tpl);?>
</h4>
			<?php }?>
			<ul class="list-unstyled">
				<?php  $_smarty_tpl->tpl_vars['warning'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['warning']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['warnings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->key => $_smarty_tpl->tpl_vars['warning']->value) {
$_smarty_tpl->tpl_vars['warning']->_loop = true;
?>
					<li><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php }?>
<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>