<?php /* Smarty version Smarty-3.0.7, created on 2011-04-13 01:11:15
         compiled from "application/views/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1499654924da55aa3818274-40606084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '362c2aba28b903456d185ab556019218d88a24bd' => 
    array (
      0 => 'application/views/index.tpl',
      1 => 1302682261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1499654924da55aa3818274-40606084',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<script src="resources/js/jquery-1.5.js" type="text/javascript" charset="utf-8">
</script>
		<script src="resources/js/jquery-ui-1.8.9.custom.min.js" type="text/javascript" charset="utf-8">
</script>
		<script src="resources/js/query.js" type="text/javascript" charset="utf-8">
</script>
		<title>
			Welcome to CodeIgniter
		</title>
	</head>
	<body>
		<div id="wrapper">
			<button id="toggle_content">Toggle Content</button>
			<div id="content">
				<h1>
					<?php echo $_smarty_tpl->getVariable('title')->value;?>

				</h1>
				<p>
					<?php echo $_smarty_tpl->getVariable('basepath')->value;?>

				</p>
				<p>
					<table>
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('server_info')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<tr><td><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</td></tr>
						<?php }} ?>
					</table>
				</p>
			</div>
		</div>
	</body>
</html>
