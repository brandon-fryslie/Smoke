<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../../Smoke.class.php');

$res = smoke()->db->get('otu_summary_97', 20);

$out = smoke()->table->generate($res->result_array());

smoke()->out($out);

smoke()->display();

?>