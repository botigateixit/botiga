<?php /* Smarty version Smarty-3.1.19, created on 2016-07-28 18:15:33
         compiled from "/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/maintenance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2040122160579a2fa58a2655-73823518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '257eca32da0e9304c809c0d4940ad5074720052c' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/maintenance.tpl',
      1 => 1469721681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2040122160579a2fa58a2655-73823518',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language_code' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'favicon_url' => 0,
    'css_dir' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
    'HOOK_MAINTENANCE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_579a2fa592c018_93861790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579a2fa592c018_93861790')) {function content_579a2fa592c018_93861790($_smarty_tpl) {?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_code']->value, ENT_QUOTES, 'UTF-8', true);?>
">
<head>
	<meta charset="utf-8">
	<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)) {?>
	<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
">
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)) {?>
	<meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
">
<?php }?>
	<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)) {?>no<?php }?>index,follow">
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
">
       	<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
maintenance.css" rel="stylesheet">
       	<link href='//fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet'>
</head>
<body>
    	<div class="container">
			<div id="maintenance">
				<div class="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['logo_image_width']->value) {?>width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['logo_image_height']->value) {?>height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
"<?php }?> alt="logo" /></div>
	        		<?php echo $_smarty_tpl->tpl_vars['HOOK_MAINTENANCE']->value;?>

	        		<div id="message">
	             			<h1 class="maintenance-heading"><?php echo smartyTranslate(array('s'=>'Estem de Vacances !!!'),$_smarty_tpl);?>
</h1>
							<?php echo smartyTranslate(array('s'=>'Tornarem aviat. Si us voleu posar en contacte amb nosaltres, envieu un correu a la següent adreça:'),$_smarty_tpl);?>

							<br />
							<?php echo smartyTranslate(array('s'=>'teixitdelaterra@gmail.com'),$_smarty_tpl);?>

					</div>
				</div>
	        </div>
		</div>
</body>
</html>
<?php }} ?>
