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
 * Installation Controller
 *
 * The Installation Wizard for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */

 class Installation extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
		// Load Essential Library
 		$this->load->library('session');
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('encryption');
		// Check System already installed
 		if (file_exists(FCPATH.'install.lock')) 
 		{
 			redirect('/authenticate','refresh');
 		}
 	}

	/**
	 * Index  Installer Loader
	 */
	public function index()
	{
		$mongoresult = $phpresult = $filewriter1result = $filewriter2result = $jsonmodule = $mongomodule = $mcryptmodule = "";
		$pass 		 = true;
		// Grap Web server Version
		$serversoftware_main 	= 	trim($_SERVER['SERVER_SOFTWARE']);
		$serversoftware_strip1 	= 	explode('/', $serversoftware_main);
		$serversoftware_final 	= 	explode('(', $serversoftware_strip1[1]);
		if ((double)$serversoftware_final[0] >= 2.2) 
		{
			$webserverresult 	= 	"<i class=\"fa fa-check icon_corrent fa-2x\"></i> ".$serversoftware_main;
		} 
		else 
		{	
			$webserverresult 	= 	"<i class=\"fa fa-times icon_wrong fa-2x\"></i> ".$serversoftware_main;
			$pass 				= 	false;
		}
			// Grap Version of PHP
		if (phpversion() >= 5.3) 
		{
			$phpresult 			= 	"<i class=\"fa fa-check icon_corrent fa-2x\"></i> ".phpversion();
		} 
		else 
		{
			$phpresult 			= 	"<i class=\"fa fa-times icon_wrong fa-2x\"></i> ".phpversion();
			$pass 				= 	false;
		}
			// Check Root Path Can Writable
		if (is_writable(FCPATH)) 
		{
			$filewriter1result 	= 	"<i class=\"fa fa-check icon_corrent fa-2x\"></i>";
		} 
		else 
		{
			$filewriter1result 	= 	"<i class=\"fa fa-times icon_wrong fa-2x\"></i>";
			$pass = false;
		}
			// Check Configure Path Can Writable
		if (is_writable(APPPATH.'config/')) 
		{
			$filewriter2result 	= 	"<i class=\"fa fa-check icon_corrent fa-2x\"></i>";
		} 
		else 
		{
			$filewriter2result 	= 	"<i class=\"fa fa-times icon_wrong fa-2x\"></i>";
			$pass 				= 	false;
		}
			// Check PHP JSON Module
		if (extension_loaded('json')) 
		{
			$jsonmodule 		= 	"<i class=\"fa fa-check icon_corrent fa-2x\"></i>";
		} 
		else 
		{
			$jsonmodule 		= 	"<i class=\"fa fa-times icon_wrong fa-2x\"></i>";
			$pass 				= 	false;
		}
			// Check PHP MongoDB Module
		if (extension_loaded('mongo')) 
		{
			$mongomodule 		= 	"<i class=\"fa fa-check icon_corrent fa-2x\"></i>";
		} 
		else 
		{
			$mongomodule 		= 	"<i class=\"fa fa-times icon_wrong fa-2x\"></i>";
			$pass 				= 	false;
		}
			// Check PHP Mcrypt Module
		if (extension_loaded('mcrypt')) 
		{
			$mcryptmodule 		= 	"<i class=\"fa fa-check icon_corrent fa-2x\"></i>";
		} 
		else 
		{
			$mcryptmodule 		= 	"<i class=\"fa fa-times icon_wrong fa-2x\"></i>";
			$pass 				= 	false;
		}
			// If Do_POST Submition
		if ($pass && $this->input->post()) 
		{
				// Check Access Token
			if ($this->input->post('token',true) != $this->session->userdata('token_install')) 
			{
				show_error('Access Token Invalid.',500);					
			} 
			else 
			{
					// Do Antihack bypass installation
				$this->session->unset_userdata('token_install');
				$prepare_encrypt 	= 	$this->session->userdata('session_id').'|step1';
				$ciphertext 		= 	$this->encryption->encrypt($prepare_encrypt);
				$session_data 		= 	array(
					'token_install' => $ciphertext,
					);
				$this->session->set_userdata($session_data);
					// redirect to step1
				redirect('/installation/step1','refresh');
			}
		} 
		else 
		{
				// Generate token key and save to session
			$key 			= 	time();
			$ciphertext 	= 	$this->encryption->encrypt($key);
			$session_data 	= 	array(
				'token_install' => $ciphertext,
				);
			$this->session->set_userdata($session_data);
				// Load View
			$this->load->view('installation/header');
			$this->load->view('installation/body_step0',array(
				'webserverresult' 	=> 		$webserverresult, 
				'phpresult' 		=> 		$phpresult, 
				'filewriter1result' => 		$filewriter1result,
				'filewriter2result' => 		$filewriter2result,
				'jsonmodule' 		=> 		$jsonmodule,
				'mongomodule' 		=> 		$mongomodule,
				'mcryptmodule' 		=> 		$mcryptmodule,
				'pass' 				=> 		$pass,
				'token' 			=> 		$ciphertext,
				)
			);
			$this->load->view('installation/footer');
		}
	}

		/**
	 	* Step1 Installer Loader
	 	*/
	 	public function step1()
	 	{
			// AutiHack Checker
	 		if (!$this->session->userdata('token_install'))
	 			redirect('/installation','refresh');

	 		$token_install 		= 	$this->session->userdata('token_install');
	 		$decrypt_token 		= 	$this->encryption->decrypt($token_install);
	 		$extract_token 		= 	explode('|', $decrypt_token);
	 		if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step1') 
	 		{
	 			show_error('Access Token Invalid',500);
	 		} 
	 		else 
	 		{
				// Check POST Method Form
	 			if ($this->input->post() && $this->input->post('token',true) &&
	 				$this->input->post('token_dbchk',true) && $this->input->post('token_webservicechk',true)) 
	 			{
					// Load Form Validation Library
	 				$this->load->library('form_validation');
					// Form Validation Rules
	 				$this->form_validation->set_rules('sys_user', 'Username', 'trim|required');
	 				$this->form_validation->set_rules('sys_pass1', 'Password', 'trim|required|matches[sys_pass2]');
	 				$this->form_validation->set_rules('sys_pass2', 'Confirm Password', 'trim|required');
	 				$this->form_validation->set_rules('sys_email', 'Email', 'trim|required|valid_email');
	 				$this->form_validation->set_rules('sys_firstname', 'First Name', 'trim|required');
	 				$this->form_validation->set_rules('sys_lastname', 'Last Name', 'trim|required');
					// Start Validation
	 				if ($this->form_validation->run() == FALSE) 
	 				{
						// Load View
	 					$this->load->view('installation/header');
	 					$this->load->view('installation/body_step1',array(
	 						'token' 				=> 		$token_install, 
	 						'token_dbchk' 			=> 		$this->input->post('token_dbchk',true), 
	 						'token_webservicechk' 	=> 		$this->input->post('token_webservicechk',true)
	 						)
	 					);
	 					$this->load->view('installation/footer');
	 				} 
	 				else 
	 				{
						// Input data to variable
	 					$username 		= 	$this->input->post('sys_user',true);
	 					$password1 		= 	$this->input->post('sys_pass1',true);
	 					$email 			= 	$this->input->post('sys_email',true);
	 					$firstname 		= 	$this->input->post('sys_firstname',true);
	 					$lastname 		= 	$this->input->post('sys_lastname',true);
						// Antihack and Encryption sys data
	 					$this->session->unset_userdata('token_install');
	 					$key1 			= 	$username.'|'.$password1.'|'.$email.'|'.$firstname.'|'.$lastname;
	 					$key2 			= 	$this->session->userdata('session_id').'|step2';
	 					$ciphertext2 	= 	$this->encryption->encrypt($key2);
	 					$ciphertext1 	= 	$this->encryption->encrypt($key1);
	 					$session_data 	= 	array(
	 						'token_install' 		=> 		$ciphertext2,
	 						'token_sysuser' 		=> 		$ciphertext1
	 						);
	 					$this->session->set_userdata($session_data);
						// redirect to step2
	 					redirect('/installation/step2','refresh');						
	 				}
	 			} 
	 			else 
	 			{
					// Load View
	 				$this->load->view('installation/header');
	 				$this->load->view('installation/body_step1',array(
	 					'token' 	=> 		$token_install
	 					)
	 				);
	 				$this->load->view('installation/footer');
	 			}

	 		}
	 	}

		/**
		 * Check MongoDB Connection
	 	*/
		public function chkmongoconnect()
		{
			// Load Helper for Check MongoDB Connection
			$this->load->helper('mongotestdb');
			$JSON = array();

			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);
			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step1') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{
				// Construct this module
				$mongo_host = $this->input->post('mongo_host',true);
				$mongo_port = $this->input->post('mongo_port',true);
				$mongo_user = $this->input->post('mongo_user',true);
				$mongo_pass = $this->input->post('mongo_pass',true);
				$mongo_db 	= $this->input->post('mongo_db',true);
				// Check MongoDB Connection
				if (mongotestdb($mongo_host,$mongo_user,$mongo_pass,$mongo_port,$mongo_db)) 
				{
					// Generate token key and save to session
					$key 			= $mongo_host.'|'.$mongo_user.'|'.$mongo_pass.'|'.$mongo_port.'|'.$mongo_db;
					$ciphertext 	= $this->encryption->encrypt($key);
					$session_data 	= array(
						'token_dbcheck' 	=> 		$ciphertext,
						);
					$this->session->set_userdata($session_data);
					$JSON = array(
						'Status'	 => 	200,
						'Token' 	 => 	$ciphertext
						);
				} 
				else 
				{
					$JSON = array(
						'Status' 	 => 	503
						);
				}
				$this->load->view('installation/json',array(
					'JSON' 		=> 		$JSON
					)
				);
			}
		}

		/**
		 * Check Web Service Connection
	 	*/
		public function chkwebservice()
		{
			$JSON = array();

			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);
			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step1') 
			{
				show_error('Access Token Invalid',500);
			} 
			else
			{
				// Construct this module
				$webservice = $this->input->post('webservice',true).'/getVersionService';

				//$webservice = $this->input->post('webservice',true); //TEST

				$headercontent = get_headers($webservice,1);
				// Check HTTP Request Header
				if ($headercontent[0] == "HTTP/1.1 200 OK") 
				{

					/* FOR TEST ONLY */
					/*
					$key = $webservice;
					$ciphertext = $this->encryption->encrypt($key);
					$session_data = array(
						'token_webservicechk' => $ciphertext,
						);
					$this->session->set_userdata($session_data);
					$JSON = array('Status' => 200, 'Token' => $ciphertext);
					*/
					/* END FOR TEST ONLY */

					// Check Content Webservice response
					try 
					{
						$service_content 	= 	file_get_contents($webservice);
						$json_parse 		= 	json_decode($service_content);
						if ($json_parse->Status && $json_parse->API_Version) 
						{
							// Generate token key and save to session
							$key 			= 	$webservice;
							$ciphertext 	= 	$this->encryption->encrypt($key);
							$session_data 	= 	array(
								'token_webservicechk' => $ciphertext,
								);
							$this->session->set_userdata($session_data);
							$JSON 			= 	array(
								'Status' 	=> 	200, 
								'Token' 	=> 	$ciphertext
								);
						}
					} 
					catch (Exception $e) 
					{
						$JSON 	= 	array(
							'Status' 	=> 	503
							);
					}
				} 
				else 
				{
					$JSON 	= 	array(
						'Status' 	=> 	503
						);
				}
				$this->load->view('installation/json',array(
					'JSON' 		=> 		$JSON
					)
				);
			}
		}

		/**
		 * Step2 Installer Loader
	 	*/
		public function step2()
		{
			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);
			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step2') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{	
				// Load View	
				$this->load->view('installation/header');
				$this->load->view('installation/body_step2');
				$this->load->view('installation/footer');
			}
		}

		/**
		 * Preparing for install
	 	*/
		public function install_preparing()
		{
			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);
			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step2') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{
				// Load REST Data
				$JSON = array();
				// Check POST Method
				if ($this->input->post()) 
				{
					try 
					{
						// Check all variable
						$ses_token 		= 	$this->session->userdata('token_install');
						$ses_mongo 		= 	$this->session->userdata('token_dbcheck');
						$ses_serviceurl = 	$this->session->userdata('token_webservicechk');
						$ses_sysuser 	= 	$this->session->userdata('token_sysuser');
						if ($ses_token && $ses_mongo && $ses_serviceurl && $ses_sysuser) 
						{
							$JSON = array(
								'Status' 	=> 	'200', 
								'Message' 	=> 	'OK'
								);
						} 
						else 
						{
							$JSON = array(
								'Status' 	=> 	'500', 
								'Message' 	=> 	'Essential data not found'
								);
						}
					} 
					catch (Exception $e) 
					{
						$JSON = array(
							'Status' 	=> 	'500', 
							'Message' 	=> 	'Exception : '.$e->getMessage()
							);
					}
				} 
				else 
				{
					$JSON = array(
						'Status' 	=> 		'500', 
						'Message' 	=> 		'Method not allowed');
				}
				$this->load->view('installation/json',array(
					'JSON' 		=> 		$JSON
					)
				);
			}
		}

		/**
		 * Testing MongoDB Connection
	 	*/
		public function install_testmongoconnect()
		{
			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);
			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step2') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{	
				// Load Helper for Check MongoDB Connection
				$this->load->helper('mongotestdb');
				// Load REST Data
				$JSON = array();
				// Check POST Method
				if ($this->input->post()) 
				{
					try 
					{
						// Test MongoDB Connection
						$ses_mongo 		= 	$this->session->userdata('token_dbcheck');
						$decrypt_mongo 	= 	$this->encryption->decrypt($ses_mongo);
						$mongodata 		= 	explode('|', $decrypt_mongo);
						$mongo_host 	= 	$mongodata[0];
						$mongo_port 	= 	$mongodata[3];
						$mongo_user 	= 	$mongodata[1];
						$mongo_pass 	= 	$mongodata[2];
						$mongo_db 		= 	$mongodata[4];
						if (mongotestdb($mongo_host,$mongo_user,$mongo_pass,$mongo_port,$mongo_db)) 
						{
							$JSON = array(
								'Status' 	=> 		'200',
								'Message' 	=> 		'OK'
								);
						} 
						else 
						{
							$JSON = array(
								'Status' 	=> 		'500', 
								'Message' 	=> 		'MongoDB Connection Failed.'
								);
						}
					} 
					catch (Exception $e) 
					{
						$JSON = array(
							'Status' 	=> 		'500', 
							'Message' 	=> 		'Exception : '.$e->getMessage());
					}
				} 
				else 
				{
					$JSON = array(
						'Status' 		=> 		'500', 
						'Message' 		=> 		'Method not allowed'
						);
				}
				$this->load->view('installation/json',array(
					'JSON' 		=> 		$JSON
					)
				);	
			}
		}

		/**
		 * Write a configuration file
	 	*/
		public function install_setupconfigfile()
		{
			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);

			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step2') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{
				// Load REST Data
				$JSON = array();
				// Check POST Method
				if ($this->input->post()) 
				{
					// Load File Helper
					$this->load->helper('file');
					try 
					{
						// Get MongoDB Data to variable
						$ses_mongo 		= 	$this->session->userdata('token_dbcheck');
						$decrypt_mongo 	= 	$this->encryption->decrypt($ses_mongo);
						$mongodata 		= 	explode('|', $decrypt_mongo);
						$mongo_host 	= 	$mongodata[0];
						$mongo_port 	= 	$mongodata[3];
						$mongo_user 	= 	$mongodata[1];
						$mongo_pass 	= 	$mongodata[2];
						$mongo_db 		= 	$mongodata[4];
						// Write Configuration file
						$config_data 	= 	'defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');'."\n\n";
						$config_data 	.= 	'/** File Auto Generate by SAMF Installation Wizard **/'."\n";
						$config_data 	.= 	'$config[\'mongo_server\'] = "'.$mongo_host.'";'."\n";
						$config_data 	.= 	'$config[\'mongo_port\'] = "'.$mongo_port.'";'."\n";
						$config_data 	.= 	'$config[\'mongo_dbname\'] = "'.$mongo_db.'";'."\n";
						$config_data 	.= 	'$config[\'mongo_username\'] = "'.$mongo_user.'";'."\n";
						$config_data 	.= 	'$config[\'mongo_password\'] = "'.$mongo_pass.'";'."\n";

						if (!write_file(APPPATH.'config/mongo.php', "<?php ".$config_data)) 
						{
							$JSON = array(
								'Status' 	=> 	'500', 
								'Message' 	=> 	'Unable to write the config file.'
								);
						} 
						else 
						{
							$JSON = array(
								'Status' 	=> 	'200', 
								'Message' 	=> 	'OK'
								);
						}

					} 
					catch (Exception $e) 
					{
						$JSON = array(
							'Status' 	=> 		'500', 
							'Message' 	=> 		'Exception : '.$e->getMessage()
							);
					}

				} 
				else 
				{
					$JSON = array(
						'Status' 	=> 		'500', 
						'Message' 	=> 		'Method not allowed'
						);
				}
				$this->load->view('installation/json',array(
					'JSON' 		=> 		$JSON
					)
				);
			}
		}

		/**
		 * Create Collection for MongoDB
	 	*/
		public function install_setcollectionmongo()
		{
			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);

			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step2') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{
				// Load REST Data
				$JSON = array();
				// Check POST Method
				if ($this->input->post()) 
				{
					// Load Library Mongo
					$this->load->model('installation_model');
					// Remove older collection
					$this->installation_model->removeCollection();
					// Create Collection
					try 
					{
						if ($this->installation_model->createNewCollection()) 
						{
							$JSON = array(
								'Status' 	=> 		'200', 
								'Message' 	=> 		'OK'
								);
						} 
						else 
						{
							$JSON = array(
								'Status' 	=> 		'500', 
								'Message' 	=> 		'Exception : unknown!'
								);
						}
					} 
					catch (Exception $e) 
					{
						$JSON = array(
							'Status' 	=> 		'500', 
							'Message' 	=> 		'Exception : '.$e->getMessage());
					}
				} 
				else 
				{
					$JSON = array(
						'Status' 	=> 		'500', 
						'Message' 	=> 		'Method not allowed'
						);
				}
				$this->load->view('installation/json',array(
					'JSON' 	=>		$JSON
					)
				);
			}
		}

		/**
		 * Finally Installer
	 	*/
		public function install_finalinstall()
		{
			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);

			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step2') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{
				// Load REST Data
				$JSON = array();
				if ($this->input->post()) 
				{
					// Load Library Mongo
					$this->load->model('installation_model');
					// Get SysUser and API URL form session and decrypt
					$ses_sysuser_en 	= 	$this->session->userdata('token_sysuser');
					$ses_sysapi_en 		= 	$this->session->userdata('token_webservicechk');
					$ses_sysuser_de 	= 	$this->encryption->decrypt($ses_sysuser_en);
					$ses_sysapi_de 		= 	$this->encryption->decrypt($ses_sysapi_en);
					// Decompress String SysUser and API
					$de_sysuser 		= 	explode('|', $ses_sysuser_de);
					// Encryption Password
					$en_password 		= 	md5($de_sysuser[1]);
					// Seter data to model
					$this->installation_model->setUsername($de_sysuser[0]);
					$this->installation_model->setPassword($en_password);
					$this->installation_model->setEmail($de_sysuser[2]);
					$this->installation_model->setApiUrl($ses_sysapi_de);
					$this->installation_model->setFirstname($de_sysuser[3]);
					$this->installation_model->setLastname($de_sysuser[4]);
					// Save Data
					try 
					{
						if ($this->installation_model->createDefaultUser()) 
						{
							if ($this->installation_model->createConfigApiUrl()) 
							{
								$JSON 			= array(
									'Status' 	=> 	'200', 
									'Message' 	=> 	'OK'
									);
								$token_install 	= $this->session->userdata('session_id').'|step3';
								$encrypt_token 	= $this->encryption->encrypt($token_install);
								$session_data 	= array(
									'token_install' => $encrypt_token,
									);
								$this->session->set_userdata($session_data);
							} 
							else 
							{
								$JSON = array(
									'Status' 	=> 	'500', 
									'Message' 	=> 	'Exception : Cannot Save API URL!'
									);
							}
						} 
						else 
						{
							$JSON = array(
								'Status' 		=> 	'500', 
								'Message'	 	=> 	'Exception : Cannot Save User!'
								);
						}
					} 
					catch (Exception $e) 
					{
						$JSON = array(
							'Status' 	=> 	'500', 
							'Message' 	=> 	'Exception : '.$e->getMessage()
							);
					}
				} 
				else 
				{
					$JSON = array(
						'Status' 	=> 	'500', 
						'Message' 	=> 	'Method not allowed'
						);
				}
				$this->load->view('installation/json',array(
					'JSON' 	=> 	$JSON
					)
				);
			}
		}

		/**
		 * Step3 Installer Loader
	 	*/
		public function step3()
		{
			// AutiHack Checker
			if (!$this->session->userdata('token_install'))
				redirect('/installation','refresh');

			$token_install 	= 	$this->session->userdata('token_install');
			$decrypt_token 	= 	$this->encryption->decrypt($token_install);
			$extract_token 	= 	explode('|', $decrypt_token);
			if ($extract_token[0] != $this->session->userdata('session_id') || $extract_token[1] != 'step3') 
			{
				show_error('Access Token Invalid',500);
			} 
			else 
			{
				// Load File Helper
				$this->load->helper('file');
				// Write file install.lock
				if (!write_file(FCPATH.'install.lock', "")) 
				{
					show_error('Unable to write the install locker file.', 500);
				} 
				else 
				{
					$this->load->view('installation/header');
					$this->load->view('installation/body_step3');
					$this->load->view('installation/footer');
				}
			}
		}

		public function docker_step1($db_host,$db_port,$db_dbname,$db_user,$db_pwd)
		{
			// Load File Helper
			$this->load->helper('file');
			try 
			{
				// Get MongoDB Data to variable
				$mongo_host 	= 	$db_host;
				$mongo_port 	= 	$db_port;
				$mongo_user 	= 	$db_user;
				$mongo_pass 	= 	$db_pwd;
				$mongo_db 		= 	$db_dbname;
				// Write Configuration file
				$config_data 	= 	'defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');'."\n\n";
				$config_data 	.= 	'/** File Auto Generate by SAMF Installation Wizard **/'."\n";
				$config_data 	.= 	'$config[\'mongo_server\'] = "'.$mongo_host.'";'."\n";
				$config_data 	.= 	'$config[\'mongo_port\'] = "'.$mongo_port.'";'."\n";
				$config_data 	.= 	'$config[\'mongo_dbname\'] = "'.$mongo_db.'";'."\n";
				$config_data 	.= 	'$config[\'mongo_username\'] = "'.$mongo_user.'";'."\n";
				$config_data 	.= 	'$config[\'mongo_password\'] = "'.$mongo_pass.'";'."\n";

				if (!write_file(APPPATH.'config/mongo.php', "<?php ".$config_data)) 
				{
					echo "Error!";
				}

			} 
			catch (Exception $e) 
			{
				echo "Server Error";
			}

		}

		public function docker_step2($username,$password,$name_f,$name_l)
		{
			// Load Library Mongo
			$this->load->model('installation_model');
			// Seter data to model
			$this->installation_model->setUsername($username);
			$this->installation_model->setPassword($password);
			$this->installation_model->setEmail($name_f);
			$this->installation_model->setApiUrl('');
			$this->installation_model->setFirstname($name_f);
			$this->installation_model->setLastname($name_l);
			// Save Data
			try 
			{
				if ($this->installation_model->createDefaultUser()) 
				{
					if ($this->installation_model->createConfigApiUrl()) 
					{

					} 
					else 
					{
						echo "Error!";
					}
				} 
				else 
				{
					echo "Exception!";
				}
			} 
			catch (Exception $e) 
			{
				echo "Exception2!";
			}
		}
	}