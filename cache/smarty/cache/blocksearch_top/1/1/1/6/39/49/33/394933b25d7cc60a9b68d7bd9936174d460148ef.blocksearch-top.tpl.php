<?php /*%%SmartyHeaderCode:77772470555e87ef0efbf92-09311578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '394933b25d7cc60a9b68d7bd9936174d460148ef' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1441298341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77772470555e87ef0efbf92-09311578',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55e87ef4354a21_99105337',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e87ef4354a21_99105337')) {function content_55e87ef4354a21_99105337($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//botiga-teixitdelaterra.rhcloud.com/ca/search" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Cercar" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Cercar</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
