<?php 
/* 
 *  =======================================
 *  Basic MongoDB Library for CodeIgniter 
 *  Author     : Weerayut Hongsa
 *  License    : Protected 
 *  Email      : Kusumoto.com@gmail.com
 *  ======================================= 
 */  

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MongoDB Library for CodeIgniter
 *
 * Library for CodeIgniter perform to connect the MongoDB
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Library
 * @author		Weerayut Hongsa
 */

class Mongo_db extends MongoClient
{
	/**
	 * MongoDB Database Connection
	 *
	 * @var	Connection
	*/

	var $db;

	/**
	 * Constructor - Load MongoDB Library and Configuration
	 *
	 * The constructor is load a MongoDB Library for use.
	 *
	 * @return	void
	 */

	public function __construct()
	{   
        // Fetch CodeIgniter instance
		$ci = get_instance();
        // Load Mongo configuration file
		$ci->load->config('mongo');

        // Fetch Mongo server and database configuration
		$server 	= 	$ci->config->item('mongo_server');
		$port 		= 	$ci->config->item('mongo_port');
		$username 	= 	$ci->config->item('mongo_username');
		$password 	= 	$ci->config->item('mongo_password');
		$dbname 	= 	$ci->config->item('mongo_dbname');

		// Initialise Mongo
		if (empty($username) || empty($password))
		{
			parent::__construct($server.':'.$port);
			$this->db = $this->$dbname;
		}
		else
		{
        	// Initialise Mongo - Authentication required
			try
			{
				parent::__construct("mongodb://$username:$password@$server:$port/$dbname");
				$this->db = $this->$dbname;
			}
			catch(MongoConnectionException $e) 
			{
            //Don't show Mongo Exceptions as they can contain authentication info
				$_error =& load_class('Exceptions', 'core');
				exit($_error->show_error('MongoDB Connection Error', 'A MongoDB error occured while trying to connect to the database!', 'error_db'));           
			}
			catch(Exception $e) 
			{
				$_error =& load_class('Exceptions', 'core');
				exit($_error->show_error('MongoDB Error',$e->getMessage(), 'error_db'));           
			}
		}	
	}
}

