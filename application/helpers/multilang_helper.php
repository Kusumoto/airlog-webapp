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
 * Multi language helper
 *
 * The Multi language Helper for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Helper
 * @author		SAMF Dev Team
 */
 	/**
 	  * Create label fucntion for
 	 */
	function label($lable)
	{
		// Call instance of codeigniter
		$ci =& get_instance();
		// Set the lalel
		$rs = $ci->lang->line($label);
		// Check language have data 
		if($rs) {
			return $rs;
		} else {
		// No data return label
			return $label;
		}
	}

 ?>