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
 * Authenticate Controller
 *
 * The Authenticate Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */

 class Authenticate extends CI_Controller {

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
 	}

 	/**
	 * Index Autheticate Loader
	 */
 	public function index()
 	{
 		// check user logged in to system
 		if (!$this->session->userdata('isLogin')) 
 		{
 			redirect('/authenticate/login','refresh');
 		} 
 		else 
 		{
 			redirect('/dashboard','refresh');
 		}
 	}

 	/**
	 * Login Authenticate Loader
	 */
 	public function login()
 	{
 		// Check session isLogin?
 		if (!$this->session->userdata('isLogin')) // if not login
 		{
 			// Check POST Method
 			if ($this->input->post()) 
 			{
 				// Load form validation library
 				$this->load->library('form_validation');
 				// Set Rules form validation
 				$this->form_validation->set_rules('username', 'Username', 'trim|required');
 				$this->form_validation->set_rules('password', 'Password', 'trim|required');
 				// Start validation
 				if ($this->form_validation->run() == FALSE) 
 				{
 					$this->load->view('authenticate/header');
 					$this->load->view('authenticate/body');
 					$this->load->view('authenticate/footer');
 				} 
 				else 
 				{
 					// Load users database model
 					$this->load->model('users_model');
 					// assign variable
 					$username = $this->input->post('username', true);
 					$password = $this->input->post('password', true);
 					// setter model
 					$this->users_model->setUsername($username);
 					$this->users_model->setPassword($password);
 					// check data in database
 					if ($this->users_model->checkLogin()) 
 					{
 						// save session
 						$sessiondata 	= 	array(
 							'isLogin' 	=> 	true,
 							'Username' 	=> 	$this->users_model->getUsername(),
 							'Firstname' => 	$this->users_model->getFirstname(),
 							'Lastname' 	=> 	$this->users_model->getLastname(),
 							);
 						$this->session->set_userdata($sessiondata);
 						// redirect to dashboard
 						redirect('/dashboard','refresh');
 					} 
 					else 
 					{
 						// load login view
 						$this->load->view('authenticate/header');
 						$this->load->view('authenticate/body',array(
 							'ErrorMessage' 		=> 		'Invalid username or password'
 							)
 						);
 						$this->load->view('authenticate/footer');
 					}
 				}
 			} 
 			else 
 			{	
 				// load login view
 				$this->load->view('authenticate/header');
 				$this->load->view('authenticate/body');
 				$this->load->view('authenticate/footer');
 			} 
 		} 
 		else 
 		{ 	// if logged in 
 			// redirect to dashboard
 			redirect('/dashboard','refresh');
 		}
 	}

 	/**
	 * Logout Authenticate Loader
	 */
 	public function logout()
 	{
 		// Check session isLogin?
 		if (!$this->session->userdata('isLogin')) // if not login
 		{
 			redirect('/authenticate','refresh');
 		}
 		else
 		{
 			// destroy all session data
 			$this->session->sess_destroy();
 			redirect('/authenticate','refresh');
 		}

 	}

 	public function editprofile()
 	{
 		if (!$this->session->userdata('isLogin'))
 			redirect('/authenticate/login','refresh');

 		$this->load->view('template/header');
 		$this->load->view('editprofile');
 		$this->load->view('template/footer');

 	}

 	public function editpassword()
 	{
 		if (!$this->session->userdata('isLogin'))
 			redirect('/authenticate/login','refresh');

 		$this->load->view('template/header');
 		$this->load->view('editprofile');
 		$this->load->view('template/footer');
 	}

 	public function adduser()
 	{
 		if (!$this->session->userdata('isLogin'))
 			redirect('/authenticate/login','refresh');

 		$this->load->view('template/header');
 		$this->load->view('adduser');
 		$this->load->view('template/footer');
 	}

 	public function userlist()
 	{
 		if (!$this->session->userdata('isLogin'))
 			redirect('/authenticate/login','refresh');

 		// load application overview list view
 		$this->load->view('template/header_common',array(
 			'setTitle' 		=> 		'User Management'
 			)
 		);
 		$this->load->view('template/header',array(
 			'Firstname' 	=> 		$this->session->userdata('Firstname'),
 			'Lastname' 		=> 		$this->session->userdata('Lastname')
 			)
 		);
 		$this->load->view('template/menu',array(
 			'setActiveMenu' => 		5,
 			'Firstname' 	=> 		$this->session->userdata('Firstname')
 			)
 		);
 		$this->load->view('userlist');
 		$this->load->view('template/footer');
 	}

 	/**
	 * Save a new user
	 */
 	public function saveuser()
 	{
		// announce return variable
 		$JSON = array();
 		// Load Form Validation Library
 		$this->load->library('form_validation');
		// Form Validation Rules
 		$this->form_validation->set_rules('username', 'Username', 'trim|required');
 		$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]');
 		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required');
 		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
 		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
 		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		// Start Validation
 		if ($this->form_validation->run() == FALSE) 
 		{
 			$JSON = array(
 				'status' 	=> 		400, 
 				'message' 	=> 		validation_errors()
 			);
 		} 
 		else 
 		{
 			// Get input form to variable
 			$username 	= 	$this->input->post('username', true);
 			$password 	= 	md5($this->input->post('password1', true));
 			$email 		= 	$this->input->post('email', true);
 			$firstname 	= 	$this->input->post('firstname',true);
 			$lastname 	= 	$this->input->post('lastname', true);
 			// Load users database model
 			$this->load->model('users_model');
 			// Set user and password
 			$this->users_model->setUsername($username);
 			$this->users_model->setPassword($password);
 			// check dulplicate
 			if (!$this->users_model->checkdup()) 
 			{
 				// set aditional data
 				$this->users_model->setEmail($email);
 				$this->users_model->setFirstname($firstname);
 				$this->users_model->setLastname($lastname);
 				// save user to database
 				if ($this->users_model->add()) 
 				{
 					$JSON = array(
 						'status' 		=> 		200,
 						'message' 		=> 		'Add new user successful!'
 					);
 				} 
 				else 
 				{
 					$JSON = array(
 						'status' 		=> 		500, 
 						'message' 		=> 		'Database Error!!'
 					);
 				}	
 			} 
 			else 
 			{
 				$JSON = array(
 					'status' 		=> 		403, 
 					'message' 		=> 		'Duplicate username in system.'
 				);
 			}
 		}
 		$this->load->view('json',array(
 			'JSON' 		=> 		$JSON
 			)
 		);
 	}

 	/**
	 * List User
	 */
 	public function getuserlist() 
 	{
 		// announce return variable
 		$JSON 	= 	array();
		// Load users model
 		$this->load->model('users_model');
		// get data from model
 		$JSON 	= 	$this->users_model->get();
		// return REST
 		$this->load->view('json',array(
 			'JSON' 		=> 		$JSON
 			)
 		);
 	}

 	/**
	 * Delete User
	 */
 	public function deluser()
 	{
 		// announce return variable
 		$JSON 	= 	array();
		// get _id from post method
 		$_id 	= 	$this->input->post('_id', true);
 		if (!empty($_id)) 
 		{
			// Load users model
 			$this->load->model('users_model');
			// Set variable in users model
 			$this->users_model->setID($_id);
			// Delete users in database
 			if ($this->users_model->delete())
 				$JSON = array(
 					'status' 		=> 		200,
 					'message' 		=>		'Delete user data successful!'
 				);
 			else
 				$JSON = array(
 					'status' 		=> 		403,
 					'message' 		=> 		'You mush to delete all this user in system, don\'t try it.'
 				);
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
	 * Get User Data
	 */
 	public function getuser()
 	{
 		// announce return variable
 		$JSON 	= 	array();
		// get _id from post method
 		$_id 	= 	$this->input->post('_id', true);
 		if (!empty($_id)) 
 		{
			// Load user model
 			$this->load->model('users_model');
			// Set variable in user model
 			$this->users_model->setID($_id);
			// Get application data detail from database
 			if ($this->users_model->getdetail())
 				$JSON = array(
 					'status' 		=> 		200, 
 					'username' 		=> 		$this->users_model->getUsername(), 
 					'firstname' 	=> 		$this->users_model->getFirstname(), 
 					'lastname' 		=> 		$this->users_model->getLastname(), 
 					'email' 		=> 		$this->users_model->getEmail()
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

 	public function updatedata()
 	{
 		// announce return variable
 		$JSON = array();
 		// Load Form Validation Library
 		$this->load->library('form_validation');
		// Form Validation Rules
 		$this->form_validation->set_rules('user_editid', 'User ID Editor', 'required');
 		$this->form_validation->set_rules('username', 'Username', 'trim|required');
 		$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]');
 		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required');
 		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
 		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
 		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		// Start Validation
 		if ($this->form_validation->run() == FALSE) 
 		{
 			$JSON = array('status' => 400, 'message' => validation_errors());
 		} 
 		else 
 		{
 			// Get input form to variable
 			$id 		= 	$this->input->post('user_editid', true);
 			$username 	= 	$this->input->post('username', true);
 			$password 	= 	md5($this->input->post('password1', true));
 			$email 		= 	$this->input->post('email', true);
 			$firstname 	= 	$this->input->post('firstname',true);
 			$lastname 	= 	$this->input->post('lastname', true);
 			// Load users database model
 			$this->load->model('users_model');
 			// Set user and password
 			$this->users_model->setID($id);
 			$this->users_model->setUsername($username);
 			$this->users_model->setPassword($password);
 			// set aditional data
 			$this->users_model->setEmail($email);
 			$this->users_model->setFirstname($firstname);
 			$this->users_model->setLastname($lastname);
 			// save user to database
 			if ($this->users_model->update()) 
 			{
 				$JSON = array(
 					'status' 		=> 		200, 
 					'message' 		=> 		'Update user successful!'
 				);
 			} 
 			else 
 			{
 				$JSON = array(
 					'status' 		=> 		500, 
 					'message' 		=> 		'Database Error!!'
 				);
 			}	
 		}
 		$this->load->view('json',array(
 			'JSON' 		=> 		$JSON
 			)
 		);
 	}
 }
