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
 * Application Manage Model
 *
 * The Database Model for Application Manage
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

class Application_model extends CI_Model {

	/**
	 * _id in MongoDB Primary Key
	 *
	 * @var	string
	*/
	private $_id;

	/**
	 * Application name in database
	 *
	 * @var	string
	*/
	private $application_name;

	/**
	 * Application token in database
	 *
	 * @var	string
	*/
	private $application_token;

	/**
	 * Application language in database
	 *
	 * @var	string
	*/
	private $application_lang;

	/**
	 * Application agent status in database
	 *
	 * @var	string
	*/
	private $application_agent;

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
	 * Set Application token to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApplicationToken($app_token) 
	{
		$this->application_token = $app_token;
	}

	/**
	 * Set Application language to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApplicationLang($app_lang) 
	{
		$this->application_lang = $app_lang;
	}


	/**
	 * Set Application agent status to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApplicationAgent($app_agent) 
	{
		$this->application_agent = $app_agent;
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
	 * Get Application token from variable
	 *
	 * @return	string
	 */
	public function getApplicationToken() 
	{
		return $this->application_token;
	}

	/**
	 * Get Application language from variable
	 *
	 * @return	string
	 */
	public function getApplicationLang() 
	{
		return $this->application_lang;
	}

	/**
	 * Get Application agent status from variable
	 *
	 * @return	string
	 */
	public function getApplicationAgent() 
	{
		return $this->application_agent;
	}

	/**
	 * Add application data to database
	 *
	 * @return	boolean
	 */
	public function add() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->app;
			// preparing data
			$prepare_data 	= array(
				'application_name' 		=> $this->application_name, 
				'application_token' 	=> $this->application_token, 
				'application_lang' 		=> $this->application_lang, 
				'application_agent' 	=> $this->application_agent
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
	 * List application data from database
	 *
	 * @return	array
	 */
	public function get() 
	{
		// announce return variable
		$return = array();
		try 
		{
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->app;
			// find data from collection
			$getdata 		= $app_collection->find();
			while($getdata->hasNext()) 
			{
				// Get data from collection
				$getdata2 = $getdata->getNext();
				// Set data from collection to globol variable
				$return[] = array(
					'_id' 				=> (string)$getdata2['_id'], 
					'application_name' 	=> $getdata2['application_name'], 
					'application_token' => $getdata2['application_token'], 
					'application_lang' 	=> $getdata2['application_lang'], 
					'application_agent' => $getdata2['application_agent']);
			}	
			return $return;	
		} 
		catch (Exception $e) 
		{
			return $return;
		}
	}

	/**
	 * delete application from database
	 *
	 * @return	boolean
	 */
	public function delete() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection 	= $this->mongo_db->db->app;
			$func_collection 	= $this->mongo_db->db->func;
			// preparing data
			$prepare_data 		= array(
				'_id' => new MongoId($this->_id)
				);
			if ($func_collection->count(array('application_id' => $this->_id)) == 0) 
			{
				// remove to database
				$app_collection->remove($prepare_data);
				return true;
			}
			else 
			{
				return false;
			}		
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}

	/**
	 * getdetail application from database
	 *
	 * @return	boolean
	 */
	public function getdetail() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection 	= $this->mongo_db->db->app;
			// find data from collection
			$getdata 			= $app_collection->find(array(
				'_id' => new MongoId($this->_id)
				)
			);
			while($getdata->hasNext()) 
			{
				// Get data from collection
				$getdata2 					= $getdata->getNext();
				// set data from collection to variable
				$this->application_name 	= $getdata2['application_name'];
				$this->application_lang 	= $getdata2['application_lang'];
				$this->application_token 	= $getdata2['application_token'];
				$this->application_agent 	= $getdata2['application_agent'];
			}
			return true;
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}

	/**
	 * update application data from database
	 *
	 * @return	boolean
	 */
	public function update() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection 	= $this->mongo_db->db->app;
			// preparing data
			$prepare_data 		= array(
				'application_name' 	=> $this->application_name, 
				'application_lang' 	=> $this->application_lang, 
				'application_token' => $this->application_token, 
				'application_agent' => $this->application_agent
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
	 * update agent controller for application from database
	 *
	 * @return	boolean
	 */
	public function agent() {
		try {
			// select mongoDB collection
			$app_collection 		= $this->mongo_db->db->app;
			// get value in database
			$getdata 				= $app_collection->find(array('_id' => new MongoId($this->_id)));
			while($getdata->hasNext()) 
			{
				// Get data from collection
				$getdata2 				 = $getdata->getNext();
				// set data from collection to variable
				$this->application_agent = $getdata2['application_agent'];
			}
			// preparing data
			if ($this->application_agent == 'enable') 
			{
				$prepare_data 				= array(
					'$set' => array(
						'application_agent' => 'disable'
						)
					);
				$this->application_agent 	= 'disable';
			} 
			else 
			{
				$prepare_data 				= array(
					'$set' => array(
						'application_agent' => 'enable'
						)
					);
				$this->application_agent 	= 'enable';
			}
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
	 * count application from database
	 *
	 * @return	Integer
	 */
	public function countapp() 
	{
		try 
		{
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->app;
			// return counter
			return $app_collection->count();
		} 
		catch (Exception $e) 
		{
			return 0;
		}
	}

}

/* End of file Application_model.php */
/* Location: ./application/models/Application_model.php */