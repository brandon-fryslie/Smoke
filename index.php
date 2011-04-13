<?php 

require_once('Smoke.class.php');
require_once('misc/dBug.php');

$smoke = new Smoke;

$smoke->load->helper(array(
	// 'array', 
	// 'captcha', 
	// 'cookie', 
	// 'date', 
	// 'directory', 
	// 'download', 
	// 'email', 
	// 'file', 
	// 'form', 
	// 'html', 
	// 'inflector', 
	// 'language', 
	// 'number', 
	// 'path', 
	// 'security', 
	// 'smiley', 
	// 'string', 
	// 'text', 
	// 'typography', 
	// 'url', 
	// 'xml', 
));

$smoke->load->library(array(
	'Form_Validation',
	'Calendar',
	// 'Cart',
	// 'Email',
	// 'Encrypt',
	// 'Upload',
	// 'FTP',
	// 'Table',
	// 'Image_lib',
	// 'Javascript',
	// 'Pagination',
	// 'Trackback',
	// 'Parser',
	// 'Typography',
	// 'Unit_test',
	// 'User_agent',
	// 'xmlrpc',
	// 'xmlrpcs',
));

$smoke->form_validation->set_rules('username', 'Username', 'required');

$smoke->benchmark->mark('code_start');

// $smoke->load->database();

// phpinfo();

// $query = $this->db->query('SELECT name, title, email FROM my_table');

// foreach ($query->result() as $row)
// {
//     echo $row->title;
//     echo $row->name;
//     echo $row->email;
// }

// echo 'Total Results: ' . $query->num_rows();

$out = '';

if ($smoke->form_validation->run() == FALSE)
{
	$out .= validation_errors();
	$out .= form_open();
	$out .= form_input('username');
	$out .= form_submit('Send');
	$out .= form_close();
	
	$out .= "Failed!<br>";
	
	$smoke->benchmark->mark('code_end');
	
	$out .= "Time Elapsed: {$smoke->benchmark->elapsed_time('code_start', 'code_end')}<br>";
	$out .= "Mem Usage: {$smoke->benchmark->memory_usage()}<br>";
} else {
	
	$out .= "Success!";
	
}

echo $smoke->calendar->generate(2006, 6);

$smoke->out($out);
$smoke->display();

?>