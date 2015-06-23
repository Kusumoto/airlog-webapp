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
 * REST Web Service Controller
 *
 * The REST Web Service API Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */

class Rest extends CI_Controller {

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
		// Load API database model
 		$this->load->model('API_model');
 		if ($this->input->post()) {
 			// Get API_Key from POST Method
 			$api_key = $this->input->post('api_key',true);
 			// settter API Key
 			$this->API_model->setApiKey($api_key);
 			if (!$this->API_model->checkEnable()) {
 				show_error('API Key not found or not allow to use.', 400);
 			}
 		} else {
 			show_error('Method not allowed', 405);
 		}
	}

	/**
	 * Index REST API Loader
	 */
	public function index()
	{
		$JSON = array('Status' => 200, 'Message' => 'API version 1.0');
		$this->load->view('json',array("JSON" => $JSON));
	}

	/**
	 * List Application API
	 */
	public function listapplications()
	{
		// announce return variable
 		$JSON = array();
		// Load application model
 		$this->load->model('application_model');
		// get data from model
 		$data = $this->application_model->get();
 		// Build Return data
 		$JSON = array('Status' => 200, 'Data' => $data);
		// return REST
 		$this->load->view('json',array("JSON" => $JSON));
	}

	/**
	 * Getlog application data API
	 */
	public function getapplicationlog()
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
		if (empty($daterange) && empty($typeselect) && empty($application_id)) {
			$data = $this->logger_model->get();
		} else {
			$data = $this->logger_model->getif($daterange,$typeselect,$application_id);
		}
		$JSON = array('Status' => 200, 'Data' => $data);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * List Function API
	 */
	public function listfunctions()
	{
		// announce return variable
 		$JSON = array();
		// Load functions model
 		$this->load->model('function_model');
		// get data from model
 		$data = $this->function_model->get();
		// Build Return data
 		$JSON = array('Status' => 200, 'Data' => $data);
		// return REST
 		$this->load->view('json',array("JSON" => $JSON));
	}

	/**
	 * Getlog function data A{O}
	 */
	public function getfunctionlog()
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
			$data = $this->logger_model->get();
		} else {
			$data = $this->logger_model->getif_func($daterange,$typeselect,$function_id);
		}
		$JSON = array('Status' => 200, 'Data' => $data);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get CPU load percentage API
	 */
	public function getcpuload()
	{
		// announce return variable
		$JSON = array();
		// get stat unit file in linux
		$stat1 = file('/proc/stat');
		sleep(1);
		$stat2 = file('/proc/stat');
		// split string cpu use
		$info1 = explode(" ", preg_replace("!cpu +!", "", $stat1[0]));
		$info2 = explode(" ", preg_replace("!cpu +!", "", $stat2[0]));
		$dif = array();
		// extract data to array
		$dif['user'] = $info2[0] - $info1[0];
		$dif['nice'] = $info2[1] - $info1[1];
		$dif['sys'] = $info2[2] - $info1[2];
		$dif['idle'] = $info2[3] - $info1[3];
		$total = array_sum($dif);
		$cpu = array();
		foreach($dif as $x=>$y) $cpu[$x] = round($y / $total * 100, 1);
		// set data cpu
		$JSON = array('Status' => 200, 'cpu' => $cpu['user']+$cpu['sys']);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get memory use percentage API
	 */
	public function getmemuse()
	{
		// announce return variable
		$JSON = array();
		// find free memory in unix shell
		$free = shell_exec('free');
		$free = (string)trim($free);
		$free_arr = explode("\n", $free);
		$mem = explode(" ", $free_arr[1]);
		$mem = array_filter($mem);
		$mem = array_merge($mem);
		$memory_usage = $mem[2]/$mem[1]*100;
		// set data memory
		$JSON = array('Status' => 200, 'memory' => (int)$memory_usage);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get disk use percentage API
	 */
	public function getdiskuse()
	{
		// announce return variable
		$JSON = array();
		// get disk space free (in bytes)
		$df = disk_free_space("/");
		// and get disk space total (in bytes)
		$dt = disk_total_space("/");
		// now we calculate the disk space used (in bytes) 
		$du = $dt - $df;
		// percentage of disk used
		$dp = sprintf('%d',($du / $dt) * 100);
		$JSON = array('Status' => 200, 'disk' => $dp);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get web service status API
	 */
	public function chkwebservice()
	{
		// announce return variable
		$JSON = array();
		// Load setting_model model
		$this->load->model('setting_model');
		$this->setting_model->setVariable('apiurl');
		if ($this->setting_model->getData()) {
			$urlapi = $this->setting_model->getValue();
			try {
				$headercontent = get_headers($urlapi,1);
				if ($headercontent[0] == "HTTP/1.1 200 OK") {
					// Check Content Webservice response
					try {
						$service_content = file_get_contents($webservice);
						$json_parse = json_decode($service_content);
						if ($json_parse['Status'] && $json_parse['API_Version']) {
							$JSON = array('Status' => 200);
						}
					} catch (Exception $e) {
						$JSON = array('Status' => 503);
					}
				} else {
					$JSON = array('Status' => 503);
				}			
			} catch(Exception $e) {
				$JSON = array('Status' => 503);
			}
			
			$this->load->view('json',array('JSON' => $JSON));
		}
	}

	/**
	 * Get database status API
	 */
	public function chkdb()
	{
		$this->load->model('setting_model');
		$JSON = array('Status' => 200);
		$this->load->view('json',array('JSON' => $JSON));
	}

	/**
	 * Get web status API
	 */
	public function chkweb()
	{
		// announce return variable
		$JSON = array();
		$headercontent = get_headers(site_url(),1);
				// Check HTTP Request Header
		if ($headercontent[0] == "HTTP/1.1 200 OK") {
			$JSON = array('Status' => 200);
		} else {
			$JSON = array('Status' => 503);
		}
		$this->load->view('json',array('JSON' => $JSON));
	}

}

/* End of file Rest.php */
/* Location: ./application/controllers/Rest.php */