<?php /* Smarty version Smarty-3.1.19, created on 2015-10-13 18:06:26
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/modules/cronjobs/views/templates/admin/configure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1900112426561d2c0254a3f9-69579239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd80a8ba35a90b2d972e504bd8cdced637ffa4cd0' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/modules/cronjobs/views/templates/admin/configure.tpl',
      1 => 1443048659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1900112426561d2c0254a3f9-69579239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561d2c025f3092_02868050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561d2c025f3092_02868050')) {function content_561d2c025f3092_02868050($_smarty_tpl) {?>

<div class="panel">
	<h3><?php echo smartyTranslate(array('s'=>'What does this module do?','mod'=>'cronjobs'),$_smarty_tpl);?>
</h3>
	<p>
		<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
/logo.png" class="pull-left" id="cronjobs-logo" />
		<?php echo smartyTranslate(array('s'=>'Originally, cron is a Unix system tool that provides time-based job scheduling: you can create many cron jobs, which are then run periodically at fixed times, dates, or intervals.','mod'=>'cronjobs'),$_smarty_tpl);?>

		<br/>
		<?php echo smartyTranslate(array('s'=>'This module provides you with a cron-like tool: you can create jobs which will call a given set of secure URLs to your PrestaShop store, thus triggering updates and other automated tasks.','mod'=>'cronjobs'),$_smarty_tpl);?>

	</p>
</div>
<?php }} ?>
