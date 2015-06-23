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
 * Function Management Controller
 *
 * The Function Management Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */

 class Functions extends CI_Controller {
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

 	/**
	 * Index Function Management Loader
	 */
 	public function index()
 	{
 		// annouce application list variable
 		$app_list = array();
 		// Load application model
 		$this->load->model('application_model');
		// get data from model
 		$app_list = $this->application_model->get();
 		// load application overview list view
 		$this->load->view('template/header_common',array('setTitle' => 'Function Overview'));
 		$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
 		$this->load->view('template/menu',array("setActiveMenu" => 3,"Firstname" => $this->session->userdata('Firstname')));
 		$this->load->view('func_preoverview',array("app_list" => $app_list));
 		$this->load->view('template/footer');
 	}

 	/**
	 * Manage page for Function Management Loader
	 */
 	public function manage()
 	{
 		// annouce application list variable
 		$app_list = array();
 		// Load application model
 		$this->load->model('application_model');
		// get data from model
 		$app_list = $this->application_model->get();
 		// load application manage list view
 		$this->load->view('template/header_common',array('setTitle' => 'Function Management'));
 		$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
 		$this->load->view('template/menu',array("setActiveMenu" => 3,"Firstname" => $this->session->userdata('Firstname')));
 		$this->load->view('func_premanage',array("app_list" => $app_list));
 		$this->load->view('template/footer');
 	}

 	/**
	 * Log Report Function Management Loader
	 */
 	public function report()
 	{
 		// Load functions model
 		$this->load->model('function_model');
 		// load functions reort view
 		$this->load->view('template/header_common',array('setTitle' => 'Function Report'));
 		$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
 		$this->load->view('template/menu',array("setActiveMenu" => 3, "Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata("Lastname")));
 		$this->load->view('func_reportdetail',array("function" => $this->function_model->get()));
 		$this->load->view('template/footer');
 	}

 	/**
	 * List function data
	 */
 	public function list_func()
 	{
 		// announce return variable
 		$JSON = array();
		// Load functions model
 		$this->load->model('function_model');
		// get data from model
 		$JSON = $this->function_model->get();
		// return REST
 		$this->load->view('json',array("JSON" => $JSON));
 	}

 	/**
	 * Save function data
	 */
 	public function savefunc()
 	{
		// announce return variable
 		$JSON = array();
		// Load Form Validation Library
 		$this->load->library('form_validation');
		// Form Validation Rules
 		$this->form_validation->set_rules('func_name', 'Function Name', 'required');
 		$this->form_validation->set_rules('func_token', 'Function Token', 'required');
 		$this->form_validation->set_rules('func_appid', 'Application', 'required');
 		$this->form_validation->set_rules('func_primary', 'Function Primary', 'required');
		// Start Validation
 		if ($this->form_validation->run() == FALSE) {
 			$JSON = array('status' => 403, 'message' => 'Data input not corrent!');
 		} else {
			// Load application model
 			$this->load->model('application_model');
			// Set variable in application model
 			$this->application_model->setID($this->input->post('func_appid',true));
 			if ($this->application_model->getdetail()) {
				// Load function model
 				$this->load->model('function_model');
				// Set value to variable
 				$this->function_model->setApplicationName($this->application_model->getApplicationName());
 				$this->function_model->setApplicationID($this->input->post('func_appid',true));
 				$this->function_model->setFunctionName($this->input->post('func_name',true));
 				$this->function_model->setFunctionToken($this->input->post('func_token',true));
 				$this->function_model->setFunctionPrimary($this->input->post('func_primary',true));
 				if ($this->function_model->add()) {
 					$JSON = array('status' => 200, 'message' => 'Add function data successful!');
 				} else {
 					$JSON = array('status' => 500, 'message' => 'Database Error!');
 				}
 			} else {
 				$JSON = array('status' => 404, 'message' => 'App ID Not found!');
 			}
 		}
 		$this->load->view('json',array("JSON" => $JSON));
 	}

	/**
	 * Get function data
	 */
	public function getfunc()
	{
		// announce return variable
		$JSON = array();
		// get _id from post method
		$_id = $this->input->post('_id', true);
		if (!empty($_id)) {
			// Load function model
			$this->load->model('function_model');
			// Set variable in functions model
			$this->function_model->setID($_id);
			// Get functions data detail from database
			if ($this->function_model->getdetail())
				$JSON = array('status' => 200, 'function_id' => $_id, 'function_name' => $this->function_model->getFunctionName(), 'function_token' => $this->function_model->getFunctionToken(), 'application_id' => $this->function_model->getApplicationID(), 'function_primary' => $this->function_model->getFunctionPrimary());
			else
				$JSON = array('status' => 403, 'message' => 'Error Database!');
		} else {
			show_error('Method not allowed', 403);
		}
		$this->load->view('json',array("JSON" => $JSON));
	}

	/**
	 * Delete function data
	 */
	public function delfunc()
	{
		// announce return variable
		$JSON = array();
		// get _id from post method
		$_id = $this->input->post('_id', true);
		if (!empty($_id)) {
			// Load function model
			$this->load->model('function_model');
			// Set variable in function model
			$this->function_model->setID($_id);
			// Delete function in database
			if ($this->function_model->delete()) {
				// Load logger and used model
				$this->load->model('logger_model');
				$this->load->model('used_model');
				// Set function id
				$this->logger_model->setFuncID($_id);
				$this->used_model->setUseFuncID($_id);
				// Delete logger and used data
				if ($this->logger_model->dellogbyfunc() && $this->used_model->dellogbyfunc()) {
					$JSON = array("status" => 200, "message" => "Delete function data successful!");		
				} else {
					$JSON = array('status' => 403, 'message' => 'Database Error!');
				}
			} else {
				$JSON = array('status' => 403, 'message' => 'Database Error!');
			}		
		} else {
			show_error('Method not allowed',403);
		}
		$this->load->view('json',array("JSON" => $JSON));
	}

	/**
	 * Update function data
	 */
	public function updatefunc()
	{
		// announce return variable
		$JSON = array();
		// Load Form Validation Library
		$this->load->library('form_validation');
		// Form Validation Rules
		$this->form_validation->set_rules('func_idedit', 'Function ID Editor', 'required');
		$this->form_validation->set_rules('func_name', 'Function Name', 'required');
		$this->form_validation->set_rules('func_token', 'Function Token', 'required|exact_length[32]');
		$this->form_validation->set_rules('func_appid', 'Application', 'required');
		$this->form_validation->set_rules('func_primary', 'Function Primary', 'required');
		// Start Validation
		if ($this->form_validation->run() == FALSE) {
			$JSON = array('status' => 403, 'message' => 'Data input not corrent!');
		} else {
			// Load application model
			$this->load->model('application_model');
			// Set variable in application model
			$this->application_model->setID($this->input->post('func_appid',true));
			if ($this->application_model->getdetail()) {
				// Load function model
				$this->load->model('function_model');
 				// Set variable in functions model
				$this->function_model->setID($this->input->post('func_idedit',true));
				$this->function_model->setApplicationName($this->application_model->getApplicationName());
				$this->function_model->setApplicationID($this->input->post('func_appid',true));
				$this->function_model->setFunctionName($this->input->post('func_name',true));
				$this->function_model->setFunctionToken($this->input->post('func_token',true));
				$this->function_model->setFunctionPrimary($this->input->post('func_primary',true));
				// Add function detail to database
				if ($this->function_model->update()) {
					// load logger model
					$this->load->model('logger_model');
					// load used model
					$this->load->model('used_model');
					// set variable
					$this->logger_model->setFuncName($this->input->post('func_name',true));
					$this->logger_model->setFuncID($this->input->post('func_idedit',true));
					$this->used_model->setUseFuncID($this->input->post('func_idedit',true));
					$this->used_model->setUseFuncName($this->input->post('func_name',true));
					if ($this->logger_model->updatefuncname() && $this->used_model->updatefuncname()) {
						$JSON = array('status' => 200, 'message' => 'Update function data successful!');
					} else {
						$JSON = array('status' => 500, 'message' => 'Database error!');
					}
					
				} else {
					$JSON = array('status' => 500, 'message' => 'Database error!');
				}
			} else {
				$JSON = array('status' => 404, 'message' => 'App ID Not found!');
			}
		}
		$this->load->view('json',array("JSON" => $JSON));
	}

	/**
	 * Getlog function data
	 */
	public function getlog()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$daterange = $this->input->post('daterange',true);
		$typeselect = $this->input->post('typeselect',true);
		$function_id = $this->input->post('function_id',true);
		// Load logger model
		$this->load->model('logger_model');
		// check data variable to get a model function
		if (empty($daterange) && empty($typeselect) && empty($function_id)) {
			$JSON = $this->logger_model->get();
		} else {
			$JSON = $this->logger_model->getif_func($daterange,$typeselect,$function_id);
		}
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 *  Overview Function Management Loader
	 */
	public function overview($_id)
	{
		// Load function model
		$this->load->model('function_model');
		// Load application model
		$this->load->model('application_model');
 		// set ID to model
		$this->function_model->setID($_id);
 		// load function data
		$this->function_model->getdetail();
		// Set variable in application model
		$this->application_model->setID($this->function_model->getApplicationID());
		// Get application data detail from database
		$this->application_model->getdetail();
 		// check _id in database
		if (!empty($this->function_model->getFunctionName())) {
 			// load application reort view
			$this->load->view('template/header_common',array('setTitle' => $this->function_model->getFunctionName() . " : Overview"));
			$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
			$this->load->view('template/menu',array("setActiveMenu" => 3, "Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata("Lastname")));
			$this->load->view('func_overview',array("function_detail" => $this->function_model, "application_detail" => $this->application_model));
			$this->load->view('template/footer');
		} else {
			show_error('ID not found!',404);
		}
	}

	/**
	 * Get data from model to generate summarry daily graph
	 */
	public function summarydaygraph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setFuncID($func_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphdaysummaryfunc();
			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}

	/**
	 * Get data from model to generate summarry monthy graph
	 */
	public function summarymonthgraph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setFuncID($func_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphmonthsummaryfunc();

			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}
	/**
	 * Get data from model to generate summarry year graph
	 */
	public function summaryyeargraph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setFuncID($func_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphyearsummaryfunc();

			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}

	/**
	 * Get data from model to generate used daily graph
	 */
	public function useddaygraph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load Used model
			$this->load->model('used_model');
			// set variable in used model
			$this->used_model->setUseFuncID($func_id);
			$this->used_model->setUseDate($day);
			// get data from model
			$JSON = $this->used_model->graphdayusedfunc();
			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}

	/**
	 * Get data from model to generate used monthy graph
	 */
	public function usedmonthgraph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load Used model
			$this->load->model('used_model');
			// set variable in used model
			$this->used_model->setUseFuncID($func_id);
			$this->used_model->setUseDate($day);
			// get data from model
			$JSON = $this->used_model->graphmonthusedfunc();

			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}

	/**
	 * Get data from model to generate used year graph
	 */
	public function usedyeargraph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load Used model
			$this->load->model('used_model');
			// set variable in used model
			$this->used_model->setUseFuncID($func_id);
			$this->used_model->setUseDate($day);
			// get data from model
			$JSON = $this->used_model->graphyearusedfunc();

			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}

	/**
	 * Get data from model to generate summarry ratio daily graph
	 */
	public function summarydayratiograph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setFuncID($func_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphdaysummaryratiofunc();
			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}

	/**
	 * Get data from model to generate summarry ratio monthy graph
	 */
	public function summarymonthratiograph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setFuncID($func_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphmonthsummaryratiofunc();
			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}

	/**
	 * Get data from model to generate summarry ratio year graph
	 */
	public function summaryyearratiograph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$func_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($func_id) && !empty($day)) {
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setFuncID($func_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphyearsummaryratiofunc();
			$this->load->view('json', array("JSON" => $JSON));
		} else {
			show_error('Method not allowed!',500);
		}
	}
}