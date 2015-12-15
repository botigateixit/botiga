<?php /* Smarty version Smarty-3.1.19, created on 2015-12-03 01:01:45
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43923425255f1b6e3440f50-48930979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44ac16628fdc3d405aa78c13fd9db24f4c5696f1' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin292kwuviq/themes/default/template/content.tpl',
      1 => 1448993191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43923425255f1b6e3440f50-48930979',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f1b6e344edc1_29870961',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1b6e344edc1_29870961')) {function content_55f1b6e344edc1_29870961($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
