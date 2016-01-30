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
 * Function Manage Model
 *
 * The Database Model for Function Manage
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

class Function_model extends CI_Model {
	/**
	 * _id in MongoDB Primary Key
	 *
	 * @var	string
	*/
	private $_id;

	/**
	 * Function name in database
	 *
	 * @var	string
	*/
	private $function_name;

	/**
	 * Function token in database
	 *
	 * @var	string
	*/
	private $function_token;

	/**
	 * Application name in database
	 *
	 * @var	string
	*/
	private $application_name;

	/**
	 * Application id in database
	 *
	 * @var	string
	*/
	private $application_id;

	/**
	 * Function is primary in database
	 *
	 * @var	boolean
	*/
	private $function_primary;

	/**
	 * Constructor - Load MongoDB Library
	 *
	 * The constructor is load a MongoDB Library for use.
	 *
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('mongo_db');
	}

	/**
	 * Set MongDB ID to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setID($_id) 
	{
		$this->_id = $_id;
	}

	/**
	 * Set Application name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApplicationName($app_name) 
	{
		$this->application_name = $app_name;
	}

	/**
	 * Set Application ID to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApplicationID($app_id) 
	{
		$this->application_id = $app_id;
	}

	/**
	 * Set Function Name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setFunctionName($func_name) 
	{
		$this->function_name = $func_name;
	}


	/**
	 * Set Function token to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setFunctionToken($func_token) 
	{
		$this->function_token = $func_token;
	}

	/**
	 * Set Function is primary to variable
	 *
	 * @param 	boolean
	 * @return	void
	 */
	public function setFunctionPrimary($func_primary) 
	{
		$this->function_primary = $func_primary;
	}

	/**
	 * Get MongDB ID from variable
	 *
	 * @return	string
	 */
	public function getID() 
	{
		return $this->_id;
	}

	/**
	 * Get Application name from variable
	 *
	 * @return	string
	 */
	public function getApplicationName() 
	{
		return $this->application_name;
	}

	/**
	 * Get Application ID from variable
	 *
	 * @return	string
	 */
	public function getApplicationID() 
	{
		return $this->application_id;
	}

	/**
	 * Get Function Name from variable
	 *
	 * @return	string
	 */
	public function getFunctionName() 
	{
		return $this->function_name;
	}

	/**
	 * Get Function Token from variable
	 *
	 * @return	string
	 */
	public function getFunctionToken() 
	{
		return $this->function_token;
	}

	/**
	 * Get Function is primary from variable
	 *
	 * @return	boolean
	 */
	public function getFunctionPrimary() 
	{
		return $this->function_primary;
	}

	/**
	 * List function data from database
	 *
	 * @return	array
	 */
	public function get() 
	{
		// announce return variable
		$return 	= 	array();
		try 
		{
			// select mongoDB collection
			$app_collection 	= 	$this->mongo_db->db->func;
			// find data from collection
			$getdata 			= 	$app_collection->find();
			while($getdata->hasNext()) 
			{
				// Get data from collection
				$getdata2 	= 	$getdata->getNext();
				// Set data from collection to globol variable
				$return[] 	= 	array(
					'_id' 				=> (string)$getdata2['_id'], 
					'function_name' 	=> $getdata2['function_name'], 
					'function_token' 	=> $getdata2['function_token'], 
					'application_id' 	=> $getdata2['application_id'], 
					'application_name' 	=> $getdata2['application_name'], 
					'function_primary' 	=> $getdata2['function_primary']
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
	 * Add function data to database
	 *
	 * @return	boolean
	 */
	public function add() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection = 	$this->mongo_db->db->func;
			// preparing data
			$prepare_data 	= 	array(
				'function_name' 	=> $this->function_name, 
				'function_token' 	=> $this->function_token, 
				'function_token' 	=> $this->function_token, 
				'application_id' 	=> $this->application_id, 
				'application_name' 	=> $this->application_name, 
				'function_primary' 	=> $this->function_primary
				);
			// insert to database
			$app_collection->insert($prepare_data);
			return true;
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}

	/**
	 * delete function from database
	 *
	 * @return	boolean
	 */
	public function delete() 
	{
		try 
		{
			// select mongoDB collection
			$func_collection 	= 	$this->mongo_db->db->func;
			// preparing data
			$prepare_data 		= 	array(
				'_id' 	=> 	new MongoId($this->_id)
				);
			// remove to database
			$func_collection->remove($prepare_data);
			return true;		
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}

	/**
	 * update application name in function data from database
	 *
	 * @return	boolean
	 */
	public function updateappname() 
	{
		try 
		{
			// select mongoDB collection
			$func_collection 	= 	$this->mongo_db->db->func;
			// preparing data
			$prepare_data 		= 	array(
				'$set' 	=> array(
					'application_name' => $this->application_name
					)
				);
			// update to database
			$func_collection->update(array(
				'application_id' => $this->application_id
				),$prepare_data);
			return true;
		}
		catch (Exception $e) 
		{
			return false;
		}
	}

	/**
	 * update function data from database
	 *
	 * @return	boolean
	 */
	public function update() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->func;
			// preparing data
			$prepare_data 	= array(
				'function_name' 	=> $this->function_name, 
				'function_token' 	=> $this->function_token, 
				'function_token' 	=> $this->function_token, 
				'application_id' 	=> $this->application_id, 
				'application_name' 	=> $this->application_name, 
				'function_primary' 	=> $this->function_primary
				);
			// update to database
			$app_collection->update(array(
				'_id' => new MongoId($this->_id)
				),$prepare_data);
			return true;			
		}
		catch (Exception $e) 
		{
			return false;
		}
	}

	/**
	 * getdetail function from database
	 *
	 * @return	boolean
	 */
	public function getdetail() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection = 	$this->mongo_db->db->func;
			// find data from collection
			$getdata 		= 	$app_collection->find(array(
				'_id' => new MongoId($this->_id)
				)
			);
			while($getdata->hasNext()) 
			{
				// Get data from collection
				$getdata2 				= $getdata->getNext();
				// set data from collection to variable
				$this->function_name 	= $getdata2['function_name'];
				$this->function_token 	= $getdata2['function_token'];
				$this->application_name = $getdata2['application_name'];
				$this->application_id 	= $getdata2['application_id'];
				$this->function_primary = $getdata2['function_primary'];
			}
			return true;
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}

	/**
	 * count function from database
	 *
	 * @return	Integer
	 */
	public function countfunction() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->func;
			// return counter
			return $app_collection->count();
		} 
		catch (Exception $e) 
		{
			return 0;
		}
	}

	/**
	 * ratio application function in database
	 *
	 * @return	array
	 */
	public function countfuncinapp() 
	{
		// announce return variable
		$return = array();
		try 
		{
			// select mongoDB collection
			$func_collection 	= 	$this->mongo_db->db->func;
			$app_collection 	= 	$this->mongo_db->db->app;

			$getdata 			= 	$app_collection->find();
			while($getdata->hasNext()) 
			{
				// Get data from collection
				$getdata2 	= 	$getdata->getNext();
				$countdata 	= 	$func_collection->count(array(
					'application_id' => (string)$getdata2['_id']
					)
				);
				$return[] 	= 	array(
					'title' => $getdata2['application_name'], 
					'total' => $countdata
					);
			}
			return $return;
		} 
		catch (Exception $e) 
		{
			return $return;
		}	
	}
}