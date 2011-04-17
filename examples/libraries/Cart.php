<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../../Smoke.class.php');

smoke()->load->helper('form');

// These are all the items for purchase
// You would probably get them from a db instead
$items = array(
	array(
		'id'    => '0',  
		'qty'   => '1',  
		'price' => '20', 
		'name'  => 'Rubber Boots',
	),
	array(
		'id'    => '1',  
		'qty'   => '1',  
		'price' => '40', 
		'name'  => 'Leather Boots',
	),
	array(
		'id'    => '2',  
		'qty'   => '1',  
		'price' => '60', 
		'name'  => 'Ostrich Boots',
	),
	array(
		'id'    => '3',  
		'qty'   => '1',  
		'price' => '80', 
		'name'  => 'Alligator Boots',
	),
);

// Check to see if an item was inserted
// This isn't a good way to implement the shopping cart
// It just shows how to use the shopping cart class
foreach ($items as $item) 
{
	if (isset($_POST["insert_id_{$item['id']}"])) // See which button was clicked.
	{ 
		smoke()->cart->insert($item);
	}
}


// See if the update button was pressed
if (isset($_POST['update'])) 
{
	// We need to loop through all the items to see if they need updating
	foreach ($items as $item) 
	{
		// We know the item is in the cart if the {$id}_rowid field was set
		if (isset($_POST["{$item['id']}_rowid"])) 
		{
			// Update the cart
			smoke()->cart->update(
				array(
					'rowid' => $_POST["{$item['id']}_rowid"],
					'qty'   => $_POST["{$item['id']}_qty"]
				)
			);			
		}
	}
}

// This empties the shopping cart
if (isset($_POST['empty_cart'])) 
{
	smoke()->cart->destroy();	
}

// Assign the items array so we can use it in the template
$smoke->smarty->assign(array(
	'items' => $items,
));

smoke()->smarty->display('Cart');

?>