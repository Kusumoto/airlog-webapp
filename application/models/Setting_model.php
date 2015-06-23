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
 * Setting  Model
 *
 * The Database Model for Setting option
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

class Setting_model extends CI_Model {

	/**
	 * _id in MongoDB Primary Key
	 *
	 * @var	string
	*/
	private $_id;

	/**
	 * Variable in Setting
	 *
	 * @var	string
	*/
	private $variable;

	/**
	 * Value in Setting
	 *
	 * @var	string
	*/
	private $value;


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
	public function setID($_id) {
		$this->_id = $_id;
	}

	/**
	 * Set Variable setting to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setVariable($variable) {
		$this->variable = $variable;
	}

	/**
	 * Set Value setting to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * Get MongoDB ID
	 *
	 * @return	string
	 */
	public function getID() {
		return $this->_id;
	}

	/**
	 * Get Variable setting
	 *
	 * @return	string
	 */
	public function getVariable() {
		return $this->variable;
	}

	/**
	 * Get Value setting
	 *
	 * @return	string
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Get value from variable to your need in collection
	 *
	 * @return	boolean
	 */
	public function getData() {
		try {
			$setting_collection = $this->mongo_db->db->setting;
			$getdata = $setting_collection->find(array("variable" => $this->variable));
			while($getdata->hasNext()) {
				// Get data from collection
				$getdata2 = $getdata->getNext();
				// set data from collection to variable
				$this->value = $getdata2['value'];
			}
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}