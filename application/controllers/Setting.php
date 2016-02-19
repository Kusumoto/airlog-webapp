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
 * Setting Management Controller
 *
 * The Setting Management Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */


class Setting extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// Load Essential Library
 		$this->load->library('session');
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->helper('sec_samf');
		// Check System not install
 		if (!file_exists(FCPATH.'install.lock')) 
 		{
 			redirect('/installation','refresh');
 		}
		// Security Checker
 		sec_samf();
 		// check user logged in to system
 		if (!$this->session->userdata('isLogin')) 
 		{
 			redirect('/authenticate/login','refresh');
 		} 
	}

	public function index()
	{
		// load api menage view
 		$this->load->view('template/header_common',array('setTitle' => 'API Management'));
 		$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
 		$this->load->view('template/menu',array("setActiveMenu" => 7,"Firstname" => $this->session->userdata('Firstname')));
 		$this->load->view('app_setting');
 		$this->load->view('template/footer');
	}

	public function change_language($type)
	{
		$this->session->set_userdata("lang".$type);
		var_dump($this->session->userdata('lang'));
		redirect('','refresh')
	}

}

 ?>