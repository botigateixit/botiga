<?php /* Smarty version Smarty-3.1.19, created on 2015-09-03 16:41:28
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/modules/referralprogram/views/templates/hook/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105741174455e87838e50798-25039760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26c31287ff03230a09e37cf1c4218902aa705e8b' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/modules/referralprogram/views/templates/hook/my-account.tpl',
      1 => 1441298341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105741174455e87838e50798-25039760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55e87838f2c4d2_98095211',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e87838f2c4d2_98095211')) {function content_55e87838f2c4d2_98095211($_smarty_tpl) {?>

<!-- MODULE ReferralProgram -->
<li class="referralprogram">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('referralprogram','program',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Referral program','mod'=>'referralprogram'),$_smarty_tpl);?>
" rel="nofollow"><i class="icon-cogs"></i><span><?php echo smartyTranslate(array('s'=>'Referral program','mod'=>'referralprogram'),$_smarty_tpl);?>
</span></a>
</li>
<!-- END : MODULE ReferralProgram --><?php }} ?>
