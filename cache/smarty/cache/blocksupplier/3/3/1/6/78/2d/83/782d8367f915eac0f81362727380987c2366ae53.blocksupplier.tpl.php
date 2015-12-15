<?php /*%%SmartyHeaderCode:5214212955fb30bb825cb3-74411618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '782d8367f915eac0f81362727380987c2366ae53' => 
    array (
      0 => '/var/lib/openshift/55e615f62d5271473f000022/app-root/runtime/repo/themes/default-bootstrap/modules/blocksupplier/blocksupplier.tpl',
      1 => 1442509895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5214212955fb30bb825cb3-74411618',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566ef58d9f0d80_33826871',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566ef58d9f0d80_33826871')) {function content_566ef58d9f0d80_33826871($_smarty_tpl) {?>
<!-- Block suppliers module -->
<div id="suppliers_block_left" class="block blocksupplier">
	<p class="title_block">
					<a href="http://botiga-teixitdelaterra.rhcloud.com/ca/supplier" title="Proveïdors">
					Proveïdors
					</a>
			</p>
	<div class="block_content list-block">
								<ul>
											<li class="first_item">
                					<a 
					href="http://botiga-teixitdelaterra.rhcloud.com/ca/6__la-feixa-verda" 
					title="Més sobre La Feixa Verda">
				                La Feixa Verda
                					</a>
                				</li>
															<li class="item">
                					<a 
					href="http://botiga-teixitdelaterra.rhcloud.com/ca/5__moli-de-bonsfills" 
					title="Més sobre Moli de Bonsfills">
				                Moli de Bonsfills
                					</a>
                				</li>
															<li class="item">
                					<a 
					href="http://botiga-teixitdelaterra.rhcloud.com/ca/2__prat-manel" 
					title="Més sobre Prat-Manel">
				                Prat-Manel
                					</a>
                				</li>
															<li class="item">
                					<a 
					href="http://botiga-teixitdelaterra.rhcloud.com/ca/1__roca" 
					title="Més sobre Roca">
				                Roca
                					</a>
                				</li>
															<li class="item">
                					<a 
					href="http://botiga-teixitdelaterra.rhcloud.com/ca/4__stock" 
					title="Més sobre Stock">
				                Stock
                					</a>
                				</li>
																	</ul>
										<form action="/index.php" method="get">
					<div class="form-group selector1">
						<select class="form-control" name="supplier_list">
							<option value="0">Tots els proveïdors</option>
													<option value="http://botiga-teixitdelaterra.rhcloud.com/ca/6__la-feixa-verda">La Feixa Verda</option>
													<option value="http://botiga-teixitdelaterra.rhcloud.com/ca/5__moli-de-bonsfills">Moli de Bonsfills</option>
													<option value="http://botiga-teixitdelaterra.rhcloud.com/ca/2__prat-manel">Prat-Manel</option>
													<option value="http://botiga-teixitdelaterra.rhcloud.com/ca/1__roca">Roca</option>
													<option value="http://botiga-teixitdelaterra.rhcloud.com/ca/4__stock">Stock</option>
													<option value="http://botiga-teixitdelaterra.rhcloud.com/ca/3__vivo">Vivo</option>
												</select>
					</div>
				</form>
						</div>
</div>
<!-- /Block suppliers module -->
<?php }} ?>
