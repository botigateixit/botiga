<?php /* Smarty version Smarty-3.1.19, created on 2017-05-24 20:02:16
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/controllers/products/multishop/checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7458977657c75215450168-61325917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '315239b2ee61a0aec6dd2dccbef068a9111fb3d4' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/controllers/products/multishop/checkbox.tpl',
      1 => 1495645445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7458977657c75215450168-61325917',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57c752154b5466_23316821',
  'variables' => 
  array (
    'display_multishop_checkboxes' => 0,
    'multilang' => 0,
    'only_checkbox' => 0,
    'languages' => 0,
    'field' => 0,
    'language' => 0,
    'type' => 0,
    'multishop_check' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57c752154b5466_23316821')) {function content_57c752154b5466_23316821($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['display_multishop_checkboxes']->value)&&$_smarty_tpl->tpl_vars['display_multishop_checkboxes']->value) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['multilang']->value)&&$_smarty_tpl->tpl_vars['multilang']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['only_checkbox']->value)) {?>
			<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
				<input type="checkbox" name="multishop_check[<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
]" value="1" onclick="ProductMultishop.checkField(this.checked, '<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
', '<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
')" <?php if (!empty($_smarty_tpl->tpl_vars['multishop_check']->value[$_smarty_tpl->tpl_vars['field']->value][$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?>checked="checked"<?php }?> />
			<?php } ?>
		<?php } else { ?>
			<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
				<input style="<?php if (!$_smarty_tpl->tpl_vars['language']->value['is_default']) {?>display: none;<?php }?>" class="multishop_lang_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
 lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
 translatable-field" type="checkbox" name="multishop_check[<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
]" value="1" onclick="ProductMultishop.checkField(this.checked, '<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
','<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
')"
				<?php if (!empty($_smarty_tpl->tpl_vars['multishop_check']->value[$_smarty_tpl->tpl_vars['field']->value][$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?>checked="checked"<?php }?> />
			<?php } ?>
		<?php }?>
	<?php } else { ?>
		<input type="checkbox" name="multishop_check[<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
]" value="1" onclick="ProductMultishop.checkField(this.checked, '<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
')" <?php if (!empty($_smarty_tpl->tpl_vars['multishop_check']->value[$_smarty_tpl->tpl_vars['field']->value])) {?>checked="checked"<?php }?> />
	<?php }?>
<?php }?><?php }} ?>
