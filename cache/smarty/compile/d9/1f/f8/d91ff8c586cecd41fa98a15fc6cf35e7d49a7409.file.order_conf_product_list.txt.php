<?php /* Smarty version Smarty-3.1.19, created on 2016-03-11 09:46:10
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/mails/ca/order_conf_product_list.txt" */ ?>
<?php /*%%SmartyHeaderCode:63432470356e285d261c3f2-46191301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd91ff8c586cecd41fa98a15fc6cf35e7d49a7409' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/mails/ca/order_conf_product_list.txt',
      1 => 1456875413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63432470356e285d261c3f2-46191301',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'product' => 0,
    'customization' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e285d2666f86_77714914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e285d2666f86_77714914')) {function content_56e285d2666f86_77714914($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
						<?php echo $_smarty_tpl->tpl_vars['product']->value['reference'];?>


						<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>


						<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>


						<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>


						<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>


	<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customization']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
							<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['customization']->value['customization_text'];?>


							<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>


							<?php echo $_smarty_tpl->tpl_vars['product']->value['customization_quantity'];?>


							<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>

	<?php } ?>
<?php } ?><?php }} ?>
