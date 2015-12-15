<?php /* Smarty version Smarty-3.1.19, created on 2015-12-03 21:51:35
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/modules/themeconfigurator/views/templates/admin/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22509779955f1b6ed4bad59-70939106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b829b0c1d07eab116221cacc74cb2939286f7931' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/modules/themeconfigurator/views/templates/admin/admin.tpl',
      1 => 1448993191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22509779955f1b6ed4bad59-70939106',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f1b6ed527072_02228465',
  'variables' => 
  array (
    'htmlcontent' => 0,
    'error' => 0,
    'confirmation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1b6ed527072_02228465')) {function content_55f1b6ed527072_02228465($_smarty_tpl) {?>

<div id="htmlcontent" class="panel">
    <div class="panel-heading"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['htmlcontent']->value['info']['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 (v.<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['htmlcontent']->value['info']['version'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
)</div>
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)&&$_smarty_tpl->tpl_vars['error']->value) {?>
        <?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['htmlcontent']->value['admin_tpl_path'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1."messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"main",'text'=>$_smarty_tpl->tpl_vars['error']->value,'class'=>'error'), 0);?>

    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value) {?>
        <?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['htmlcontent']->value['admin_tpl_path'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp2."messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"main",'text'=>$_smarty_tpl->tpl_vars['confirmation']->value,'class'=>'conf'), 0);?>

    <?php }?>
    <!-- New -->
    <?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['htmlcontent']->value['admin_tpl_path'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp3=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp3."new.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- Slides -->
    <?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['htmlcontent']->value['admin_tpl_path'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp4=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp4."items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
