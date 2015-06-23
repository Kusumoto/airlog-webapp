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
 * Installation Model
 *
 * The Database Model for Installation Wizard
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Model
 * @author		SAMF Dev Team
 */

class Installation_model extends CI_Model {

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
	 * API Url in database
	 *
	 * @var	string
	*/
	private $apiurl;

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
	 * Set API URL to variable
	 *
	 * @param 	string
	 * @return	void
	 */
	public function setApiUrl($apiurl) {
		$this->apiurl = $apiurl;
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
	 * Get Email from variable
	 *
	 * @return	string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Get API URL from variable
	 *
	 * @return	string
	 */
	public function getApiUrl() {
		return $this->$this->apiurl;
	}

	/**
	 * Create a new colloection in MongoDB
	 *
	 * @return	void
	 */
	public function createNewCollection()
	{
		try {
			$this->mongo_db->db->createCollection('users');
			$this->mongo_db->db->createCollection('logger');
			$this->mongo_db->db->createCollection('used');
			$this->mongo_db->db->createCollection('app');
			$this->mongo_db->db->createCollection('func');
			$this->mongo_db->db->createCollection('setting');
			$this->mongo_db->db->createCollection('api');
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Remove older SAMF colloection in MongoDB
	 *
	 * @return	void
	 */
	public function removeCollection()
	{
		try {
			$this->mongo_db->db->users->drop();
			$this->mongo_db->db->logger->drop();
			$this->mongo_db->db->used->drop();
			$this->mongo_db->db->app->drop();
			$this->mongo_db->db->func->drop();
			$this->mongo_db->db->setting->drop();
			$this->mongo_db->db->api->drop();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Create a first user in MongoDB for SAMF
	 *
	 * @return	void
	 */
	public function createDefaultUser()
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

	/**
	 * Set a API URL in MongoDB for SAMF
	 *
	 * @return	void
	 */
	public function createConfigApiUrl()
	{
		try {
			$user = $this->mongo_db->db->selectCollection('setting');
			$user->insert(array(
				'variable' => 'apiurl',
				'value' => $this->apiurl,
				));
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}

/* End of file  */
/* Location: ./application/models/ */