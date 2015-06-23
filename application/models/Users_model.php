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
 * Users Model
 *
 * The Database Model for User Control
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

 class Users_model extends CI_Model {

 	/**
	 * _id in MongoDB Primary Key
	 *
	 * @var	string
	*/
	private $_id;

	/**
	 * Username in database
	 *
	 * @var	string
	*/
	private $username;

	/**
	 * Password in database
	 *
	 * @var	string
	*/
	private $password;

	/**
	 * Email in database
	 *
	 * @var	string
	*/
	private $email;
	/**
	 * Firstname in database
	 *
	 * @var	string
	*/
	private $firstname;

	/**
	 * Lastname in database
	 *
	 * @var	string
	*/
	private $lastname;


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
	 * Set Username to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * Set Password to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * Set Email to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Set Firstname to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Set Lastname to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Get MongDB ID from variable
	 *
	 * @return	string
	 */
	public function getID() {
		return $this->_id;
	}

	/**
	 * Get Username from variable
	 *
	 * @return	string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Get Password from variable
	 *
	 * @return	string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Get Email from variable
	 *
	 * @return	string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Get Firstname from variable
	 *
	 * @return	string
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Get Lastname from variable
	 *
	 * @return	string
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Check Username and Password in collection
	 *
	 * @return	boolean
	 */
	public function checkLogin()
	{
		// Set Agrument send to MongoDB
		$userdata = array('username' => $this->username,'password' => md5($this->password));
		try {
			// Select MongoDB collection
			$user = $this->mongo_db->db->users;
			
			// Find data in collection
			if ($user->count($userdata) >= 1) {
				$getdata = $user->find($userdata)->limit(1);
				while($getdata->hasNext() ) {
					// Get data from collection
					$getdata2 = $getdata->getNext();
					// Set data from collection to globol variable
					$this->username = $getdata2['username'];
					$this->firstname = $getdata2['firstname'];
					$this->lastname = $getdata2['lastname'];
					return true;
				}		
			} else {
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * add user and data to collection
	 *
	 * @return	boolean
	 */
	public function add()
	{
		try {
			$user = $this->mongo_db->db->selectCollection('users');
			$user->insert(array(
				'username' => $this->username,
				'password' => $this->password,
				'firstname' => $this->firstname,
				'lastname' => $this->lastname,
				'email' => $this->email,
				));
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function get()
	{	
		// announce return variable
		$return = array();
		try {
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->users;
			// find data from collection
			$getdata = $app_collection->find();
			while($getdata->hasNext()) {
				// Get data from collection
				$getdata2 = $getdata->getNext();
				// Set data from collection to globol variable
				$return[] = array("_id" => (string)$getdata2['_id'], "username" => $getdata2['username'], "email" => $getdata2['email'], "firstname" => $getdata2['firstname'], "lastname" => $getdata2['lastname']);
			}	
			return $return;	
		} catch (Exception $e) {
			return $return;
		}
	}

	/**
	 * check user in collection
	 *
	 * @return	boolean
	 */
	public function checkdup()
	{
		try {
			$user = $this->mongo_db->db->selectCollection('users');
			if ($user->count(array("username" => $this->username)))
				return true;
			else
				return false;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * get user detail in collection
	 *
	 * @return	boolean
	 */
	public function getdetail()
	{
		try {
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->users;
			// find data from collection
			$getdata = $app_collection->find(array('_id' => new MongoId($this->_id)));
			while($getdata->hasNext()) {
				// Get data from collection
				$getdata2 = $getdata->getNext();
				// set data from collection to variable
				$this->username = $getdata2['username'];
				$this->password = $getdata2['password'];
				$this->firstname = $getdata2['firstname'];
				$this->lastname = $getdata2['lastname'];
				$this->email = $getdata2['email'];
			}
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * update user detail to collection
	 *
	 * @return	boolean
	 */
	public function update()
	{
		try {
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->users;
			// preparing data
			$prepare_data = array('username' => $this->username,
				'password' => $this->password,
				'firstname' => $this->firstname,
				'lastname' => $this->lastname,
				'email' => $this->email);
			// update to database
			$app_collection->update(array('_id' => new MongoId($this->_id)),$prepare_data);
			return true;			
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * delete user detail to collection
	 *
	 * @return	boolean
	 */
	public function delete()
	{
		try {
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->users;
			// preparing data
			$prepare_data = array("_id" => new MongoId($this->_id));
			if ($app_collection->count() != 1) {
				// remove to database
				$app_collection->remove($prepare_data);
				return true;
			} else {
				return false;
			}		
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * count user in collection
	 *
	 * @return	Integer
	 */
	public function countuser()
	{
		try {
			// select mongoDB collection
			$app_collection = $this->mongo_db->db->users;
			// return counter
			return $app_collection->count();	
		} catch (Exception $e) {
			return 0;
		}
	}
}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */