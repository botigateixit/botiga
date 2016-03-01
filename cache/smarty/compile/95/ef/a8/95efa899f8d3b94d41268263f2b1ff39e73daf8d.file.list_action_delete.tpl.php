<?php /* Smarty version Smarty-3.1.19, created on 2016-02-19 00:37:21
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/controllers/attachments/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58840150856c655b14da0b1-35368265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95efa899f8d3b94d41268263f2b1ff39e73daf8d' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/controllers/attachments/helpers/list/list_action_delete.tpl',
      1 => 1455753896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58840150856c655b14da0b1-35368265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'id_attachment' => 0,
    'product_attachements' => 0,
    'product_list' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56c655b153a477_03080553',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c655b153a477_03080553')) {function content_56c655b153a477_03080553($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)) {?> onclick="<?php if (isset($_smarty_tpl->tpl_vars['product_attachements']->value[htmlspecialchars($_smarty_tpl->tpl_vars['id_attachment']->value, ENT_QUOTES, 'UTF-8', true)])) {?>if (attachments.confirmProductAttached('<?php echo $_smarty_tpl->tpl_vars['product_list']->value[htmlspecialchars($_smarty_tpl->tpl_vars['id_attachment']->value, ENT_QUOTES, 'UTF-8', true)];?>
')){return true;}else{event.stopPropagation(); event.preventDefault();};<?php } else { ?>return confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')<?php }?>"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="delete">
	<i class="icon-trash"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a>
<?php }} ?>
