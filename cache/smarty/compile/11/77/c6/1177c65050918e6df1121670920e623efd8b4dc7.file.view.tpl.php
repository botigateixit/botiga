<?php /* Smarty version Smarty-3.1.19, created on 2017-04-04 17:41:20
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/controllers/suppliers/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:733133237582b455df0e871-41475808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1177c65050918e6df1121670920e623efd8b4dc7' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/controllers/suppliers/helpers/view/view.tpl',
      1 => 1490722443,
      2 => 'file',
    ),
    'dae05d83be7bd6d145fce0acd7646fe0b2b28164' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/helpers/view/view.tpl',
      1 => 1490722443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '733133237582b455df0e871-41475808',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_582b455e1273a9_48542752',
  'variables' => 
  array (
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582b455e1273a9_48542752')) {function content_582b455e1273a9_48542752($_smarty_tpl) {?>

<div class="leadin"></div>


<div class="panel">
	<div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['supplier']->value->name;?>
 - <?php echo smartyTranslate(array('s'=>'Number of products:'),$_smarty_tpl);?>
 <?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
</div>	
	<table class="table">
		<thead>
			<tr>
				<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Product name'),$_smarty_tpl);?>
</span></th>
				<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Attribute name'),$_smarty_tpl);?>
</span></th>
				<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Supplier Reference'),$_smarty_tpl);?>
</span></th>
				<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Wholesale price'),$_smarty_tpl);?>
</span></th>
				<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Reference'),$_smarty_tpl);?>
</span></th>
				<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'EAN13'),$_smarty_tpl);?>
</span></th>
				<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'UPC'),$_smarty_tpl);?>
</span></th>
				<?php if ($_smarty_tpl->tpl_vars['stock_management']->value&&$_smarty_tpl->tpl_vars['shopContext']->value!=Shop::CONTEXT_ALL) {?><th class="right"><span class="title_box"><?php echo smartyTranslate(array('s'=>'Available Quantity'),$_smarty_tpl);?>
</span></th><?php }?>
			</tr>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<?php if (!$_smarty_tpl->tpl_vars['product']->value->hasAttributes()) {?>
				<tr>
					<td><a class="btn btn-link" href="?tab=AdminProducts&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
&amp;updateproduct&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminProducts'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</a></td>
					<td><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['product']->value->product_supplier_reference)) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value->product_supplier_reference;?>
<?php }?></td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['product']->value->product_supplier_price_te)) {?>0<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value->product_supplier_price_te;?>
<?php }?></td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['product']->value->reference)) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value->reference;?>
<?php }?></td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['product']->value->ean13)) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value->ean13;?>
<?php }?></td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['product']->value->upc)) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value->upc;?>
<?php }?></td>
					<?php if ($_smarty_tpl->tpl_vars['stock_management']->value&&$_smarty_tpl->tpl_vars['shopContext']->value!=Shop::CONTEXT_ALL) {?><td class="right" width="150"><?php echo $_smarty_tpl->tpl_vars['product']->value->quantity;?>
</td><?php }?>
				</tr>
			<?php } else { ?>
				<?php  $_smarty_tpl->tpl_vars['product_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_product_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value->combination; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product_attribute']->key => $_smarty_tpl->tpl_vars['product_attribute']->value) {
$_smarty_tpl->tpl_vars['product_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_product_attribute']->value = $_smarty_tpl->tpl_vars['product_attribute']->key;
?>
					<tr <?php if ($_smarty_tpl->tpl_vars['id_product_attribute']->value%2) {?>class="alt_row"<?php }?> >
						<td><a class="btn btn-link" href="?tab=AdminProducts&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
&amp;updateproduct&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminProducts'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</a></td>
						<td><?php if (empty($_smarty_tpl->tpl_vars['product_attribute']->value['attributes'])) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product_attribute']->value['attributes'];?>
<?php }?></td>
						<td><?php if (empty($_smarty_tpl->tpl_vars['product_attribute']->value['product_supplier_reference'])) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product_attribute']->value['product_supplier_reference'];?>
<?php }?></td>
						<td><?php if (empty($_smarty_tpl->tpl_vars['product_attribute']->value['product_supplier_price_te'])) {?>0<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product_attribute']->value['product_supplier_price_te'];?>
<?php }?></td>
						<td><?php if (empty($_smarty_tpl->tpl_vars['product_attribute']->value['reference'])) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product_attribute']->value['reference'];?>
<?php }?></td>
						<td><?php if (empty($_smarty_tpl->tpl_vars['product_attribute']->value['ean13'])) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product_attribute']->value['ean13'];?>
<?php }?></td>
						<td><?php if (empty($_smarty_tpl->tpl_vars['product_attribute']->value['upc'])) {?><?php echo smartyTranslate(array('s'=>'N/A'),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product_attribute']->value['upc'];?>
<?php }?></td>
						<?php if ($_smarty_tpl->tpl_vars['stock_management']->value&&$_smarty_tpl->tpl_vars['shopContext']->value!=Shop::CONTEXT_ALL) {?><td class="right"><?php echo $_smarty_tpl->tpl_vars['product_attribute']->value['quantity'];?>
</td><?php }?>
					</tr>
				<?php } ?>
			<?php }?>
		<?php } ?>
		</tbody>
	</table>
</div>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminView'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php } elseif (isset($_GET['controller'])) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>
<?php }} ?>
