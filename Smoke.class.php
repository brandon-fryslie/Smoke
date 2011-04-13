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

function &get_instance() { return Smoke::get_instance(); }

class Smoke {

	private static $instance = NULL;

	/**
	 * Constructor
	 */
	public function __construct()
	{	
		self::$instance =& $this;

		// Include common functions
		require_once(SMOKEPATH.'resources/core/Common'.EXT);
		require_once(SMOKEPATH.'misc/dBug'.EXT);
		require_once(APPPATH.'config/constants'.EXT);
		
		set_error_handler('_exception_handler');
		if (!is_php('5.3')) { @set_magic_quotes_runtime(0); } // Kill magic quotes

		// Set a liberal script execution time limit
		if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0) { @set_time_limit(300); }

		// Some stuff needs these like this
		global $CFG; // UTF-8 class needs this
		$CFG = $this->config = $this->load_class('Config'); 

		global $UNI; // Input class needs this
		$UNI = $this->load_class('Utf8'); 
		
		global $BM; // Input class needs this
		$BM = $this->benchmark = $this->load_class('Benchmark');
		
		$BM->mark('total_execution_time_start');
		
		global $OUT;
		$OUT = $this->output = $this->load_class('Output');
		
		global $RTR;
		$RTR = $this->router = $this->load_class('Router');
				
		$this->load = $this->load_class('Loader');
		
		/* Init Core Classes */
		$classes = array(
			'URI',
			'Security',
			'Input',
			'Lang',
		);
				
		foreach ($classes as $class) { 
			$class = strtolower($class);
			$this->$class = $this->load_class($class); 
		}


		log_message('debug', "Controller Class Initialized");
	}

	// ------------------------------------------------------------------------
	
	/**
	* Class registry
	*
	* This function acts as a singleton.  If the requested class does not
	* exist it is instantiated and set to a static variable.  If it has
	* previously been instantiated the variable is returned.
	*
	* @access	public
	* @param	string	the class name being requested
	* @param	string	the directory where the class should be found
	* @param	string	the class name prefix
	* @return	object
	*/
	
	function &load_class($class, $prefix = 'CI_')
	{
		// Does the class exist?  If so, we're done...
		if (isset($this->classes[$class])) { return $this->classes[$class]; }
	
		$name = FALSE;
	
		foreach (array('core/', 'libraries/', 'helpers/', 'models/') as $dir) {
			if (file_exists(SMOKEPATH.'resources/'.$dir.$class.EXT)) { 
				$name = $prefix.$class; 
				break;
			}
		} 
		
		if (class_exists($name) === FALSE) { require_once(SMOKEPATH.'resources/'.$dir.$class.EXT); }
	
		// Did we find the class?
		if ($name === FALSE)
		{
			// Note: We use exit() rather then show_error() in order to avoid a
			// self-referencing loop with the Excptions class
			exit('Unable to locate the specified class: '.$class.EXT);
		}
		
		$this->classes[$class] = new $name();
		return $this->classes[$class];
	}
	
	public static function &get_instance()
	{
		return self::$instance;
	}
	
	public function out ($s)
	{
		global $OUT;
		$OUT->set_output($s);
	}
	
	public function display ()
	{
		global $BM, $OUT;
		$BM->mark('total_execution_time_end');
		$OUT->_display();
	}
}
// END Controller class

/* End of file Smoke.php */