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
			{form_open('examples/libraries/Cart.php')}
			
			<h2>Items</h2>
			{foreach $items as $item}
				{* $var@first is a boolean that is true on the first iteration *}
				{if $item@first}
					{* If it's the first iteration, set the headings *}
					{$smoke->table->set_heading(array_keys($item))}
				{/if}
				{$item[]=form_submit("insert_id_{$item.id}", 'Insert Item')}
				{* 
					Add each row. Use array_values if the keys are non-numeric! 
					Otherwise 
				*}
				{$smoke->table->add_row(array_values($item))}
			{/foreach}
			{$smoke->table->generate()}
			{* form_submit('insert_id', 'Insert Item') *}

			<h2>Shopping Cart</h2>
			{form_fieldset('Cart')}

			{foreach $smoke->cart->contents() as $item}
				<p>Name: {$item.name}</p>
				<p>			
				{form_hidden("{$item.id}_rowid", $item.rowid)}
				{form_label('Quantity: ', "{$item.id}_qty")}
				{* We assign the array here so we can use values from $item *}
				{assign var=arr value=['name'=>"{$item.id}_qty",'value'=>$item.qty,'maxlength'=>'3',size=>'5']}
				{form_input($arr)}
				</p>
			{/foreach}

			<p>Total: {$smoke->cart->format_number($smoke->cart->total())}</p>

			{form_submit('update', 'Update Cart')}
			{form_submit('empty_cart', 'Empty Cart')}
			{form_fieldset_close()}
			{form_close()}
		</div>
	</body>
</html>