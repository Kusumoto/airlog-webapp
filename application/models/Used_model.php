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
 * Used Manage Model
 *
 * The Database Model for Used Statical Manage
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

class Used_model extends CI_Model {

	/**
	 * _id in database
	 *
	 * @var	string
	*/
	private $_id;

	/**
	 * Used Date in database
	 *
	 * @var	string
	*/
	private $use_date;

	/**
	 * Used Time in database
	 *
	 * @var	string
	*/
	private $use_time;

	/**
	 * Used Datetime in database
	 *
	 * @var	string
	*/
	private $use_datetime;

	/**
	 * Used IP Address in database
	 *
	 * @var	string
	*/
	private $use_ipaddr;

	/**
	 * Used Application ID in database
	 *
	 * @var	string
	*/
	private $use_appid;

	/**
	 * Used Application Name in database
	 *
	 * @var	string
	*/
	private $use_appname;

	/**
	 * Used Function ID in database
	 *
	 * @var	string
	*/
	private $use_funcid;

	/**
	 * Used Function Name in database
	 *
	 * @var	string
	*/
	private $use_funcname;

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
	 * Set Use log date to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseDate($use_date) 
 	{
 		$this->use_date = $use_date;
 	}

 	/**
	 * Set Use log time to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseTime($use_time) 
 	{
 		$this->use_time = $use_time;
 	}

 	/**
	 * Set Use log datetime to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseDateTime($use_datetime) 
 	{
 		$this->use_datetime = $use_datetime;
 	}

 	/**
	 * Set Use log ip address to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseIPAddress($use_ipaddr) 
 	{
 		$this->use_ipaddr = $use_ipaddr;
 	}

 	/**
	 * Set Use log application id to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseAppID($use_appid) 
 	{
 		$this->use_appid = $use_appid;
 	}

 	/**
	 * Set Use log application name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseAppName($use_appname) 
 	{
 		$this->use_appname = $use_appname;
 	}

 	/**
	 * Set Use log function id to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseFuncID($use_funcid) 
 	{
 		$this->use_funcid = $use_funcid;
 	}

 	/**
	 * Set Use log function name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
 	public function setUseFuncName($use_funcname) 
 	{
 		$this->use_funcname = $use_funcname;
 	}

 	/**
	 * Get Use log id from variable
	 *
	 * @return	string
	 */
 	public function getID() 
 	{
 		return $this->_id;
 	}

 	/**
	 * Get Use log date from variable
	 *
	 * @return	string
	 */
 	public function getUseDate() 
 	{
 		return $this->use_date;
 	}

 	/**
	 * Get Use log time from variable
	 *
	 * @return	string
	 */
 	public function getUseTime() 
 	{
 		return $this->use_time;
 	}

 	/**
	 * Get Use log datetime from variable
	 *
	 * @return	string
	 */
 	public function getUseDateTime() 
 	{
 		return $this->use_datetime;
 	}

 	/**
	 * Get Use log ip address from variable
	 *
	 * @return	string
	 */
 	public function getUseIPAddress() 
 	{
 		return $this->use_ipaddr;
 	}

 	/**
	 * Get Use log application id from variable
	 *
	 * @return	string
	 */
 	public function getUseAppID() 
 	{
 		return $this->use_appid;
 	}

 	/**
	 * Get Use log application name from variable
	 *
	 * @return	string
	 */
 	public function getUseAppName() 
 	{
 		return $this->use_appname;
 	}

 	/**
	 * Get Use log function id from variable
	 *
	 * @return	string
	 */
 	public function getUseFuncID() 
 	{
 		return $this->use_funcid;
 	}

 	/**
	 * Get Use log function name from variable
	 *
	 * @return	string
	 */
 	public function getUseFuncName() 
 	{
 		return $this->use_funcname;
 	}

 	/**
	 * Update application name in used database
	 *
	 * @return	boolean
	 */
 	public function updateappname() 
 	{
 		try 
 		{
			// select mongoDB collection
 			$app_collection 	= 	$this->mongo_db->db->used;
			// preparing data
 			$prepare_data 		= 	array(
 				'$set' 			=> 		array(
 					'use_appname' 	=> 	$this->use_appname
 					)
 				);
			// update to database
 			$app_collection->update(array(
 				'use_appid' 	=> 	$this->use_appid
 				),
 			$prepare_data, array(
 				'multiple' 		=> 	true
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
	 * Update function name in used database
	 *
	 * @return	boolean
	 */
 	public function updatefuncname() {
 		try {
			// select mongoDB collection
 			$func_collection = $this->mongo_db->db->used;
			// preparing data
 			$prepare_data 	 = array(
 				'$set' 		=> 		array(
 					'use_funcname' => $this->use_funcname
 					)
 				);
			// update to database
 			$func_collection->update(array(
 				'use_funcid' 	=> 	$this->use_funcid
 				),
 			$prepare_data, array(
 				'multiple' 	=> 	true
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
	 * count used day data from database to graph generate
	 *
	 * @return	array
	 */
 	public function graphdayused()
 	{
 		// announce return variable
 		$return 	= 	array();
 		$count 		=	array();
 		// select logger collection 
 		$use_data 	= 	$this->mongo_db->db->used;
 		// preparing query data
 		for($i = 0; $i <= 24; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^0'.$i.'/');
 				// build query data
 				$querydata 		= 	array(
 					'use_time' 	=> 	$regex_Date,
 					'use_date' 	=> 	$this->use_date, 
 					'use_appid' => $this->use_appid
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^'.$i.'/'); 
 				// build query data
 				$querydata 		= 	array(
 					'use_time' 	=> 	$regex_Date, 
 					'use_date' 	=> 	$this->use_date, 
 					'use_appid' => 	$this->use_appid
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			}
 		}

 		$return		=	array(
 			'name'		=>		'User',
 			'data'		=>		$count
 			);

 		return $return;	
 	}

 	/**
	 * count used month data from database to graph generate
	 *
	 * @return	array
	 */
 	public function graphmonthused()
 	{
 		// announce return variable
 		$return 	= 	array();
 		$count 		=	array();
 		// select logger collection 
 		$use_data 	= 	$this->mongo_db->db->used;
 		// preparing query data
 		$splitday 	= 	explode('-', $this->use_date);
 		// check day in month
 		$lastday 	= 	cal_days_in_month(CAL_GREGORIAN,$splitday[1],$splitday[0]);
 		for ($i = 1; $i <= $lastday; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// build query data
 				$querydata 	= 	array(
 					'use_date' 		=> 		$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'use_appid' 	=> 		$this->use_appid
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			} 
 			else 
 			{
 				// build query data
 				$querydata 		= 	array(
 					'use_date' 	=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'use_appid' => 	$this->use_appid
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			}
 		}

 		$return		=	array(
 			'lastday'	=>	$lastday,
 			'data'		=>	array(
				'name'		=>		'User',
 				'data'		=>		$count
 				)
 			);

 		return $return;	
 	}

 	/**
	 * count used year data from database to graph generate
	 *
	 * @return	array
	 */
 	public function graphyearused()
 	{
 		// announce return variable
 		$return 	= 	array();
 		$count 		=	array();
 		// select logger collection 
 		$use_data 	= 	$this->mongo_db->db->used;
 		// preparing query data
 		$splitday 	= 	explode('-', $this->use_date);
 		for ($i = 1; $i <= 12; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^'.$splitday[0].'-0'.$i.'/');
 				// build query data
 				$querydata 		= 	array(
 					'use_date' 	=> 	$regex_Date, 
 					'use_appid' => 	$this->use_appid
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^'.$splitday[0].'-'.$i.'/');
 				// build query data
 				$querydata 		= 	array(
 					'use_date' 	=> $regex_Date, 
 					'use_appid' => $this->use_appid
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			}
 		}
 		$return		=	array(
 			'name'		=>		'User',
 			'data'		=>		$count
 			);

 		return $return;	
 	}

 	/**
	 * count used day data from database to graph generate (function)
	 *
	 * @return	array
	 */
 	public function graphdayusedfunc()
 	{
 		// announce return variable
 		$return 	= 	array();
 		// select logger collection 
 		$use_data 	= 	$this->mongo_db->db->used;
 		// preparing query data
 		for($i = 0; $i <= 24; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^0'.$i.'/');
 				// build query data
 				$querydata 			= 	array(
 					'use_time' 		=> 	$regex_Date, 
 					'use_date' 		=> 	$this->use_date, 
 					'use_funcid' 	=>	$this->use_funcid
 					);
 				// count and insert data to array
 				$return[] 			= 	array(
 					'time' 	=> 	'0'.$i, 
 					'total' => 	$use_data->count($querydata)
 					);
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^'.$i.'/'); 
 				// build query data
 				$querydata		= 	array(
 					'use_time' 		=> 	$regex_Date, 
 					'use_date' 		=> 	$this->use_date, 
 					'use_funcid' 	=> 	$this->use_funcid);
 				// count and insert data to array
 				$return[] 		= 	array(
 					'time' 		=> 	$i, 
 					'total' 	=> 	$use_data->count($querydata)
 					);
 			}
 		}
 		return $return;	
 	}

 	/**
	 * count used month data from database to graph generate (function)
	 *
	 * @return	array
	 */
 	public function graphmonthusedfunc()
 	{
 		// announce return variable
 		$return 		= 	array();
 		// select logger collection 
 		$use_data 		= 	$this->mongo_db->db->used;
 		// preparing query data
 		$splitday 		= 	explode('-', $this->use_date);
 		// check day in month
 		$lastday 		= 	cal_days_in_month(CAL_GREGORIAN,$splitday[1],$splitday[0]);
 		for ($i = 1; $i <= $lastday; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// build query data
 				$querydata 	= 	array(
 					'use_date' 		=> 	$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'use_funcid' 	=> 	$this->use_funcid
 					);
 				// count and insert data to array
 				$return[] 	= 	array(
 					'date' 		=> 		$splitday[0].'-'.$splitday[1].'-0'.$i, 
 					'total' 	=> 		$use_data->count($querydata)
 					);
 			} 
 			else 
 			{
 				// build query data
 				$querydata 	= 	array(
 					'use_date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'use_funcid' 	=> 	$this->use_funcid
 					);
 				// count and insert data to array
 				$return[] 	= 	array(
 					'date' 		=> 	$splitday[0].'-'.$splitday[1].'-'.$i, 
 					'total' 	=> 	$use_data->count($querydata)
 					);
 			}
 		}
 		return $return;	
 	}

 	/**
	 * count used year data from database to graph generate (function)
	 *
	 * @return	array
	 */
 	public function graphyearusedfunc()
 	{
 		// announce return variable
 		$return 		= 	array();
 		// select logger collection 
 		$use_data 		= 	$this->mongo_db->db->used;
 		// preparing query data
 		$splitday 		= 	explode('-', $this->use_date);
 		for ($i = 1; $i <= 12; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^'.$splitday[0].'-0'.$i.'/');
 				// build query data
 				$querydata 		= 	array(
 					'use_date' 		=> 	$regex_Date, 
 					'use_funcid' 	=> 	$this->use_funcid
 					);
 				// count and insert data to array
 				$return[] 		= 	array(
 					'month' 	=> 	$splitday[0].'-0'.$i, 
 					'total' 	=> 	$use_data->count($querydata)
 					);
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^'.$splitday[0].'-'.$i.'/');
 				// build query data
 				$querydata	 	= 	array(
 					'use_date' 		=> 	$regex_Date, 
 					'use_funcid' 	=> 	$this->use_funcid
 					);
 				// count and insert data to array
 				$return[] 		= 	array(
 					'month' 	=> 	$splitday[0].'-'.$i, 
 					'total' 	=> 	$use_data->count($querydata)
 					);
 			}
 		}
 		return $return;	
 	}

 	/**
	 * count used day data from database to graph generate (for dashboard)
	 *
	 * @return	array
	 */
 	public function graphdayused_dashboard()
 	{
 		// announce return variable
 		$return 	= 	array();
 		$count 		=	array();
 		// select logger collection 
 		$use_data 	= 	$this->mongo_db->db->used;
 		// preparing query data
 		for($i = 0; $i <= 24; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^0'.$i.'/');
 				// build query data
 				$querydata 		= 	array(
 					'use_time' 	=> 	$regex_Date,
 					'use_date' 	=> 	$this->use_date
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date 	= 	new MongoRegex('/^'.$i.'/'); 
 				// build query data
 				$querydata 		= 	array(
 					'use_time' 	=> 	$regex_Date, 
 					'use_date' 	=> 	$this->use_date
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			}
 		}

 		$return		=	array(
 			'name'		=>		'User',
 			'data'		=>		$count
 			);

 		return $return;	
 	}

 	/**
	 * count used month data from database to graph generate (for dashboard)
	 *
	 * @return	array
	 */
 	public function graphmonthused_dashboard()
 	{
 		// announce return variable
 		$return 	= 	array();
 		$count 		=	array();
 		// select logger collection 
 		$use_data 	= 	$this->mongo_db->db->used;
 		// preparing query data
 		$splitday 	= 	explode('-', $this->use_date);
 		// check day in month
 		$lastday 	= 	cal_days_in_month(CAL_GREGORIAN,$splitday[1],$splitday[0]);
 		for ($i = 1; $i <= $lastday; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// build query data
 				$querydata 	= 	array(
 					'use_date' 	=> 	$splitday[0].'-'.$splitday[1].'-0'.$i
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			} 
 			else 
 			{
 				// build query data
 				$querydata 	= 	array(
 					'use_date' 	=> 	$splitday[0].'-'.$splitday[1].'-'.$i
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			}
 		}

 		$return		=	array(
 			'lastday'	=>	$lastday,
 			'data'		=>	array(
				'name'		=>		'User',
 				'data'		=>		$count
 				)
 			);

 		return $return;	
 	}

 	/**
	 * count used year data from database to graph generate (for dashboard)
	 *
	 * @return	array
	 */
 	public function graphyearused_dashboard()
 	{
 		// announce return variable
 		$return 	= 	array();
 		$count 		=	array();
 		// select logger collection 
 		$use_data 	= 	$this->mongo_db->db->used;
 		// preparing query data
 		$splitday 	= 	explode('-', $this->use_date);
 		for ($i = 1; $i <= 12; $i++) 
 		{
 			if (strlen($i) == 1) 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date = new MongoRegex('/^'.$splitday[0].'-0'.$i.'/');
 				// build query data
 				$querydata 	= 	array(
 					'use_date' 	=> $regex_Date
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			} 
 			else 
 			{
 				// use mongoRegex (while like in sql)
 				$regex_Date = new MongoRegex('/^'.$splitday[0].'-'.$i.'/');
 				// build query data
 				$querydata 	= 	array(
 					'use_date' 	=> 	$regex_Date
 					);
 				// count and insert data to array
 				array_push($count, $use_data->count($querydata));
 			}
 		}
 		
 		$return		=	array(
 			'name'		=>		'User',
 			'data'		=>		$count
 			);

 		return $return;	
 	}

 	/**
	 * Delete data by application in used database
	 *
	 * @return	boolean
	 */
 	public function dellogbyapp() {
 		try 
 		{
 			// select mongoDB collection
 			$app_collection = 	$this->mongo_db->db->used;
			// preparing data
 			$prepare_data 	= 	array(
 				'use_appid' 	=> 	$this->use_appid
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
	 * Delete data by functions in used database
	 *
	 * @return	boolean
	 */
 	public function dellogbyfunc() {
 		try {
 			// select mongoDB collection
 			$func_collection 	= 	$this->mongo_db->db->used;
			// preparing data
 			$prepare_data 		= 	array(
 				'use_funcid' 	=> 	$this->use_funcid
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