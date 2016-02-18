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
 * API Management Controller
 *
 * The API Management Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */

 class Api extends CI_Controller {

 	/**
	 * API Management Loader
	 */
 	public function __construct()
 	{
 		parent::__construct();
		// Load Essential Library
 		$this->load->library('session');
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->helper('sec_samf');
 		// Load language 
 		$this->lang->load("english","english");
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

 	/**
	 * API Management Index
	 */
 	public function index()
 	{
 		// load api menage view
 		$this->load->view('template/header_common',array('setTitle' => 'API Management'));
 		$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
 		$this->load->view('template/menu',array("setActiveMenu" => 6,"Firstname" => $this->session->userdata('Firstname')));
 		$this->load->view('api');
 		$this->load->view('template/footer');
 	}

 	/**
	 * Create a new API Key
	 */
 	public function create()
 	{
 		// Check POST Method
 		if ($this->input->post()) {
 			// Load form validation library
 			$this->load->library('form_validation');
 			// Set Rules form validation
 			$this->form_validation->set_rules('api_key','API Key', 'required|trim');
 			$this->form_validation->set_rules('api_name','Application Name', 'required');
 			$this->form_validation->set_rules('api_isenable', 'Application Enable','required');
 			// Start validation
 			if ($this->form_validation->run() == FALSE) {
 				$JSON = array('Status' => 400, 'message' => validation_errors());
 			} else {
 				// Load API database model
 				$this->load->model('API_model');
 				// assign variable
 				$api_name = $this->input->post('api_name', true);
 				$api_key = $this->input->post('api_key', true);
 				$api_isenable = $this->input->post('api_isenable', true);
 				// setter model
 				$this->API_model->setApiName($api_name);
 				$this->API_model->setApiKey($api_key);
 				$this->API_model->setApiIsEnable($api_isenable);
 				// check API key exist in database
 				if (!$this->API_model->check()) {
 					// add API key and detail to database
 					if ($this->API_model->add())
 						$JSON = array('Status' => 200, 'Message' => 'Add new API successful.');
 					else
 						$JSON = array('Status' => 500, 'Message' => 'Service not available.');
 				} else {
 					$JSON = array('Status' => 400, 'Message' => 'API Key exist in database, please regenerate your key.');
 				}
 			}
 		} else {
 			$JSON = array('Status' => 405, 'Message' => 'Method not allowed.');
 		}
 		// return REST
 		$this->load->view('json',array('JSON' => $JSON));
 	}

 	/**
	 * Delete API Key
	 */
 	public function delete()
 	{
 		// Check POST Method
 		if ($this->input->post()) {
 			// Load form validation library
 			$this->load->library('form_validation');
 			// Set Rules form validation
 			$this->form_validation->set_rules('_id','MongoID', 'required|trim');
 			if ($this->form_validation->run() == FALSE) {
 				$JSON = array('Status' => 400, 'Message' => validation_errors());
 			} else {
 				// Load API database model
 				$this->load->model('API_model');
 				// assign variable
 				$_id = $this->input->post('_id', true);
 				// setter model
 				$this->API_model->setID($_id);
 				// check API key exist and in database and remove from database
 				if ($this->API_model->delete())
 					$JSON = array('Status' => 200, 'Message' => 'Remove API Key and data successful.');
 				else
 					$JSON = array('Status' => 400, 'Message' => 'The API Key not found in database.');
 			}
 		} else {
 			$JSON = array('Status' => 405, 'Message' => 'Method not allowed.');
 		}
 		// return REST
 		$this->load->view('json',array('JSON' => $JSON));
 	}

 	/**
	 * Generate API Key
	 */
 	public function generate()
 	{
 		// get now time for template generate
 		$timestamp = time();
 		// encrypt time template
 		$encryption = md5($timestamp);
 		// return json
 		$this->load->view('json',array("JSON" => array('token' => $encryption)));
 	}

 	/**
	 * Save a API Key after edited
	 */
 	public function save()
 	{
 		// Check POST Method
 		if ($this->input->post()) {
 			// Load form validation library
 			$this->load->library('form_validation');
 			// Set Rules form validation
 			$this->form_validation->set_rules('_id','ID', 'required|trim');
 			$this->form_validation->set_rules('api_key','API Key', 'required|trim');
 			$this->form_validation->set_rules('api_name','Application Name', 'required');
 			$this->form_validation->set_rules('api_isenable', 'Application Enable','required');
 			// Start validation
 			if ($this->form_validation->run() == FALSE) {
 				$JSON = array('Status' => 400, 'Message' => validation_errors());
 			} else {
 				// Load API database model
 				$this->load->model('API_model');
 				// assign variable
 				$_id = $this->input->post('_id',true);
 				$api_name = $this->input->post('api_name', true);
 				$api_key = $this->input->post('api_key', true);
 				$api_isenable = $this->input->post('api_isenable', true);
 				// setter model
 				$this->API_model->setID($_id);
 				$this->API_model->setApiName($api_name);
 				$this->API_model->setApiKey($api_key);
 				$this->API_model->setApiIsEnable($api_isenable);
 				// Update API key and detail to database
 				if ($this->API_model->update())
 					$JSON = array('Status' => 200, 'Message' => 'Update API data successful.');
 				else
 					$JSON = array('Status' => 500, 'Message' => 'Service not available.');
 			} 
 		} else {
 			$JSON = array('Status' => 405, 'Message' => 'Method not allowed.');
 		}
 		// return REST
 		$this->load->view('json',array('JSON' => $JSON));
 	}

 	/**
	 * Get all API Key in database
	 */
 	public function get()
 	{
 		// announce return variable
 		$JSON = array();
		// Load API model
 		$this->load->model('API_model');
		// get data from model
 		$JSON = $this->API_model->get();
		// return REST
 		$this->load->view('json',array("JSON" => $JSON));
 	}

 	/**
	 * Get a API Key detail in database
	 */
 	public function getdetail()
 	{
 		// Check POST Method
 		if ($this->input->post()) {
 			// get _id from post method
 			$_id = $this->input->post('_id', true);
 			if (!empty($_id)) {
				// Load API model
 				$this->load->model('API_model');
				// Set variable in API model
 				$this->API_model->setID($_id);
				// Get API data detail from database
 				if ($this->API_model->getdetail())
 					$JSON = array('Status' => 200, '_id' => $this->API_model->getID(), 'api_key' => $this->API_model->getApiKey(), 'api_name' => $this->API_model->getApiName(), 'api_isenable' => $this->API_model->getApiIsEnable());
 				else
 					$JSON = array('Status' => 403, 'Message' => 'Error Database!');
 			} else {
 				$JSON = array('Status' => 403, 'Message' => '_ID not empty!');
 			}
 		} else {
 			$JSON = array('Status' => 405, 'Message' => 'Method not allowed');
 		}
 		// return REST
 		$this->load->view('json',array("JSON" => $JSON));
 	}
 }