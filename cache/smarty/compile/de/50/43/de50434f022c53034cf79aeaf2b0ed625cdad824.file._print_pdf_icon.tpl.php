<?php /* Smarty version Smarty-3.1.19, created on 2015-09-03 16:41:25
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin/themes/default/template/controllers/outstanding/_print_pdf_icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97616499255e87835e5dab9-86627411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de50434f022c53034cf79aeaf2b0ed625cdad824' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin/themes/default/template/controllers/outstanding/_print_pdf_icon.tpl',
      1 => 1441298341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97616499255e87835e5dab9-86627411',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'id_invoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55e87835f32871_69299462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e87835f32871_69299462')) {function content_55e87835f32871_69299462($_smarty_tpl) {?>


<?php if (Configuration::get('PS_INVOICE')) {?>
	<span style="width:20px; margin-right:5px;">
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'), ENT_QUOTES, 'UTF-8', true);?>
&amp;submitAction=generateInvoicePDF&amp;id_order_invoice=<?php echo $_smarty_tpl->tpl_vars['id_invoice']->value;?>
"><img src="../img/admin/tab-invoice.gif" alt="invoice" /></a>
	</span>
<?php }?><?php }} ?>
