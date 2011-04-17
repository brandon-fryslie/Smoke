<?php
/**
 * Smoke
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 */

// ------------------------------------------------------------------------

define('SMOKEPATH', realpath(dirname(__FILE__)).'/');
define('SMOKEURL', "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}");

date_default_timezone_set('America/Phoenix'); // Stuff likes this

// define('APPPATH', SMOKEPATH.'resources/');
// define('APPPATH', SMOKEPATH.'resources/');
define('BASEPATH', SMOKEPATH.'resources/');
define('APPPATH', BASEPATH);
define('EXT', '.php'); // CI Likes this to be there

require_once(SMOKEPATH.'resources/core/Common'.EXT);
require_once(SMOKEPATH.'misc/dbug'.EXT);
require_once(APPPATH.'config/constants'.EXT);
set_error_handler('_exception_handler');

function &get_instance() { 
	$obj = Smoke::get_instance();
	$obj = ($obj == NULL) ? new Smoke : $obj;
	return $obj;
}

function &smoke ()
{
	$obj = Smoke::get_instance();
	$obj = ($obj == NULL) ? new Smoke : $obj;
	return $obj;
}

class Smoke {

	private static $instance = NULL;

	/**
	 * Constructor
	 */
	public function __construct()
	{	
		self::$instance =& $this;
		
		global $smoke;
		$smoke = get_instance();

		// Include common functions
		if (!class_exists('dBug')) { require_once(SMOKEPATH.'misc/dBug'.EXT); }
				
		if (!is_php('5.3')) { @set_magic_quotes_runtime(0); } // Kill magic quotes

		// Set a liberal script execution time limit
		if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0) { @set_time_limit(300); }

		// Some stuff needs these like this
		global $CFG; // UTF-8 class needs this
		$CFG = $this->config = load_class('Config', 'core'); 

		global $UNI; // Input class needs this
		$UNI = $this->utf8 =  load_class('Utf8', 'core'); 
		
		global $BM; // Input class needs this
		$BM = $this->benchmark = load_class('Benchmark', 'core');
		
		$BM->mark('total_execution_time_start');
		
		global $OUT;
		$OUT = $this->output = load_class('Output', 'core');
		
		global $RTR;
		$RTR = $this->router = load_class('Router', 'core');
				
		$this->load = load_class('Loader', 'core');
		
		/* Init Core Classes */
		$classes = array(
			'URI',
			'Security',
			'Input',
			'Lang',
		);
				
		foreach ($classes as $class) { 
			$class = strtolower($class);
			$this->$class = load_class($class, 'core'); 
		}
		
		define('BASEURL', config_item('base_url'));

		log_message('debug', "Controller Class Initialized");
	}
	
	public function __get($name) {
		if ($name == 'db') { $this->load->database(); }
		else { $this->load->library($name); }
		return $this->$name;
	}

	// ------------------------------------------------------------------------

	public static function &get_instance()
	{
		return self::$instance;
	}
	
	public function out ($s)
	{
		global $OUT;
		$OUT->append_output($s);
	}
	
	public function display ($s = '')
	{
		global $BM, $OUT;
		$BM->mark('total_execution_time_end');
		if ($s == '') { $OUT->_display(); } 
		else { $OUT->set_output($s); $OUT->_display(); }
		
	}
}
// END Controller class

/* End of file Smoke.php */