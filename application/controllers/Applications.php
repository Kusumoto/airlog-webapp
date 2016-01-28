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
 * Application Management Controller
 *
 * The Application Management Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */

 class Applications extends CI_Controller {
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
	 * Index Application Management Loader
	 */
 	public function index()
 	{
 		// load application overview list view
 		$this->load->view('template/header_common',
 			array(
 				'setTitle' 		=>		'Application Overview'
 			)
 		);
 		$this->load->view('template/header',
 			array(
 				'Firstname' 	=> 		$this->session->userdata('Firstname'), 
 				'Lastname' 		=> 		$this->session->userdata('Lastname')
 			)
 		);
 		$this->load->view('template/menu',
 			array(
 				'setActiveMenu' => 		2,
 				'Firstname' 	=> 		$this->session->userdata('Firstname')
 			)
 		);
 		$this->load->view('app_preoverview');
 		$this->load->view('template/footer');
 	}

 	/**
	 * Log Report Application Management Loader
	 */
 	public function report()
 	{
 		// Load application model
 		$this->load->model('application_model');
 		// load application reort view
 		$this->load->view('template/header_common',
 			array(
 				'setTitle' 		=> 		'Application Report'
 			)
 		);
 		$this->load->view('template/header',
 			array(
 				'Firstname' 	=> 		$this->session->userdata('Firstname'), 
 				'Lastname' 		=> 		$this->session->userdata('Lastname')
 			)
 		);
 		$this->load->view('template/menu',
 			array(
 				'setActiveMenu' => 		2, 
 				'Firstname' 	=> 		$this->session->userdata('Firstname'),
 				'Lastname' 		=> 		$this->session->userdata("Lastname")
 			)
 		);
 		$this->load->view('app_reportdetail',
 			array(
 				'application' 	=> 		$this->application_model->get()
 			)
 		);
 		$this->load->view('template/footer');
 	}

 	/**
	 * Manage page for Application Management Loader
	 */
 	public function manage()
 	{
 		// load application manage list view
 		$this->load->view('template/header_common',
 			array(
 				'setTitle' 		=> 		'Application Management'
 			)
 		);
 		$this->load->view('template/header',
 			array(
 				'Firstname' 	=> 		$this->session->userdata('Firstname'),
 				'Lastname' 		=> 		$this->session->userdata('Lastname')
 			)
 		);
 		$this->load->view('template/menu',
 			array(
 				'setActiveMenu' => 		2,
 				'Firstname' 	=> 		$this->session->userdata('Firstname')
 			)
 		);
 		$this->load->view('app_premanage');
 		$this->load->view('template/footer');
 	}

 	/**
	 * Generate Token for Application Autheticate with agent library
	 */
 	public function generatetoken()
 	{
 		// get now time for template generate
 		$timestamp = time();
 		// encrypt time template
 		$encryption = md5($timestamp);
 		// return json
 		$this->load->view('json',
 			array(
 				'JSON' 			=> 		array(
 											'token' 	=> 		$encryption
 										)
 				)
 			);
 	}

 	/**
	 * List application data
	 */
 	public function listapp()
 	{
 		// announce return variable
 		$JSON = array();
		// Load application model
 		$this->load->model('application_model');
		// get data from model
 		$JSON = $this->application_model->get();
		// return REST
 		$this->load->view('json',
 			array(
 				'JSON' 			=> 		$JSON
 			)
 		);
 	}

	/**
	 * Save application data
	 */
	public function saveapp()
	{
		// announce return variable
		$JSON = array();
		// Load Form Validation Library
		$this->load->library('form_validation');
		// Form Validation Rules
		$this->form_validation->set_rules('app_name', 'Application Name', 'required');
		$this->form_validation->set_rules('app_token', 'Application Token', 'required|exact_length[32]');
		$this->form_validation->set_rules('app_lang', 'Application Language', 'required');
		$this->form_validation->set_rules('app_agent', 'Agent Controller', 'required');
		// Start Validation
		if ($this->form_validation->run() == FALSE) 
		{
			$JSON = array(
				'status'		 => 	403,
				'message' 		 => 	'Data input not corrent!'
			);
		} 
		else 
		{
			// Load application model
			$this->load->model('application_model');
			// Set variable in application model
			$this->application_model->setApplicationName($this->input->post('app_name',true));
			$this->application_model->setApplicationToken($this->input->post('app_token',true));
			$this->application_model->setApplicationLang($this->input->post('app_lang',true));
			$this->application_model->setApplicationAgent($this->input->post('app_agent',true));
			// Add application detail to database
			if ($this->application_model->add()) 
			{
				$JSON = array(
					'status' 	  => 		200, 
					'message' 	  => 		'Add application data successful!'
				);
			} else {
				$JSON = array(
					'status' 	  => 		500,
					'message' 	  => 		'Database error!'
				);
			}
		}
		$this->load->view('json',
			array(
				'JSON' 		  => 	$JSON
			)
		);
	}

	/**
	 * Delete application data
	 */
	public function delapp()
	{
		// announce return variable
		$JSON = array();
		// get _id from post method
		$_id = $this->input->post('_id', true);
		if (!empty($_id)) 
		{
			// Load application model
			$this->load->model('application_model');
			// Set variable in application model
			$this->application_model->setID($_id);
			// Delete application in database
			if ($this->application_model->delete()) 
			{
				// Load logger and used model
				$this->load->model('logger_model');
				$this->load->model('used_model');
				// Set application id
				$this->logger_model->setAppID($_id);
				$this->used_model->setUseAppID($_id);
				// Delete logger and used data
				if ($this->logger_model->dellogbyapp() && $this->used_model->dellogbyapp()) 
				{
					$JSON = array(
						'status' 	=> 		200, 
						'message' 	=> 		'Delete function data successful!'
					);		
				} 
				else 
				{
					$JSON = array(
						'status' 	=>	 	403, 
						'message' 	=> 		'Database Error!'
					);
				}
			} 
			else 
			{
				$JSON = array(
					'status' 		=> 		403,
					'message' 		=> 		'You must to delete all this application function in system, before delete this application from system.'
				);
			}
		} 
		else 
		{
			show_error('Method not allowed',403);
		}
		$this->load->view('json',array(
			'JSON' 		=> 		$JSON
			)
		);
	}

	/**
	 * Get application data
	 */
	public function getapp()
	{
		// announce return variable
		$JSON = array();
		// get _id from post method
		$_id = $this->input->post('_id', true);
		if (!empty($_id)) 
		{
			// Load application model
			$this->load->model('application_model');
			// Set variable in application model
			$this->application_model->setID($_id);
			// Get application data detail from database
			if ($this->application_model->getdetail())
				$JSON = array(
					'status' 		   	=> 		200, 
					'application_name' 	=> 		$this->application_model->getApplicationName(),
					'application_token' => 		$this->application_model->getApplicationToken(),
					'application_lang' 	=> 		$this->application_model->getApplicationLang(), 
					'application_agent' => 		$this->application_model->getApplicationAgent()
				);
			else
				$JSON = array(
					'status' 		=> 		403,
					'message' 		=> 		'Error Database!'
				);
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

	/**
	 * Update application data
	 */
	public function updateapp()
	{
		// announce return variable
		$JSON = array();
		// Load Form Validation Library
		$this->load->library('form_validation');
		// Form Validation Rules
		$this->form_validation->set_rules('app_idedit', 'Application ID Editor', 'required');
		$this->form_validation->set_rules('app_name', 'Application Name', 'required');
		$this->form_validation->set_rules('app_token', 'Application Token', 'required|exact_length[32]');
		$this->form_validation->set_rules('app_lang', 'Application Language', 'required');
		// Start Validation
		if ($this->form_validation->run() == FALSE) 
		{
			$JSON = array(
				'status' 		=> 		403, 
				'message' 		=> 		'Data input not corrent!'
			);
		} 
		else 
		{
			// Load application model
			$this->load->model('application_model');
			// Set variable in application model
			$this->application_model->setID($this->input->post('app_idedit',true));
			$this->application_model->setApplicationName($this->input->post('app_name',true));
			$this->application_model->setApplicationToken($this->input->post('app_token',true));
			$this->application_model->setApplicationLang($this->input->post('app_lang',true));
			$this->application_model->setApplicationAgent($this->input->post('app_agent',true));
			// Update application detail to database
			if ($this->application_model->update()) 
			{
				// load function model
				$this->load->model('function_model');
				$this->function_model->setApplicationID($this->input->post('app_idedit',true));
				$this->function_model->setApplicationName($this->input->post('app_name',true));
				if ($this->function_model->updateappname()) 
				{
					// load logger model
					$this->load->model('logger_model');
					// load used model
					$this->load->model('used_model');
					// set variable
					$this->logger_model->setAppName($this->input->post('app_name',true));
					$this->logger_model->setAppID($this->input->post('app_idedit',true));
					$this->used_model->setUseAppName($this->input->post('app_name',true));
					$this->used_model->setUseAppID($this->input->post('app_idedit',true));
					if ($this->logger_model->updateappname() && $this->used_model->updateappname()) 
					{
						$JSON = array(
							'status' 		=> 		200, 
							'message' 		=> 		'Update application data successful!'
						);
					} 
					else 
					{
						$JSON = array(
							'status' 		=> 		500, 
							'message' 		=> 		'Database error!'
						);
					}
				} 
				else 
				{
					$JSON = array(
						'status' 		=> 		500, 
						'message' 		=> 		'Database error!'
					);
				}
			} 
			else 
			{
				$JSON = array(
					'status' 		=> 		500, 
					'message' 		=> 		'Database error!'
				);
			}
		}
		$this->load->view('json',array(
			'JSON' 		=> 		$JSON
			)
		);
	}

	/**
	 * Getlog application data
	 */
	public function getlog()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$daterange = $this->input->post('daterange',true);
		$typeselect = $this->input->post('typeselect',true);
		$application_id = $this->input->post('application_id',true);
		// Load logger model
		$this->load->model('logger_model');
		// check data variable to get a model function
		if (empty($daterange) && empty($typeselect) && empty($application_id)) 
		{
			$JSON = $this->logger_model->get();
		} 
		else 
		{
			$JSON = $this->logger_model->getif($daterange,$typeselect,$application_id);
		}
		$this->load->view('json', array(
			'JSON' 		=> 		$JSON
			)
		);
	}

	/**
	 *  Overview Application Management Loader
	 */
	public function overview($_id)
	{
		// Load application model
		$this->load->model('application_model');
 		// set ID to model
		$this->application_model->setID($_id);
 		// load appliaction data
		$this->application_model->getdetail();
 		// check _id in database
		if (!empty($this->application_model->getApplicationName())) 
		{
 			// load application reort view
			$this->load->view('template/header_common',array(
				'setTitle' 		=> 		$this->application_model->getApplicationName() . " : Overview"
				)
			);
			$this->load->view('template/header',array(
				'Firstname' 	=> 		$this->session->userdata('Firstname'),
				'Lastname' 		=> 		$this->session->userdata('Lastname')
				)
			);
			$this->load->view('template/menu',array(
				'setActiveMenu' => 		2, 
				'Firstname' 	=> 		$this->session->userdata('Firstname'), 
				'Lastname' 		=> 		$this->session->userdata("Lastname")
				)
			);
			$this->load->view('app_overview',array(
				'application_detail' 	=> 		$this->application_model
				)
			);
			$this->load->view('template/footer');
		} 
		else 
		{
			show_error('ID not found!',404);
		}
	}

	/**
	 * Change agent controller status
	 */
	public function agentcontrol()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$app_id = $this->input->post('_id',true);
		// Load application model
		$this->load->model('application_model');
 		// set ID to model
		$this->application_model->setID($app_id);
 		// update agent controller
		if ($this->application_model->agent()) 
		{
			$JSON = array(
				'status' 		=> 		200, 
				'agent'			=> 		$this->application_model->getApplicationAgent()
			);
		} 
		else 
		{
			$JSON = array(
				'status' 		=> 		500,
				'message' 		=> 		'Database Error!'
			);
		}
		$this->load->view('json', array(
			'JSON' 		=> 		$JSON
			)
		);
	}

	/**
	 * Get data from model to generate summarry daily graph
	 */
	public function summarydaygraph()
	{
		// announce return variable
		$JSON = array();
		// get data from form
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setAppID($app_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphdaysummary();
			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setAppID($app_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphmonthsummary();

			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setAppID($app_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphyearsummary();

			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load Used model
			$this->load->model('used_model');
			// set variable in used model
			$this->used_model->setUseAppID($app_id);
			$this->used_model->setUseDate($day);
			// get data from model
			$JSON = $this->used_model->graphdayused();
			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load Used model
			$this->load->model('used_model');
			// set variable in used model
			$this->used_model->setUseAppID($app_id);
			$this->used_model->setUseDate($day);
			// get data from model
			$JSON = $this->used_model->graphmonthused();

			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load Used model
			$this->load->model('used_model');
			// set variable in used model
			$this->used_model->setUseAppID($app_id);
			$this->used_model->setUseDate($day);
			// get data from model
			$JSON = $this->used_model->graphyearused();

			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setAppID($app_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphdaysummaryratio();
			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setAppID($app_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphmonthsummaryratio();
			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
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
		$app_id = $this->input->post('_id',true);
		$day = $this->input->post('day',true);
		// check value in form
		if (!empty($app_id) && !empty($day)) 
		{
			// Load logger model
			$this->load->model('logger_model');
			// set variable in logger model
			$this->logger_model->setAppID($app_id);
			$this->logger_model->setLogDate($day);
			// get data from model
			$JSON = $this->logger_model->graphyearsummaryratio();
			$this->load->view('json', array(
				'JSON' 		=> 		$JSON
				)
			);
		} 
		else 
		{
			show_error('Method not allowed!',500);
		}
	}
}