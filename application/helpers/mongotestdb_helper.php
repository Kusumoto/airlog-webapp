<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* MongoDB Test Connection Helper
*
* @author Weerayut Hongsa <kusumoto.com@gmail.com>
* @copyright Copyright (c) 2014, Weerayut Hongsa, http://kusumotolab.com
* @version 1.0.0
*/

if ( ! function_exists('mongotestdb'))
{
	function mongotestdb($server = 'localhost',$username = '',$password = '',$port = 27017, $dbname = 'SAMF')
	{
		try {
			if (empty($username) || empty($password)) {
				@$mongo = new MongoClient("mongodb://$server:$port/$dbname");
				$mongo->close();
			} else {
				@$mongo = new MongoClient("mongodb://$username:$password@$server:$port/$dbname");
				$mongo->close();
			}		
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}