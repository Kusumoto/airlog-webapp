<?php 
 /* 
 * @package	Software Analysis and Maintenance Framework
 * @author	SAMF Dev Team
 * @copyright	Copyright (c) 2015, SAMF Dev Team
 * @license	http://opensource.org/licenses/Apache-2.0
 * @since	Version 1.0.0
 *
 */

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
 * Logger Model
 *
 * The Database Model for Log data control
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

 class Logger_model extends CI_Model
 {

 	/**
	 * _id in database
	 *
	 * @var	string
	*/
 	private $_id;

 	/**
	 * Log Type in database
	 *
	 * @var	string
	*/
 	private $log_type;

 	/**
	 * Log Message in database
	 *
	 * @var	string
	*/
 	private $log_data;

 	/**
	 * Log Date in database
	 *
	 * @var	string
	*/
 	private $log_date;

 	/**
	 * Log Time in database
	 *
	 * @var	string
	*/
 	private $log_time;

 	/**
	 * Log IP Address in database
	 *
	 * @var	string
	*/
 	private $log_ip;

 	/**
	 * Log version of agent in database
	 *
	 * @var	string
	*/
 	private $log_vagent;

 	/**
	 * Log application name in database
	 *
	 * @var	string
	*/
 	private $log_appname;

 	/**
	 * Log application id in database
	 *
	 * @var	string
	*/
 	private $log_appid;

 	/**
	 * Log function name in database
	 *
	 * @var	string
	*/
 	private $log_funcname;

 	/**
	 * Log function id in database
	 *
	 * @var	string
	*/
 	private $log_funcid;

 	/**
	 * Log datetime in database
	 *
	 * @var	string
	*/
 	private $log_datetime;


 	/**
	 * Log classname in database
	 *
	 * @var	string
	*/
 	private $log_classname;


 	/**
	 * Log methodname in database
	 *
	 * @var	string
	*/
 	private $log_methodname;

 	/**
	 * Constructor - Load MongoDB Library
	 *
	 * The constructor is load a MongoDB Library for use.
	 *
	 * @return	void
	 */
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->library('mongo_db');
 	}

 	/**
	 * Set _ID to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setID($_id) 
 	{
 		$this->_id = $_id;
 	}

 	/**
	 * Set Log Type to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setLogType($log_type) 
 	{
 		$this->log_type = $log_type;
 	}

 	/**
	 * Set Log Date to variable
	 *
	 * @param 	date
	 * @return	void
	 */
 	public function setLogDate($log_date) 
 	{
 		$this->log_date = $log_date;
 	}

 	/**
	 * Set Log Time to variable
	 *
	 * @param 	time
	 * @return	void
	 */
 	public function setLogTime($log_time) 
 	{
 		$this->log_time = $log_time;
 	}

 	/**
	 * Set Log Data to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setLogData($log_data) 
 	{
 		$this->log_data = $log_data;
 	}

 	/**
	 * Set IP Address to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setLogIP($log_ip) 
 	{
 		$this->log_ip = $log_ip;
 	}

 	/**
	 * Set Log application name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setAppName($log_appname) 
 	{
 		$this->log_appname = $log_appname;
 	}

 	/**
	 * Set Log application id to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setAppID($log_appid) 
 	{
 		$this->log_appid = $log_appid;
 	}

 	/**
	 * Set Log function name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setFuncName($log_funcname) 
 	{
 		$this->log_funcname = $log_funcname;
 	}

 	/**
	 * Set Log function id to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setFuncID($log_funcid) 
 	{
 		$this->log_funcid = $log_funcid;
 	}

 	/**
	 * Set Log version of agent to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setLogVAgent($log_vagent) 
 	{
 		$this->log_vagent = $log_vagent;
 	}

 	/**
	 * Set datetime to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setDateTime($log_datetime) 
 	{
 		$this->log_datetime = $log_datetime;
 	}

 	/**
	 * Set classname to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setClassName($log_classname) 
 	{
 		$this->log_classname = $log_classname;
 	}

 	/**
	 * Set methodname to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setMethodName($log_methodname) 
 	{
 		$this->log_methodname = $log_methodname;
 	}

 	/**
	 * Get _id from variable
	 *
	 * @return	string
	 */
 	public function getID() 
 	{
 		return $this->_id;
 	}

 	/**
	 * Get Log type from variable
	 *
	 * @return	string
	 */
 	public function getLogType() 
 	{
 		return $this->log_type;
 	}

 	/**
	 * Get Log Date from variable
	 *
	 * @return	string
	 */
 	public function getLogDate() 
 	{
 		return $this->log_date;
 	}

 	/**
	 * Get Log Time from variable
	 *
	 * @return	string
	 */
 	public function getLogTime() 
 	{
 		return $this->log_time;
 	}

 	/**
	 * Get Log Data from variable
	 *
	 * @return	string
	 */
 	public function getLogData() 
 	{
 		return $this->log_data;
 	}

 	/**
	 * Get Log IP Address from variable
	 *
	 * @return	string
	 */
 	public function getLogIP() 
 	{
 		return $this->log_ip;
 	}

 	/**
	 * Get Log application name from variable
	 *
	 * @return	string
	 */
 	public function getLogAppName() 
 	{
 		return $this->log_appname;
 	}

 	/**
	 * Get Log application id from variable
	 *
	 * @return	string
	 */
 	public function getLogAppID() 
 	{
 		return $this->log_appid;
 	}

 	/**
	 * Get Log function name from variable
	 *
	 * @return	string
	 */
 	public function getLogFuncName() 
 	{
 		return $this->log_funcname;
 	}

 	/**
	 * Get Log function id from variable
	 *
	 * @return	string
	 */
 	public function getLogFuncID() 
 	{
 		return $this->log_funcid;
 	}

 	/**
	 * Get Log version of agent from variable
	 *
	 * @return	string
	 */
 	public function getLogVAgent() 
 	{
 		return $this->log_vagent;
 	}

 	/**
	 * Get Log datetime from variable
	 *
	 * @return	string
	 */
 	public function getDateTime() 
 	{
 		return $this->log_datetime;
 	}

 	/**
	 * Get Log Classname from variable
	 *
	 * @return	string
	 */
 	public function getClassName() 
 	{
 		return $this->log_classname;
 	}

 	/**
	 * Get Log Methodname from variable
	 *
	 * @return	string
	 */
 	public function getMethodName() 
 	{
 		return $this->log_methodname;
 	}

 	/**
	 * get logger (no if statement) from database
	 *
	 * @return	array
	 */
 	public function get() 
 	{
 		// announce return variable
 		$return 	= 	array();
 		try 
 		{
 			// select logger collection 
 			$logger_data 	= 	$this->mongo_db->db->logger;
 			// preparing query data
 			$preparing_data = 	array(
 				'log_date' 	=> 	date('Y-m-d')
 				);
 			// query data
 			$getter_data 	= 	$logger_data->find($preparing_data);
 			// loop for get a data from database
 			while ($getter_data->hasNext()) 
 			{
 				$data 		= 	$getter_data->getNext();
 				$return[] 	= 	array(
 					'_id' 			 => 	(string)$data['_id'],
 					'log_type' 		 => 	$data['log_type'], 
 					'log_data' 		 => 	$data['log_data'],
 					'log_date' 		 => 	$data['log_date'],
 					'log_time' 		 => 	$data['log_time'],
 					'log_datetime' 	 => 	$data['log_datetime'],
 					'log_ip' 		 => 	$data['log_ip'],
 					'log_vagent' 	 => 	$data['log_vagent'],
 					'log_appname' 	 => 	$data['log_appname'],
 					'log_appid' 	 => 	$data['log_appid'],
 					'log_funcname' 	 => 	$data['log_funcname'],
 					'log_funcid' 	 => 	$data['log_funcid'],
 					'log_classname'  => 	$data['log_classname'],
 					'log_methodname' => 	$data['log_methodname'],
 					);
 			}
 			return $return;
 		} 
 		catch (Exception $e) 
 		{
 			return $return;
 		}
 	}

 	/**
	 * get logger (if statement) from database
	 *
	 * @return	array
	 */
 	public function getif($daterange,$type,$appid) 
	{

 		// announce return variable
 		$return 		= 	array();
 		// select logger collection 
 		$logger_data 	= 	$this->mongo_db->db->logger;
 		// preparing query data
 		$datesimal 		= 	explode(' - ', $daterange);
 		// check daterage
 		if (count($datesimal) == 2) 
 		{
 			$startdatetime 	= 	new MongoDate(strtotime($datesimal[0]));
 			$enddatetime 	= 	new MongoDate(strtotime($datesimal[1]));
 			// if have type and appid
 			if (!empty($type) && !empty($appid)) 
 			{
 				$preparing_data 	= 	array(
 					'log_datetime' => array(
 						'$gt' 	=> 	$startdatetime, 
 						'$lte' 	=> 	$enddatetime
 						), 
 					'log_appid' => $appid, 
 					'log_type' 	=> array(
 							'$in' 	=> 	$type
 						)
 					);
 			// have appid only
 			} 
 			else if (empty($type)) 
 			{
 				$preparing_data 	= 	array(
 					'log_datetime' 	=> 	array(
 						'$gt' 			=> 		$startdatetime, 
 						'$lte'			=> 		$enddatetime
 						), 
 					'log_appid'    => 	$appid
 					);
 			// have type only
 			} 
 			else if (empty($appid)) 
 			{
 				$preparing_data 	= array(
 					'log_datetime' => array(
 						'$gt' 			=> 		$startdatetime, 
 						'$lte' 			=> 		$enddatetime
 						), 
 					'log_type' 	    => array(
 						'$in' 			=> 		$type
 						)
 					);
 			// not have anyting
 			} 
 			else 
 			{
 				$preparing_data = array(
 					'log_datetime' => array(
 						'$gt' 	=> $startdatetime, 
 						'$lte' 	=> $enddatetime)
 					);
 			}
 		} 
 		else 
 		{
 			// if have  type and appid
 			if (!empty($type) && !empty($appid)) 
 			{
 				$preparing_data = array(
 					'log_appid' 	=> 	$appid, 
 					'log_type' 		=> 	array(
 						'$in' => $type
 						)
 					);
 			// have type only
 			} 
 			else if (empty($type)) 
 			{
 				$preparing_data = array(
 					'log_appid' => $appid
 					);
 			// not have anyting
 			} 
 			else if (empty($appid)) 
 			{
 				$preparing_data = array(
 					'log_type' => array(
 						'$in' => $type
 						)
 					);
 			}
 		}
 		$getter_data 	= 	$logger_data->find($preparing_data);
 		// loop for get a data from database
 		while ($getter_data->hasNext()) {
 			$data 		= 	$getter_data->getNext();
 			$return[] 	= 	array(
 				'_id' 			=> 	(string)$data['_id'],
 				'log_type' 		=> 	$data['log_type'], 
 				'log_data' 		=> 	$data['log_data'],
 				'log_date' 		=> 	$data['log_date'],
 				'log_time' 		=> 	$data['log_time'],
 				'log_datetime' 	=> 	$data['log_datetime'],
 				'log_ip' 		=> 	$data['log_ip'],
 				'log_vagent' 	=> 	$data['log_vagent'],
 				'log_appname' 	=> 	$data['log_appname'],
 				'log_appid' 	=> 	$data['log_appid'],
 				'log_funcname' 	=> 	$data['log_funcname'],
 				'log_funcid' 	=> 	$data['log_funcid'],
 				'log_classname' => 	$data['log_classname'],
 				'log_methodname'=> 	$data['log_methodname'],
 				);
 		}
 		return $return;
 	}

 	/**
	 * count summary day data from database to graph generate
	 *
	 * @return	array
	 */
 	public function graphdaysummary()
 	{

 		// announce return variable
 		$return 			= 	array();
 		$error_data			=	array();
 		$notice_data		=	array();
 		$debug_data			= 	array();
 		// select logger collection 
 		$logger_data 	= 	$this->mongo_db->db->logger;
 		// preparing query data
 		for($i = 0; $i <= 24; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= 	new MongoRegex('/^0'.$i.'/');
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_time' 	=> $regex_Date, 
 					'log_date' 	=> $this->log_date, 
 					'log_type' 	=> 'Debug', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_error 	= 	array(
 					'log_time' 	=> $regex_Date, 
 					'log_date' 	=> $this->log_date, 
 					'log_type' 	=> 'Error', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_notice 	= 	array(
 					'log_time' 	=> $regex_Date, 
 					'log_date' 	=> $this->log_date, 
 					'log_type' 	=> 'Notice', 
 					'log_appid' => $this->log_appid
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date = new MongoRegex('/^'.$i.'/'); 
 				// build query data
 				$querydata_debug = array(
 					'log_time' 	=> 	$regex_Date, 
 					'log_date' 	=> 	$this->log_date, 
 					'log_type'	=> 	'Debug', 
 					'log_appid' => 	$this->log_appid
 					);
 				$querydata_error = array(
 					'log_time' 	=> 	$regex_Date, 
 					'log_date' 	=> 	$this->log_date, 
 					'log_type' 	=> 	'Error', 
 					'log_appid' => 	$this->log_appid
 					);
 				$querydata_notice = array(
 					'log_time' 	=> $regex_Date, 
 					'log_date' 	=> $this->log_date, 
 					'log_type' 	=> 'Notice', 
 					'log_appid' => $this->log_appid
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			}
 		}

 		$return	= array(

 			array(
 				'name'	=>	'error',
 				'data'	=>	$error_data
 				),
 			array(
 				'name'	=>	'notice',
 				'data'	=>	$notice_data
 				),
 			array(
 				'name'	=>	'debug',
 				'data'	=>	$debug_data
 				)
 			);

 		return $return;	
 	}

 	/**
	 * count summary month data from database to graph generate
	 *
	 * @return	array
	 */
 	public function graphmonthsummary()
 	{
 		// announce return variable
 		$return 			=	array();
 		$error_data			=	array();
 		$notice_data		=	array();
 		$debug_data			= 	array();
 		// select logger collection 
 		$logger_data 	= 	$this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 		= 	explode('-', $this->log_date);
 		// check day in month
 		$lastday 		= 	cal_days_in_month(CAL_GREGORIAN,$splitday[1],$splitday[0]);
 		for ($i = 1; $i <= $lastday; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// build query data
 				$querydata_debug 	= array(
 					'log_date' 	=> $splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 	=> 'Debug', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_error 	= array(
 					'log_date' 	=> $splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 	=> 'Error', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_notice 	= array(
 					'log_date' 	=> $splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 	=> 'Notice', 
 					'log_appid' => $this->log_appid
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			} 
 			else 
 			{
 				// build query data
 				$querydata_debug 	= array(
 					'log_date' 	=> $splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 	=> 'Debug', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_error	= array(
 					'log_date' 	=> $splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 	=> 'Error', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_notice 	= array(
 					'log_date' 	=> $splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 	=> 'Notice', 
 					'log_appid' => $this->log_appid);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			}
 		}

 		$return	= array(
 			'lastday'	=>	$lastday,
 			'data'		=>	array(
 				array(
 					'name'	=>	'error',
 					'data'	=>	$error_data
 					),
 				array(
 					'name'	=>	'notice',
 					'data'	=>	$notice_data
 					),
 				array(
 					'name'	=>	'debug',
 					'data'	=>	$debug_data
 					)
 				)
 			);
 		
 		return $return;	
 	}

 	/**
	 * count summary year data from database to graph generate
	 *
	 * @return	array
	 */
 	public function graphyearsummary()
 	{
 		// announce return variable
 		$return 			= 	array();
 		$error_data			=	array();
 		$notice_data		=	array();
 		$debug_data			= 	array();
 		// select logger collection 
 		$logger_data 	= $this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 		= explode('-', $this->log_date);
 		for ($i = 1; $i <= 12; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= new MongoRegex('/^'.$splitday[0].'-0'.$i.'/');
 				// build query data
 				$querydata_debug 	= array(
 					'log_date' 	=> $regex_Date, 
 					'log_type' 	=> 'Debug', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_error 	= array(
 					'log_date' 	=> $regex_Date, 
 					'log_type' 	=> 'Error', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_notice 	= array(
 					'log_date' 	=> $regex_Date, 
 					'log_type' 	=> 'Notice', 
 					'log_appid' => $this->log_appid
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= new MongoRegex('/^'.$splitday[0].'-'.$i.'/');
 				// build query data
 				$querydata_debug 	= array(
 					'log_date' 	=> $regex_Date, 
 					'log_type' 	=> 'Debug', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_error 	= array(
 					'log_date' 	=> $regex_Date, 
 					'log_type' 	=> 'Error', 
 					'log_appid' => $this->log_appid
 					);
 				$querydata_notice 	= array(
 					'log_date' 	=> $regex_Date, 
 					'log_type' 	=> 'Notice', 
 					'log_appid' => $this->log_appid
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			}
 		}

 		$return	= array(

 			array(
 				'name'	=>	'error',
 				'data'	=>	$error_data
 				),
 			array(
 				'name'	=>	'notice',
 				'data'	=>	$notice_data
 				),
 			array(
 				'name'	=>	'debug',
 				'data'	=>	$debug_data
 				)
 			);

 		return $return;	
 	}

 	/**
	 * count summary day data from database to graph ratio generate
	 *
	 * @return	array
	 */
 	public function graphdaysummaryratio()
 	{
 		// announce return variable
 		$return 			= array();
 		// select logger collection 
 		$logger_data 		= $this->mongo_db->db->logger;
 		// preparing query data
 		// build query data
 		$querydata_debug 	= array(
 			'log_date' 	=> $this->log_date, 
 			'log_type' 	=> 'Debug', 
 			'log_appid' => $this->log_appid
 			);
 		$querydata_error 	= array(
 			'log_date' 	=> $this->log_date, 
 			'log_type' 	=> 'Error', 
 			'log_appid' => $this->log_appid
 			);
 		$querydata_notice 	= array(
 			'log_date' 	=> $this->log_date, 
 			'log_type' 	=> 'Notice', 
 			'log_appid' => $this->log_appid
 			);
 		// count and insert data to array
 		$return[] 			= array(
 			'title' 	=> "Debug", 
 			'total' 	=> $logger_data->count($querydata_debug)
 			);
 		$return[] 			= array(
 			'title' 	=> "Error", 
 			'total' 	=> $logger_data->count($querydata_error)
 			);
 		$return[] 			= array(
 			'title' 	=> "Notice", 
 			'total' 	=> $logger_data->count($querydata_notice)
 			);
 		return $return;
 	}	

 	/**
	 * count summary month data from database to graph ratio generate
	 *
	 * @return	array
	 */
 	public function graphmonthsummaryratio()
 	{
 		// announce return variable
 		$return 			= array();
 		// select logger collection 
 		$logger_data 		= $this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 			= explode('-', $this->log_date);
 		// use mongoRegex (while like in sql)
 		$regex_Date 		= new MongoRegex('/^'.$splitday[0].'-'.$splitday[1].'/');
 		// build query data
 		$querydata_debug 	= array(
 			'log_date' 	=> $regex_Date, 
 			'log_type' 	=> 'Debug', 
 			'log_appid' => $this->log_appid
 			);
 		$querydata_error 	= array(
 			'log_date' 	=> $regex_Date, 
 			'log_type' 	=> 'Error', 
 			'log_appid' => $this->log_appid
 			);
 		$querydata_notice	= array(
 			'log_date' 	=> $regex_Date, 
 			'log_type' 	=> 'Notice', 
 			'log_appid' => $this->log_appid
 			);
 		// count and insert data to array
 		$return[] 			= array(
 			'title' 	=> "Debug", 
 			'total' 	=> $logger_data->count($querydata_debug)
 			);
 		$return[] 			= array(
 			'title' 	=> "Error", 
 			'total' 	=> $logger_data->count($querydata_error)
 			);
 		$return[] 			= array(
 			'title' 	=> "Notice", 
 			'total' 	=> $logger_data->count($querydata_notice)
 			);
 		return $return;	
 	}

 	/**
	 * count summary year data from database to graph ratio generate
	 *
	 * @return	array
	 */
 	public function graphyearsummaryratio()
 	{
 		// announce return variable
 		$return 			= 	array();
 		// select logger collection 
 		$logger_data 		= $this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 			= explode('-', $this->log_date);
 		// use mongoRegex (while like in sql)
 		$regex_Date 		= new MongoRegex('/^'.$splitday[0].'/');
 		// build query data
 		$querydata_debug 	= array(
 			'log_date' 	=> $regex_Date, 
 			'log_type' 	=> 'Debug', 
 			'log_appid' => $this->log_appid
 			);
 		$querydata_error 	= array(
 			'log_date' 	=> $regex_Date, 
 			'log_type' 	=> 'Error', 
 			'log_appid' => $this->log_appid
 			);
 		$querydata_notice 	= array(
 			'log_date' 	=> $regex_Date, 
 			'log_type' 	=> 'Notice', 
 			'log_appid' => $this->log_appid
 			);
 		// count and insert data to array
 		$return[] 			= array(
 			'title' 	=> "Debug", 
 			'total' 	=> $logger_data->count($querydata_debug)
 			);
 		$return[] 			= array(
 			'title' 	=> "Error", 
 			'total' 	=> $logger_data->count($querydata_error)
 			);
 		$return[] 			= array(
 			'title' 	=> "Notice", 
 			'total' 	=> $logger_data->count($querydata_notice)
 			);
 		return $return;	
 	}

 	/**
	 * get logger (if statement) from database (function)
	 *
	 * @return	array
	 */
 	public function getif_func($daterange,$type,$funcid) 
 	{
 		// announce return variable
 		$return 		= array();
 		// select logger collection 
 		$logger_data 	= $this->mongo_db->db->logger;
 		// preparing query data
 		$datesimal 		= explode(' - ', $daterange);
 		// check daterage
 		if (count($datesimal) == 2) 
 		{
 			$startdatetime 	= new MongoDate(strtotime($datesimal[0]));
 			$enddatetime 	= new MongoDate(strtotime($datesimal[1]));
 			// if have type and appid
 			if (!empty($type) && !empty($funcid)) 
 			{
 				$preparing_data 	= array(
 					'log_datetime' => array(
 						'$gt' 	=> $startdatetime, 
 						'$lte' 	=> $enddatetime
 						), 
 					'log_funcid'   	=> $funcid, 
 					'log_type' 		=> array(
 						'$in' 	=> $type
 						)
 					);
 			// have appid only
 			} 
 			else if (empty($type)) 
 			{
 				$preparing_data 	= array(
 					'log_datetime' 	=> array(
 						'$gt' 	=> $startdatetime, 
 						'$lte' 	=> $enddatetime
 						), 
 					'log_funcid' 	=> $funcid
 					);
 			// have type only
 			} 
 			else if (empty($funcid)) 
 			{
 				$preparing_data 	= array(
 					'log_datetime' 	=> array(
 						'$gt' 	=> $startdatetime, 
 						'$lte' 	=> $enddatetime
 						), 
 					'log_type' 		=> array(
 						'$in' 	=> $type
 						)
 					);
 			// not have anyting
 			} 
 			else 
 			{
 				$preparing_data 	= array(
 					'log_datetime' => array(
 						'$gt' 	=> $startdatetime, 
 						'$lte' 	=> $enddatetime
 						)
 					);
 			}
 		} 
 		else 
 		{
 			// if have  type and appid
 			if (!empty($type) && !empty($funcid)) 
 			{
 				$preparing_data 	= array(
 					'log_funcid' 	=> $funcid, 
 					'log_type' 		=> array(
 						'$in' 	=> $type
 						)
 					);
 			// have type only
 			} 
 			else if (empty($type)) 
 			{
 				$preparing_data 	= array(
 					'log_funcid' 	=> $funcid
 					);
 			// not have anyting
 			} 
 			else if (empty($funcid)) 
 			{
 				$preparing_data 	= array(
 					'log_type' 		=> array(
 						'$in' 	=> $type
 						)
 					);
 			}
 		}
 		$getter_data 	= 	$logger_data->find($preparing_data);
 		// loop for get a data from database
 		while ($getter_data->hasNext()) 
 		{
 			$data 		= 	$getter_data->getNext();
 			$return[] 	= 	array(
 				'_id' 				=> 	(string)$data['_id'],
 				'log_type' 			=> $data['log_type'], 
 				'log_data' 			=> $data['log_data'],
 				'log_date' 			=> $data['log_date'],
 				'log_time' 			=> $data['log_time'],
 				'log_datetime' 		=> $data['log_datetime'],
 				'log_ip' 			=> $data['log_ip'],
 				'log_vagent' 		=> $data['log_vagent'],
 				'log_appname' 		=> $data['log_appname'],
 				'log_appid' 		=> $data['log_appid'],
 				'log_funcname' 		=> $data['log_funcname'],
 				'log_funcid' 		=> $data['log_funcid'],
 				'log_classname' 	=> $data['log_classname'],
 				'log_methodname' 	=> $data['log_methodname'],
 				);
 		}
 		return $return;
 	}

 	/**
	 * count summary day data from database to graph generate (function)
	 *
	 * @return	array
	 */
 	public function graphdaysummaryfunc()
 	{

 		// announce return variable
 		$return 		= 	array();
 		// select logger collection 
 		$logger_data 	= $this->mongo_db->db->logger;
 		// preparing query data
 		for($i = 0; $i <= 24; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= new MongoRegex('/^0'.$i.'/');
 				// build query data
 				$querydata_debug 	= array(
 					'log_time' 		=> $regex_Date, 
 					'log_date' 		=> $this->log_date, 
 					'log_type' 		=> 'Debug', 
 					'log_funcid' 	=> $this->log_funcid
 					);
 				$querydata_error 	= array(
 					'log_time' 		=> $regex_Date, 
 					'log_date' 		=> $this->log_date, 
 					'log_type' 		=> 'Error', 
 					'log_funcid' 	=> $this->log_funcid
 					);
 				$querydata_notice 	= array(
 					'log_time' 		=> $regex_Date, 
 					'log_date' 		=> $this->log_date, 
 					'log_type' 		=> 'Notice', 
 					'log_funcid' 	=> $this->log_funcid
 					);
 				// count and insert data to array
 				$return[] 			= array(
 					'time' 			=> '0'.$i, 
 					'debug' 		=> $logger_data->count($querydata_debug), 
 					'error' 		=> $logger_data->count($querydata_error), 
 					'notice' 		=> $logger_data->count($querydata_notice)
 					);
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= new MongoRegex('/^'.$i.'/'); 
 				// build query data
 				$querydata_debug 	= array(
 					'log_time' 		=> $regex_Date, 
 					'log_date' 		=> $this->log_date, 
 					'log_type' 		=> 'Debug', 
 					'log_funcid' 	=> $this->log_funcid
 					);
 				$querydata_error 	= array(
 					'log_time' 		=> $regex_Date, 
 					'log_date' 		=> $this->log_date, 
 					'log_type' 		=> 'Error', 
 					'log_funcid' 	=> $this->log_funcid
 					);
 				$querydata_notice 	= array(
 					'log_time' 		=> $regex_Date, 
 					'log_date' 		=> $this->log_date, 
 					'log_type' 		=> 'Notice', 
 					'log_funcid' 	=> $this->log_funcid
 					);
 				// count and insert data to array
 				$return[] 			= array(
 					'time' 			=> 	$i, 
 					'debug' 		=> 	$logger_data->count($querydata_debug), 
 					'error' 		=> 	$logger_data->count($querydata_error), 
 					'notice' 		=> 	$logger_data->count($querydata_notice)
 					);
 			}
 		}
 		return $return;	
 	}

 	/**
	 * count summary month data from database to graph generate (function)
	 *
	 * @return	array
	 */
 	public function graphmonthsummaryfunc()
 	{
 		// announce return variable
 		$return 		= 	array();
 		// select logger collection 
 		$logger_data 	= $this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 		= explode('-', $this->log_date);
 		// check day in month
 		$lastday 		= cal_days_in_month(CAL_GREGORIAN,$splitday[1],$splitday[0]);
 		for ($i = 1; $i <= $lastday; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 		=> 	'Debug', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 		=> 	'Error', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 		=> 	'Notice', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				// count and insert data to array
 				$return[] 			= 	array(
 					'date' 			=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'debug' 		=> 	$logger_data->count($querydata_debug), 
 					'error' 		=> 	$logger_data->count($querydata_error), 
 					'notice' 		=> 	$logger_data->count($querydata_notice)
 					);
 			} 
 			else 
 			{
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 		=> 	'Debug', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 		=> 	'Error', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 		=> 	'Notice', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				// count and insert data to array
 				$return[] 			= 	array(
 					'date' 			=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'debug' 		=> 	$logger_data->count($querydata_debug), 
 					'error' 		=> 	$logger_data->count($querydata_error), 
 					'notice' 		=> 	$logger_data->count($querydata_notice)
 					);
 			}
 		}
 		return $return;	
 	}

 	/**
	 * count summary year data from database to graph generate (function)
	 *
	 * @return	array
	 */
 	public function graphyearsummaryfunc()
 	{
 		// announce return variable
 		$return 		= 	array();
 		$error_data		=	array();
 		$notice_data	=	array();
 		$debug_data		= 	array();
 		// select logger collection 
 		$logger_data 	= 	$this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 		= 	explode('-', $this->log_date);
 		for ($i = 1; $i <= 12; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= 	new MongoRegex('/^'.$splitday[0].'-0'.$i.'/');
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Debug', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Error', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Notice', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				// count and insert data to array
 				$return[] 			= 	array(
 					'month' 		=> 	$splitday[0].'-0'.$i, 
 					'debug' 		=> 	$logger_data->count($querydata_debug), 
 					'error' 		=> 	$logger_data->count($querydata_error), 
 					'notice' 		=> 	$logger_data->count($querydata_notice)
 					);
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= 	new MongoRegex('/^'.$splitday[0].'-'.$i.'/');
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Debug', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Error', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Notice', 
 					'log_funcid' 	=> 	$this->log_funcid
 					);
 				// count and insert data to array
 				$return[] 			= 	array(
 					'month' 		=> 	$splitday[0].'-'.$i, 
 					'debug' 		=> 	$logger_data->count($querydata_debug), 
 					'error' 		=> 	$logger_data->count($querydata_error), 
 					'notice' 		=> 	$logger_data->count($querydata_notice)
 					);
 			}
 		}
 		return $return;	
 	}

 	/**
	 * count summary day data from database to graph ratio generate (function)
	 *
	 * @return	array
	 */
 	public function graphdaysummaryratiofunc()
 	{
 		// announce return variable
 		$return 			= 	array();
 		$error_data			=	array();
 		$notice_data		=	array();
 		$debug_data			= 	array();
 		// select logger collection 
 		$logger_data 		= 	$this->mongo_db->db->logger;
 		// preparing query data
 		// build query data
 		$querydata_debug 	= 	array(
 			'log_date' 		=> 	$this->log_date, 
 			'log_type' 		=> 	'Debug', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		$querydata_error 	= 	array(
 			'log_date' 		=> 	$this->log_date, 
 			'log_type' 		=> 	'Error', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		$querydata_notice 	= 	array(
 			'log_date' 		=> 	$this->log_date, 
 			'log_type' 		=> 	'Notice', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		// count and insert data to array
 		$return[] 			= 	array(
 			'title' 		=> 	'Debug', 
 			'total' 		=> 	$logger_data->count($querydata_debug)
 			);
 		$return[] 			= 	array(
 			'title' 		=> 	'Error', 
 			'total' 		=> 	$logger_data->count($querydata_error)
 			);
 		$return[] 			= 	array(
 			'title' 		=> 	'Notice', 
 			'total' 		=> 	$logger_data->count($querydata_notice)
 			);
 		return $return;
 	}	

 	/**
	 * count summary month data from database to graph ratio generate (function)
	 *
	 * @return	array
	 */
 	public function graphmonthsummaryratiofunc()
 	{
 		// announce return variable
 		$return 			= 	array();
 		$error_data			=	array();
 		$notice_data		=	array();
 		$debug_data			= 	array();
 		// select logger collection 
 		$logger_data 		= 	$this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 			= 	explode('-', $this->log_date);
 		// use mongoRegex (while like in sql)
 		$regex_Date 		=	new MongoRegex('/^'.$splitday[0].'-'.$splitday[1].'/');
 		// build query data
 		$querydata_debug 	= 	array(
 			'log_date' 		=> 	$regex_Date, 
 			'log_type' 		=> 	'Debug', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		$querydata_error 	= 	array(
 			'log_date' 		=> 	$regex_Date, 
 			'log_type' 		=> 	'Error', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		$querydata_notice 	= 	array(
 			'log_date' 		=> 	$regex_Date, 
 			'log_type' 		=> 	'Notice', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		// count and insert data to array
 		$return[] 			= 	array(
 			'title' 		=> 	'Debug', 
 			'total' 		=> 	$logger_data->count($querydata_debug)
 			);
 		$return[] 			= 	array(
 			'title' 		=> 	'Error', 
 			'total' 		=> 	$logger_data->count($querydata_error)
 			);
 		$return[] 			= 	array(
 			'title' 		=> 	'Notice', 
 			'total'		 	=> 	$logger_data->count($querydata_notice)
 			);
 		return $return;	
 	}

 	/**
	 * count summary year data from database to graph ratio generate (function)
	 *
	 * @return	array
	 */
 	public function graphyearsummaryratiofunc()
 	{
 		// announce return variable
 		$return 			= 	array();
 		$error_data			=	array();
 		$notice_data		=	array();
 		$debug_data			= 	array();
 		// select logger collection 
 		$logger_data 		= 	$this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 			= 	explode('-', $this->log_date);
 		// use mongoRegex (while like in sql)
 		$regex_Date 		= 	new MongoRegex('/^'.$splitday[0].'/');
 		// build query data
 		$querydata_debug 	= 	array(
 			'log_date' 		=> 	$regex_Date, 
 			'log_type' 		=> 	'Debug', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		$querydata_error 	= 	array(
 			'log_date' 		=> 	$regex_Date, 
 			'log_type' 		=> 	'Error', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		$querydata_notice	= 	array(
 			'log_date' 		=> 	$regex_Date, 
 			'log_type' 		=> 	'Notice', 
 			'log_funcid' 	=> 	$this->log_funcid
 			);
 		// count and insert data to array
 		$return[] 			= 	array(
 			'title' 		=> 	'Debug', 
 			'total' 		=> 	$logger_data->count($querydata_debug)
 			);
 		$return[] 			= 	array(
 			'title' 		=> 	'Error', 
 			'total' 		=> 	$logger_data->count($querydata_error)
 			);
 		$return[] 			= 	array(
 			'title' 		=> 	'Notice', 
 			'total' 		=> 	$logger_data->count($querydata_notice)
 			);
 		return $return;	
 	}

 	/**
	 * count summary day data from database to graph generate (for dashboard)
	 *
	 * @return	array
	 */
 	public function graphdaysummary_dashboard()
 	{

 		// announce return variable
 		$return 		= 	array();
 		$error_data		=	array();
 		$notice_data	=	array();
 		$debug_data		= 	array();
 		// select logger collection 
 		$logger_data 	= 	$this->mongo_db->db->logger;
 		// preparing query data
 		for($i = 0; $i <= 24; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= 	new MongoRegex('/^0'.$i.'/');
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_time' 		=> 	$regex_Date, 
 					'log_date' 		=> 	$this->log_date, 
 					'log_type' 		=> 	'Debug'
 					);
 				$querydata_error 	= 	array(
 					'log_time' 		=> 	$regex_Date, 
 					'log_date' 		=> 	$this->log_date, 
 					'log_type' 		=> 	'Error'
 					);
 				$querydata_notice 	= 	array(
 					'log_time' 		=> 	$regex_Date, 
 					'log_date' 		=> 	$this->log_date, 
 					'log_type' 		=> 	'Notice'
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= 	new MongoRegex('/^'.$i.'/'); 
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_time' 		=> 	$regex_Date, 
 					'log_date' 		=> 	$this->log_date, 
 					'log_type' 		=> 	'Debug'
 					);
 				$querydata_error 	= 	array(
 					'log_time' 		=> 	$regex_Date, 
 					'log_date' 		=> 	$this->log_date, 
 					'log_type' 		=> 	'Error'
 					);
 				$querydata_notice 	= 	array(
 					'log_time' 		=> 	$regex_Date, 
 					'log_date' 		=> 	$this->log_date, 
 					'log_type' 		=> 	'Notice'
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			}
 		}
 		
 		$return	= array(

 			array(
 				'name'	=>	'error',
 				'data'	=>	$error_data
 				),
 			array(
 				'name'	=>	'notice',
 				'data'	=>	$notice_data
 				),
 			array(
 				'name'	=>	'debug',
 				'data'	=>	$debug_data
 				)
 			);

 		return $return;	
 	}

 	/**
	 * count summary month data from database to graph generate (for dashboard)
	 *
	 * @return	array
	 */
 	public function graphmonthsummary_dashboard()
 	{
 		// announce return variable
 		$return 		= 	array();
 		$error_data		=	array();
 		$notice_data	=	array();
 		$debug_data		= 	array();
 		// select logger collection 
 		$logger_data 	= 	$this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 		= 	explode('-', $this->log_date);
 		// check day in month
 		$lastday 		= 	cal_days_in_month(CAL_GREGORIAN,$splitday[1],$splitday[0]);
 		for ($i = 1; $i <= $lastday; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 		=> 	'Debug'
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 		=> 	'Error'
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'log_type' 		=> 	'Notice'
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			} 
 			else 
 			{
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 		=> 	'Debug'
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 		=> 	'Error'
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'log_type' 		=> 	'Notice'
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			}
 		}

 		$return	= array(
 			'lastday'	=>	$lastday,
 			'data'		=>	array(
 				array(
 					'name'	=>	'error',
 					'data'	=>	$error_data
 					),
 				array(
 					'name'	=>	'notice',
 					'data'	=>	$notice_data
 					),
 				array(
 					'name'	=>	'debug',
 					'data'	=>	$debug_data
 					)
 				)
 			);
 		return $return;	
 	}

 	/**
	 * count summary year data from database to graph generate (for dashboard)
	 *
	 * @return	array
	 */
 	public function graphyearsummary_dashboard()
 	{
 		// announce return variable
 		$return 		= 	array();
 		$error_data		=	array();
 		$notice_data	=	array();
 		$debug_data		= 	array();
 		// select logger collection 
 		$logger_data 	= 	$this->mongo_db->db->logger;
 		// preparing query data
 		$splitday 		= 	explode('-', $this->log_date);
 		for ($i = 1; $i <= 12; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= 	new MongoRegex('/^'.$splitday[0].'-0'.$i.'/');
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Debug'
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Error'
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Notice'
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			} 
 			else
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 		= 	new MongoRegex('/^'.$splitday[0].'-'.$i.'/');
 				// build query data
 				$querydata_debug 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Debug'
 					);
 				$querydata_error 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Error'
 					);
 				$querydata_notice 	= 	array(
 					'log_date' 		=> 	$regex_Date, 
 					'log_type' 		=> 	'Notice'
 					);
 				// count and insert data to array
 				array_push($error_data, $logger_data->count($querydata_error));
 				array_push($notice_data, $logger_data->count($querydata_notice));
 				array_push($debug_data, $logger_data->count($querydata_debug));
 			}
 		}

 		$return	= array(

 			array(
 				'name'	=>	'error',
 				'data'	=>	$error_data
 				),
 			array(
 				'name'	=>	'notice',
 				'data'	=>	$notice_data
 				),
 			array(
 				'name'	=>	'debug',
 				'data'	=>	$debug_data
 				)
 			);

 		return $return;	
 	}

 	/**
	 * Update application name in logger database
	 *
	 * @return	boolean
	 */
 	public function updateappname() {
 		try 
 		{
			// select mongoDB collection
 			$app_collection = $this->mongo_db->db->logger;
			// preparing data
 			$prepare_data 	= array(
 				'$set' => array(
 					'log_appname' => $this->log_appname
 					)
 				);
			// update to database
 			$app_collection->update(array(
 				'log_appid' => $this->log_appid
 				),$prepare_data, array(
 				'multiple' 	=> true
 				)
 			);
 			return true;
 		} 
 		catch (Exception $e) 
 		{
 			return false;
 		}
 	}

 	/**
	 * Update function name in logger database
	 *
	 * @return	boolean
	 */
 	public function updatefuncname() {
 		try 
 		{
			// select mongoDB collection
 			$func_collection 	= 	$this->mongo_db->db->logger;
			// preparing data
 			$prepare_data 		= 	array(
 				'$set' => array(
 					'log_funcname' => $this->log_funcname
 					)
 				);
			// update to database
 			$func_collection->update(array(
 				'log_funcid'=> $this->log_funcid
 				),$prepare_data, array(
 				'multiple' 	=> true
 				)
 			);
 			return true;
 		} 
 		catch (Exception $e) 
 		{
 			return false;
 		}
 	}

 	/**
	 * Delete data by application in logger database
	 *
	 * @return	boolean
	 */
 	public function dellogbyapp() {
 		try 
 		{
 			// select mongoDB collection
 			$app_collection 	= 	$this->mongo_db->db->logger;
			// preparing data
 			$prepare_data 		= 	array(
 				'log_appid' => $this->log_appid
 				);
			// delete to database
 			$app_collection->remove($prepare_data);
 			return true;
 		} 
 		catch (Exception $e) 
 		{
 			return false;
 		}
 	}

 	/**
	 * Delete data by functions in logger database
	 *
	 * @return	boolean
	 */
 	public function dellogbyfunc() {
 		try 
 		{
 			// select mongoDB collection
 			$func_collection 	= 	$this->mongo_db->db->logger;
			// preparing data
 			$prepare_data 		= 	array(
 				'log_funcid' => $this->log_funcid
 				);
			// delete to database
 			$func_collection->remove($prepare_data);
 			return true;
 		} 
 		catch (Exception $e) 
 		{
 			return false;
 		}
 	}

 }
