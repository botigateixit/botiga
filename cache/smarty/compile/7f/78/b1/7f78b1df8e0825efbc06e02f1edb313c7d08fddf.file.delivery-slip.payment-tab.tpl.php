<?php /* Smarty version Smarty-3.1.19, created on 2017-09-06 19:34:31
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/pdf/delivery-slip.payment-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201977060959b031a75bd931-83878114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f78b1df8e0825efbc06e02f1edb313c7d08fddf' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/pdf/delivery-slip.payment-tab.tpl',
      1 => 1495645445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201977060959b031a75bd931-83878114',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59b031a75d50f2_18536637',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59b031a75d50f2_18536637')) {function content_59b031a75d50f2_18536637($_smarty_tpl) {?>
<table id="payment-tab" width="100%" cellpadding="4" cellspacing="0">
	<tr>
		<td class="payment center small grey bold" width="44%"><?php echo smartyTranslate(array('s'=>'Payment Method','pdf'=>'true'),$_smarty_tpl);?>
</td>
		<td class="payment left white" width="56%">
			<table width="100%" border="0">
				<?php  $_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_invoice']->value->getOrderPaymentCollection(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->key => $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->_loop = true;
?>
					<tr>
						<td class="right small"><?php echo $_smarty_tpl->tpl_vars['payment']->value->payment_method;?>
</td>
						<td class="right small"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['payment']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['payment']->value->amount),$_smarty_tpl);?>
</td>
					</tr>
				<?php }
if (!$_smarty_tpl->tpl_vars['payment']->_loop) {
?>
					<tr>
						<td><?php echo smartyTranslate(array('s'=>'No payment','pdf'=>'true'),$_smarty_tpl);?>
</td>
					</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
</table>
<?php }} ?>
