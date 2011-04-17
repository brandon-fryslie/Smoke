<?php /* Smarty version Smarty-3.0.7, created on 2011-04-16 19:53:46
         compiled from "/Library/WebServer/Documents/smoke/resources/views/Cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13033853634daa563a499d75-00255265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0640c54fa6f253f3a6a4b4f85e7d6ef390dc99a4' => 
    array (
      0 => '/Library/WebServer/Documents/smoke/resources/views/Cart.tpl',
      1 => 1303007771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13033853634daa563a499d75-00255265',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
	<head>
		<style>
			th, td { border: 1px solid; padding:3px; }
			form { width: 500px; }
			label { display: block;float: left;clear: left;text-align: right;width: 30%;margin: 0 6px 0 0; }
			input, reset, button { margin: 10px;display: block; }
			.error { color: red; }
		</style>
	</head>
	<body>
		<div>
			<?php echo form_open('examples/libraries/Cart.php');?>

			
			<h2>Items</h2>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
?>
				<?php if ($_smarty_tpl->tpl_vars['item']->first){?>
					<?php echo $_smarty_tpl->getVariable('smoke')->value->table->set_heading(array_keys($_smarty_tpl->tpl_vars['item']->value));?>

				<?php }?>
				<?php if (!isset($_smarty_tpl->tpl_vars['item']) || !is_array($_smarty_tpl->tpl_vars['item']->value)) $_smarty_tpl->createLocalArrayVariable('item', null, null);
$_smarty_tpl->tpl_vars['item']->value[] = form_submit("insert_id_".($_smarty_tpl->tpl_vars['item']->value['id']),'Insert Item');?>
				<?php echo $_smarty_tpl->getVariable('smoke')->value->table->add_row(array_values($_smarty_tpl->tpl_vars['item']->value));?>

			<?php }} ?>
			<?php echo $_smarty_tpl->getVariable('smoke')->value->table->generate();?>


			<h2>Shopping Cart</h2>
			<?php echo form_fieldset('Cart');?>


			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('smoke')->value->cart->contents(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
?>
				<p>Name: <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
				<p>			
				<?php echo form_hidden(($_smarty_tpl->tpl_vars['item']->value['id'])."_rowid",$_smarty_tpl->tpl_vars['item']->value['rowid']);?>

				<?php echo form_label('Quantity: ',($_smarty_tpl->tpl_vars['item']->value['id'])."_qty");?>

				<?php $_smarty_tpl->tpl_vars['arr'] = new Smarty_variable(array('name'=>($_smarty_tpl->tpl_vars['item']->value['id'])."_qty",'value'=>$_smarty_tpl->tpl_vars['item']->value['qty'],'maxlength'=>'3','size'=>'5'), null, null);?>
				<?php echo form_input($_smarty_tpl->getVariable('arr')->value);?>

				</p>
			<?php }} ?>

			<p>Total: <?php echo $_smarty_tpl->getVariable('smoke')->value->cart->format_number($_smarty_tpl->getVariable('smoke')->value->cart->total());?>
</p>

			<?php echo form_submit('update','Update Cart');?>

			<?php echo form_submit('empty_cart','Empty Cart');?>

			<?php echo form_fieldset_close();?>

			<?php echo form_close();?>

		</div>
	</body>
</html>