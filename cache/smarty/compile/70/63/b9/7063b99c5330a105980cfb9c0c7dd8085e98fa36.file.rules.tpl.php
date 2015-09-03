<?php /* Smarty version Smarty-3.1.19, created on 2015-09-03 16:41:28
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/modules/referralprogram/views/templates/front/rules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143056243755e87838de0274-63316075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7063b99c5330a105980cfb9c0c7dd8085e98fa36' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/modules/referralprogram/views/templates/front/rules.tpl',
      1 => 1441298341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143056243755e87838de0274-63316075',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'xml' => 0,
    'paragraph' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55e87838e0d406_49759339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e87838e0d406_49759339')) {function content_55e87838e0d406_49759339($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/tools/smarty/plugins/modifier.replace.php';
?>

<h3><?php echo smartyTranslate(array('s'=>'Referral program rules','mod'=>'referralprogram'),$_smarty_tpl);?>
</h3>

<?php if (isset($_smarty_tpl->tpl_vars['xml']->value)) {?>
<div id="referralprogram_rules">
	<?php if (isset($_smarty_tpl->tpl_vars['xml']->value->body->{$_smarty_tpl->tpl_vars['paragraph']->value})) {?><div class="rte"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['xml']->value->body->{$_smarty_tpl->tpl_vars['paragraph']->value},"\'","'"),'\"','"');?>
</div><?php }?>
</div>
<?php }?>
<?php }} ?>
