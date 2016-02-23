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
 		// Load language 
 		$lang = $this->session->userdata('lang')==null?"english":$this->session->userdata("lang");
 		$this->lang->load($lang,$lang);
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
		// load setting view
 		$this->load->view('template/header_common',array('setTitle' => 'Setting'));
 		$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
 		$this->load->view('template/menu',array("setActiveMenu" => 7,"Firstname" => $this->session->userdata('Firstname')));
 		$this->load->view('app_setting');
 		$this->load->view('template/footer');
	}

	public function getlanglist()
	{
		// announce return variable
 		$JSON 	= 	array();
		// Load language model
 		$this->load->model('language_model');
		// get data from model
 		$JSON 	= 	$this->language_model->get();
		// return REST
 		$this->load->view('json',
 			array(
 				'JSON' 			=> 		$JSON
 			)
 		);
	}

	public function getlangdetail()
	{
		// announce return variable
		$JSON 	= 	array();
		// get _id from post method
		$_id 	= 	$this->input->post('_id', true);
		if (!empty($_id)) {
			// Load language model
			$this->load->model('language_model');
			// Set variable in language model
			$this->language_model->setID($_id);
			// Get language data detail from database
			if ($this->language_model->getdetail())
				$JSON = array(
					'status' 			=> 		200, 
					'lang_id' 			=> 		$_id, 
					'lang_prefix' 		=> 		$this->language_model->getLangPrefix(), 
					'lang_name' 		=> 		$this->language_model->getLangName()
					);
			else
				$JSON = array(
					'status' 		=> 		403, 
					'message' 		=> 		'Error Database!');
		} 
		else 
		{
			show_error('Method not allowed', 403);
		}
		$this->load->view('json',array(
			'JSON' 		=> 		$JSON
			)
		);
	}

	public function updatelang()
	{
		
	}

	public function deletelang()
	{
		
	}

	public function change_language($type)
	{
		$this->session->set_userdata("lang",$type);
		redirect('','refresh');
	}

}

 ?>