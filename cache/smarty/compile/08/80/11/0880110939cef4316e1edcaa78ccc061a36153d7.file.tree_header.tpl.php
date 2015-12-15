<?php /* Smarty version Smarty-3.1.19, created on 2015-12-03 19:44:22
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/helpers/tree/tree_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71774036555f9db18e471b2-76771901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0880110939cef4316e1edcaa78ccc061a36153d7' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/helpers/tree/tree_header.tpl',
      1 => 1448993191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71774036555f9db18e471b2-76771901',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f9db19034d35_15009684',
  'variables' => 
  array (
    'title' => 0,
    'toolbar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f9db19034d35_15009684')) {function content_55f9db19034d35_15009684($_smarty_tpl) {?>
<div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl);?>
<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {?><?php echo $_smarty_tpl->tpl_vars['toolbar']->value;?>
<?php }?>
</div><?php }} ?>
