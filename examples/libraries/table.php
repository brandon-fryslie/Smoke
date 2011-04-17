<?php 

require_once('../../Smoke.class.php');

$data = array(
	array('Name', 'Color', 'Size'),
	array('Fred', 'Blue', 'Small'),
	array('Mary', 'Red', 'Large'),
	array('John', 'Green', 'Medium')	
);

$smoke = smoke();

smoke()->smarty->assign('data', $data);

$out = <<< HTML
	<div>
		<h2>HTML Tables</h2>
		<p>
			{* Due to PHP parsing these strings, you must escape the $ in smarty variables}
			{\$smoke->table->generate(\$data)}
	  	</p>
	</div>	
HTML;

smoke()->smarty->display_str($out); 

?>