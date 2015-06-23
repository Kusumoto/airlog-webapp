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
 * API Manage Model
 *
 * The Database Model for API Manage
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

class API_model extends CI_Model {

	/**
	 * _id in MongoDB Primary Key
	 *
	 * @var	string
	*/
	private $_id;

	/**
	 * API key
	 *
	 * @var	string
	*/
	private $api_key;

	/**
	 * API name
	 *
	 * @var	string
	*/
	private $api_name;

	/**
	 * API key status
	 *
	 * @var	string
	*/
	private $api_isenable;

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
	 * Set API Name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApiName($api_name)
	{
		$this->api_name = $api_name;
	}

	/**
	 * Set API Key to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApiKey($api_key)
	{
		$this->api_key = $api_key;
	}

	/**
	 * Set API Application Status to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApiIsEnable($api_isenable)
	{
		if ($api_isenable == "true")
			$this->api_isenable = true;
		else
			$this->api_isenable = false;
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
	 * Get API Name from variable
	 *
	 * @return	string
	 */
	public function getApiName()
	{
		return $this->api_name;
	}

	/**
	 * Get API Key from variable
	 *
	 * @return	string
	 */
	public function getApiKey()
	{
		return $this->api_key;
	}

	/**
	 * Get API Application Status from variable
	 *
	 * @return	string
	 */
	public function getApiIsEnable()
	{
		if ($this->api_isenable == true)
		 return "true";
		else
		 return "false";
	}

	/**
	 * List API key from database
	 *
	 * @return	array
	 */
	public function get() 
	{
		// announce return variable
		$return = array();
		try {
			// select mongoDB collection
			$api_collection = $this->mongo_db->db->api;
			// find data from collection
			$getdata = $api_collection->find();
			while($getdata->hasNext()) {
				// Get data from collection
				$getdata2 = $getdata->getNext();
				// Set data from collection to globol variable
				$return[] = array("_id" => (string)$getdata2['_id'], "api_key" => $getdata2['api_key'], "api_name" => $getdata2['api_name'], "api_isenable" => $getdata2['api_isenable']);
			}	
			return $return;	
		} catch (Exception $e) {
			return $return;
		}
	}

	/**
	 * Check API key from get the match in the database.
	 *
	 * @return	boolean
	 */
	public function check()
	{
		// Set Agrument send to MongoDB
		$apidata = array('api_key' => $this->api_key);
		try {
			// Select MongoDB collection
			$user = $this->mongo_db->db->api;
			
			// Find data in collection
			if ($user->count($apidata) >= 1) {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Save new API key to database
	 *
	 * @return	boolean
	 */
	public function add()
	{
		try {
			$api = $this->mongo_db->db->selectCollection('api');
			$api->insert(array(
				'api_key' => $this->api_key,
				'api_name' => $this->api_name,
				'api_isenable' => $this->api_isenable
				));
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Update data API key in database
	 *
	 * @return	boolean
	 */
	public function update()
	{
		try {
			// select mongoDB collection
			$api_collection = $this->mongo_db->db->api;
			// preparing data
			$prepare_data = array('api_key' => $this->api_key,
				'api_name' => $this->api_name,
				'api_isenable' => $this->api_isenable);
			// update to database
			$api_collection->update(array('_id' => new MongoId($this->_id)),$prepare_data);
			return true;			
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * get API key detail in database
	 *
	 * @return	boolean
	 */
	public function getdetail()
	{
		try {
			// select mongoDB collection
			$api_collection = $this->mongo_db->db->api;
			// find data from collection
			$getdata = $api_collection->find(array('_id' => new MongoId($this->_id)));
			while($getdata->hasNext()) {
				// Get data from collection
				$getdata2 = $getdata->getNext();
				// set data from collection to variable
				$this->api_key = $getdata2['api_key'];
				$this->api_name = $getdata2['api_name'];
				$this->api_isenable = $getdata2['api_isenable'];
			}
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * delete API key from database
	 *
	 * @return	boolean
	 */
	public function delete()
	{
		try {
			// select mongoDB collection
			$api_collection = $this->mongo_db->db->api;
			// preparing data
			$prepare_data = array("_id" => new MongoId($this->_id));
			if ($api_collection->count() >= 1) {
				// remove to database
				$api_collection->remove($prepare_data);
				return true;
			} else {
				return false;
			}		
		} catch (Exception $e) {
			return false;
		}
	}
	/**
	 * Check API Key has been enable or disable
	 *
	 * @return	boolean
	 */
	public function checkEnable()
	{
		// Set Agrument send to MongoDB
		$apidata = array('api_key' => $this->api_key, 'api_isenable' => true);
		try {
			// Select MongoDB collection
			$user = $this->mongo_db->db->api;
			
			// Find data in collection
			if ($user->count($apidata) >= 1) {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

}