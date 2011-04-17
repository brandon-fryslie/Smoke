<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/smarty/libs/Smarty.class.php');

class MY_Smarty extends Smarty {

    public function __construct()
    {
		// It bitches without this
		date_default_timezone_set('America/Phoenix');
	
		parent::__construct();
		
		$this->template_dir = APPPATH.'views'; // CI Views folder - Store templates here
		$this->compile_dir  = APPPATH.'libraries/smarty/templates_c'; // Must be writable to apache!
		$this->config_dir   = APPPATH.'libraries/smarty/configs'; // Store variables in a file (to include)!
		$this->cache_dir    = APPPATH.'libraries/smarty/cache'; // Must be writable to apache!
		
		// $this->caching = Smarty::CACHING_LIFETIME_CURRENT; // Does something :)
		
		$this->force_compile = 1;
		
		$this->assign('app_name', 'Smoke'); // Assign app name here
		$this->assign('smoke', smoke()); // Assign app name here
		
		smoke()->load->helper('url');
		log_message('debug', "Smarty Class Initialized");
    }

	public function display ($t) 
	{
		// if (strpos($t, '.') === FALSE && strpos($t, ':' === FALSE)) { 
		if (strpos($t, '.') === FALSE && strpos($t, ':') === FALSE) { 
			$t .= '.tpl'; 
		} // Add extension
		
		parent::display($t);
	}
	
	public function display_str ($s)
	{
		parent::display("eval:$s");
	}
}

?>