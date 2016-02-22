<?php
 /* 
 * @package	Software Analysis and Maintenance Framework
 * @author	SAMF Dev Team
 * @copyright	Copyright (c) 2015, SAMF Dev Team
 * @license	http://opensource.org/licenses/Apache-2.0
 * @since	Version 1.0.0
 *
 */

 defined('BASEPATH') OR exit('No direct script access allowed');

 /**
 * Language Model
 *
 * The Database Model for Language System
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

 class Language_model extends CI_Model {

	/**
	 * Language Name in database
	 *
	 * @var	string
	*/
	private $lang_name;

	/**
	 * Language Prefix in database
	 *
	 * @var	string
	*/
	private $lang_prefix;

	/**
	 * Set Language Name to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setLangName($lang_name)
	{
		$this->lang_name = $lang_name;
	}

	/**
	 * Get Language Name
	 *
	 * @return	string
	 */
	public function getLangName()
	{
		return $this->lang_name;
	}

	/**
	 * Set Language Prefix to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setLangPrefix($lang_prefix)
	{
		$this->lang_prefix = $lang_prefix;
	}

	/**
	 * Get Language Prefix
	 *
	 * @return	string
	 */
	public function getLangPrefix()
	{
		return $this->lang_prefix;
	}

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
	 * List Language data from database
	 *
	 * @return	array
	 */
	public function get()
	{
		// intalizing variable
		$data = array();
		$return = array();
		try 
		{
			// select mongoDB collection
			$lang_collention = $this->mongo_db->db->langs;
			// find data from collection
			$getdata = $lang_collention->find();
			while ($getdata->hasNext()) 
			{
				// Get data from collection
				$data = $getdata->getNext();
				// Set data from collection to globol variable
				$return[] = array(
					'_id' 			=> (string)$data['_id'], 
					'lang_prefix' 	=> $data['lang_prefix'], 
					'lang_name' 	=> $data['lang_name']
					);
			}
			return $return;
		} 
		catch (Exception $e)
		{
			return false;
		}
	}
	
	/**
	 * Add Language data to database
	 *
	 * @return	boolean
	 */
	public function add()
	{
		try 
		{
			// select mongoDB collection
			$lang_collention = $this->mongo_db->db->langs;
			// preparing data
			$prepare_data 	= array(
				'lang_prefix' 	=> $this->lang_prefix, 
				'lang_name' 	=> $this->lang_name
				);
			// insert to database
			$lang_collention->insert($prepare_data);
			return true;
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
			$lang_collection 	= $this->mongo_db->db->langs;
			// find data from collection
			$getdata 			= $lang_collection->find(array(
				'_id' => new MongoId($this->_id)
				)
			);
			while($getdata->hasNext()) 
			{
				// Get data from collection
				$getdata2 			= $getdata->getNext();
				// set data from collection to variable
				$this->lang_prefix 	= $getdata2['lang_prefix'];
				$this->lang_name 	= $getdata2['lang_name'];
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
			$app_collection 	= $this->mongo_db->db->langs;
			// preparing data
			$prepare_data 		= array(
				'lang_prefix' 	=> $this->lang_prefix, 
				'lang_name' 	=> $this->lang_name
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
	 * delete application from database
	 *
	 * @return	boolean
	 */
	public function delete() 
	{
		try 
		{
			// select mongoDB collection
			$lang_collection 	= $this->mongo_db->db->langs;
			// preparing data
			$prepare_data 		= array(
				'_id' => new MongoId($this->_id)
				);
			
				// remove to database
			$app_collection->remove($prepare_data);
			return true;	
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}


}

/* End of file language_model.php */
/* Location: ./application/models/language_model.php */