<?php /* Smarty version Smarty-3.1.19, created on 2015-09-03 16:41:30
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin/themes/default/template/controllers/stats/calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139611661555e8783a4ea0f4-08506877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52a299e736119550d85a9e25d53bf5b69c70b96d' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/admin/themes/default/template/controllers/stats/calendar.tpl',
      1 => 1441298341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139611661555e8783a4ea0f4-08506877',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55e8783a4ee837_86505957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e8783a4ee837_86505957')) {function content_55e8783a4ee837_86505957($_smarty_tpl) {?>

<div id="statsContainer" class="col-md-9">
	<?php echo $_smarty_tpl->getSubTemplate ("../../form_date_range_picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
