<?php /* Smarty version Smarty-3.1.19, created on 2016-02-17 23:27:58
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16941861856c4f3ee852b47-80668443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbd0a8e86f1b3df0556773e9a13e863b158b87a9' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1455666713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16941861856c4f3ee852b47-80668443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56c4f3ee865288_83403157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c4f3ee865288_83403157')) {function content_56c4f3ee865288_83403157($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" >
	<i class="icon-search-plus"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>