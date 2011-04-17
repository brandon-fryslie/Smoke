<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

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
	'Table',
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

$smoke->load->database();

$res = smoke()->db->get('otu_summary_97', 20);

$out = smoke()->table->generate($res->result_array());

$smoke->out($out);
$smoke->display();

?>