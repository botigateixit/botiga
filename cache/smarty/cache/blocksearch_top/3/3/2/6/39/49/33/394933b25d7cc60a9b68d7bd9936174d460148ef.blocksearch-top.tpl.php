<?php /*%%SmartyHeaderCode:104394860755f1b5d2b24e31-59965895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '394933b25d7cc60a9b68d7bd9936174d460148ef' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1441303312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104394860755f1b5d2b24e31-59965895',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_565ec464d5a169_77511441',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565ec464d5a169_77511441')) {function content_565ec464d5a169_77511441($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//botiga-teixitdelaterra.rhcloud.com/es/buscar" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Buscar" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Buscar</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
