<?php /* Smarty version Smarty-3.1.19, created on 2015-12-03 21:52:00
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/modules/themeconfigurator/views/templates/admin/messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128203220355f737efbfd518-25774594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c15a82e8fb097eb0705254c965cb05e159ee8cb3' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/modules/themeconfigurator/views/templates/admin/messages.tpl',
      1 => 1448993191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128203220355f737efbfd518-25774594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f737efd79d44_88205587',
  'variables' => 
  array (
    'id' => 0,
    'text' => 0,
    'class' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f737efd79d44_88205587')) {function content_55f737efd79d44_88205587($_smarty_tpl) {?>

<div id="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
-response" <?php if (!isset($_smarty_tpl->tpl_vars['text']->value)) {?>style="display:none;"<?php }?> class="message alert alert-<?php if (isset($_smarty_tpl->tpl_vars['class']->value)&&$_smarty_tpl->tpl_vars['class']->value=='error') {?>danger<?php } else { ?>success<?php }?>">
	<div><?php if (isset($_smarty_tpl->tpl_vars['text']->value)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?></div>
</div><?php }} ?>
