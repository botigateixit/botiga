<?php /* Smarty version Smarty-3.1.19, created on 2015-09-03 16:41:34
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8564255155e8783e1d6762-40238331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9989aa04dbc18d3bb3b42bb9ec8411c66b57c3e' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1441298341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8564255155e8783e1d6762-40238331',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55e8783e1f58a6_67786695',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e8783e1f58a6_67786695')) {function content_55e8783e1f58a6_67786695($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)) {?> onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){return true;}else{event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="delete">
	<i class="icon-trash"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
