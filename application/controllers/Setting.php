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

	public function getDefaultLang()
	{
		// announce return variable
		$JSON 	= 	array();
		// return REST
		$this->load->view('json',
			array(
				'JSON' 			=> 		array(
					'data'  =>  	file_get_contents(APPPATH.'language/default_language/default_lang.php')
					)
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
					'lang_name' 		=> 		$this->language_model->getLangName(),
					'lang_file'			=>		file_get_contents(APPPATH.'language/'.$this->language_model->getLangPrefix().'/'.$this->language_model->getLangPrefix().'_lang.php')
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

	public function addlang()
	{
		// Load Form Validation Library
		$this->load->library('form_validation');
		// Form Validation Rules
		$this->form_validation->set_rules('lang_prefix', 'Language Prefix', 'required');
		$this->form_validation->set_rules('lang_name', 'Language Name', 'required');
		$this->form_validation->set_rules('lang_data', 'Language Data', 'required');
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
			$lang_data 		= $this->input->post('lang_data',false);
			$lang_prefix 	= $this->input->post('lang_prefix',true);
			$lang_name		= $this->input->post('lang_name',true);

			// Load language model
			$this->load->model('language_model');
			$this->load->helper('file');
			$structure = APPPATH.'language/'.$lang_prefix;
			if (!mkdir($structure, 0777)) 
			{
				$JSON = array(
					'status' 	=> 	'500', 
					'Message' 	=> 	'Unable to create language folder.'
					);
			} 
			else 
			{
				if (!write_file(APPPATH.'language/'.$lang_prefix.'/'.$lang_prefix.'_lang.php', $lang_data))
				{
					$JSON = array(
						'status' 	=> 	'500', 
						'Message' 	=> 	'Unable to create language file.'
						);
				}
				else
				{
					try 
					{
						$this->language_model->setLangName($lang_name);
						$this->language_model->setLangPrefix($lang_prefix);
						$this->language_model->add();
						$JSON = array(
							'status' 	=> 	'200', 
							'Message' 	=> 	'OK'
							);
					} 
					catch (Exception $e) 
					{
						$JSON = array(
							'status' 	=> 		'500', 
							'Message' 	=> 		'Exception : '.$e->getMessage()
							);
					}
					
				}
			}
		}
		$this->load->view('json',
			array(
				'JSON' 		  => 	$JSON
				)
			);
	}

	public function updatelang()
	{
		// Load Form Validation Library
		$this->load->library('form_validation');
		// Form Validation Rules
		$this->form_validation->set_rules('_id', 'ID', 'required');
		$this->form_validation->set_rules('lang_prefix', 'Language Prefix', 'required');
		$this->form_validation->set_rules('lang_name', 'Language Name', 'required');
		$this->form_validation->set_rules('lang_data', 'Language Data', 'required');
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
			$_id 			= $this->input->post('_id',true);
			$lang_data 		= $this->input->post('lang_data',false);
			$lang_prefix 	= $this->input->post('lang_prefix',true);
			$lang_name		= $this->input->post('lang_name',true);

			// Load language model
			$this->load->model('language_model');
			$this->load->helper('file');
			$file = APPPATH.'language/'.$lang_prefix.'/'.$lang_prefix.'_lang.php';

			if (unlink($file))
			{
				if (!write_file($file))
				{
					$JSON = array(
						'Status' 	=> 	'500', 
						'Message' 	=> 	'Unable to create language file.'
						);
				}
				else
				{
					try 
					{
						$this->language_model->setID($_id);
						$this->language_model->setLangName($lang_name);
						$this->language_model->setLangPrefix($lang_prefix);
						$this->language_model->update();
						$JSON = array(
							'Status' 	=> 	'200', 
							'Message' 	=> 	'OK'
							);
					} 
					catch (Exception $e) 
					{
						$JSON = array(
							'Status' 	=> 		'500', 
							'Message' 	=> 		'Exception : '.$e->getMessage()
							);
					}
				}
			}
			else
			{
				$JSON = array(
					'Status' 	=> 	'500', 
					'Message' 	=> 	'Unable to delete language file.'
					);
			}

			$this->load->view('json',
				array(
					'JSON' 		  => 	$JSON
					)
				);
		}
	}

	public function deletelang()
	{
		// Load Form Validation Library
		$this->load->library('form_validation');
		// Form Validation Rules
		$this->form_validation->set_rules('_id', 'ID', 'required');
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
			// Load language model
			$this->load->model('language_model');
			$this->load->helper('file');
			// Set ID to Model
			$_id 			= $this->input->post('_id',true);
			$this->language_model->setID($_id);
			// Get Data from DB
			$this->language_model->getdetail();
			$file 			= APPPATH.'language/'.$this->language_model->getLangPrefix().'/'.$this->language_model->getLangPrefix().'_lang.php';
			if (unlink($file))
			{
				rmdir(APPPATH.'language/'.$this->language_model->getLangPrefix());
				$this->language_model->delete();
				$JSON = array(
					'Status' 	=> 	'200', 
					'Message' 	=> 	'OK'
					);
			}
			else
			{
				$JSON = array(
					'Status' 	=> 	'500', 
					'Message' 	=> 	'Unable to delete language file.'
					);
			}
		}

		$this->load->view('json',
			array(
				'JSON' 		  => 	$JSON
				)
			);

	}

	public function getAPILink()
	{
		// announce return variable
		$JSON 	= 	array();
		// Load setting_model model
		$this->load->model('setting_model');
		$this->setting_model->setVariable('apiurl');
		if ($this->setting_model->getData()) 
		{
			$urlapi 		   = 	$this->setting_model->getValue();
			$JSON = array(
				'Status' 	=> 	'200', 
				'api' 		=> 	$urlapi
				);
		}
		else
		{
			$JSON = array(
				'Status' 	=> 	'200', 
				'api' 		=> 	''
				);
		}

		$this->load->view('json',
			array(
				'JSON' 		  => 	$JSON
				)
			);
	}

	public function updateAPILink()
	{
		// Load Form Validation Library
		$this->load->library('form_validation');
		// Form Validation Rules
		$this->form_validation->set_rules('api_link', 'API Link', 'required');
		// Start Validation
		if ($this->form_validation->run() == FALSE) 
		{
			$JSON = array(
				'Status' 		=> 		403, 
				'Message' 		=> 		'Data input not corrent!'
				);
		} 
		else 
		{
			// announce return variable
			$JSON 	= 	array();
			// Load setting_model model
			$this->load->model('setting_model');
			// Set Value in Setting model
			$this->setting_model->setVariable('apiurl');
			$this->setting_model->setValue($this->input->post('api_link'));
			if ($this->setting_model->setData())
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
					'Message' 	=> 	'Unable save api link.'
					);
			}
		}

		$this->load->view('json',
			array(
				'JSON' 		  => 	$JSON
				)
			);

	}

	public function change_language($type)
	{
		$this->session->set_userdata("lang",$type);
		redirect('','refresh');
	}

}

?>