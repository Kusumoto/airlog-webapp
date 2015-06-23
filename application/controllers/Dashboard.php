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
 * Dashboard Controller
 *
 * The Dashboard Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */

 class Dashboard extends CI_Controller {

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
	 * Index Dashboard Loader
	 */
 	public function index()
 	{
 		// load application model
 		$this->load->model('application_model');
 		// load function model
 		$this->load->model('function_model');
 		// load user model
 		$this->load->model('users_model');
 		// load dashboard view
 		$this->load->view('template/header_common',array("setTitle" => "Dashboard"));
 		$this->load->view('template/header',array("Firstname" => $this->session->userdata('Firstname'), "Lastname" => $this->session->userdata('Lastname')));
 		$this->load->view('template/menu',array("setActiveMenu" => 1,"Firstname" => $this->session->userdata('Firstname')));
 		$this->load->view('dashboard',array("countApp" => $this->application_model->countapp(), "countFunc" => $this->function_model->countfunction(), "countUser" => $this->users_model->countuser()));
 		$this->load->view('template/footer');
 	}

 	/**
	 * Get data from model to generate summarry daily graph
	 */
 	public function summarydaygraph()
 	{
		// announce return variable
 		$JSON = array();
		// Load logger model
 		$this->load->model('logger_model');
		// set variable in logger model
 		$this->logger_model->setLogDate(date('Y-m-d'));
		// get data from model
 		$JSON = $this->logger_model->graphdaysummary_dashboard();
 		$this->load->view('json', array("JSON" => $JSON));
 	}

	/**
	 * Get data from model to generate summarry monthy graph
	 */
	public function summarymonthgraph()
	{
		// announce return variable
		$JSON = array();
		// Load logger model
		$this->load->model('logger_model');
		// set variable in logger model
		$this->logger_model->setLogDate(date('Y-m-d'));
		// get data from model
		$JSON = $this->logger_model->graphmonthsummary_dashboard();

		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get data from model to generate summarry year graph
	 */
	public function summaryyeargraph()
	{
		// announce return variable
		$JSON = array();
		// Load logger model
		$this->load->model('logger_model');
		// set variable in logger model
		$this->logger_model->setLogDate(date('Y-m-d'));
		// get data from model
		$JSON = $this->logger_model->graphyearsummary_dashboard();
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get data from model to generate used daily graph
	 */
	public function useddaygraph()
	{
		// announce return variable
		$JSON = array();
		// Load Used model
		$this->load->model('used_model');
		// set variable in used model
		$this->used_model->setUseDate(date('Y-m-d'));
		// get data from model
		$JSON = $this->used_model->graphdayused_dashboard();
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get data from model to generate used monthy graph
	 */
	public function usedmonthgraph()
	{
		// announce return variable
		$JSON = array();
		// Load Used model
		$this->load->model('used_model');
		// set variable in used model
		$this->used_model->setUseDate(date('Y-m-d'));
		// get data from model
		$JSON = $this->used_model->graphmonthused_dashboard();
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get data from model to generate used year graph
	 */
	public function usedyeargraph()
	{
		// announce return variable
		$JSON = array();
		// Load Used model
		$this->load->model('used_model');
		// set variable in used model
		$this->used_model->setUseDate(date('Y-m-d'));
		// get data from model
		$JSON = $this->used_model->graphyearused_dashboard();

		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get data from model to generate function ratio graph
	 */
	public function ratiofunctiongraph()
	{
		// announce return variable
		$JSON = array();
		// Load logger model
		$this->load->model('function_model');
		// get data from model
		$JSON = $this->function_model->countfuncinapp();
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get CPU load percentage
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
		$JSON = array('status' => 200, 'cpu' => $cpu['user']+$cpu['sys']);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get memory use percentage
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
		$JSON = array('status' => 200, 'memory' => (int)$memory_usage);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get disk use percentage
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
		$JSON = array('status' => 200, 'disk' => $dp);
		$this->load->view('json', array("JSON" => $JSON));
	}

	/**
	 * Get web service status
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
						$service_content = file_get_contents($urlapi);
						$json_parse = json_decode($service_content);
						if ($json_parse->Status && $json_parse->API_Version) {
							$JSON = array('status' => 200);
						}
					} catch (Exception $e) {
						$JSON = array('Status' => 503);
					}
				} else {
					$JSON = array('status' => 503);
				}			
			} catch(Exception $e) {
				$JSON = array('status' => 503);
			}
			
			$this->load->view('json',array('JSON' => $JSON));
		}
	}

	/**
	 * Get database status
	 */
	public function chkdb()
	{
		$this->load->model('setting_model');
		$JSON = array('status' => 200);
		$this->load->view('json',array('JSON' => $JSON));
	}

	/**
	 * Get web status
	 */
	public function chkweb()
	{
		// announce return variable
		$JSON = array();
		$headercontent = get_headers(site_url(),1);
				// Check HTTP Request Header
		if ($headercontent[0] == "HTTP/1.1 200 OK") {
			$JSON = array('status' => 200);
		} else {
			$JSON = array('status' => 503);
		}
		$this->load->view('json',array('JSON' => $JSON));
	}

	/**
	 * Restart web service
	 */
	public function webservicerestart()
	{
		// announce return variable
		$JSON = array();
		// sell for restart tomcat
		shell_exec('sudo /opt/tomcat/bin/shutdown.sh');
		if (shell_exec('sudo /opt/tomcat/bin/startup.sh')) {
			$JSON = array('status' => 200);
		} else {
			$JSON = array('status' => 500);
		}
		$this->load->view('json',array('JSON' => $JSON));
	}

	/**
	 * Restart Mongodb
	 */
	public function dbrestart()
	{
		// announce return variable
		$JSON = array();
		// sell for restart mongodb
		if (shell_exec('sudo /etc/init.d/mongod restart')) {
			$JSON = array('status' => 200);
		} else {
			$JSON = array('status' => 500);
		}
		$this->load->view('json',array('JSON' => $JSON));
	}

	/**
	 * Reboot
	 */
	public function reboot()
	{
		// announce return variable
		$JSON = array();
		// sell for reboot
		shell_exec('sudo reboot');
		$JSON = array('status' => 200);
		$this->load->view('json',array('JSON' => $JSON));
	}

	/**
	 * Shutdown
	 */
	public function shutdown()
	{
		// announce return variable
		$JSON = array();
		// sell for shutdown
		shell_exec('sudo poweroff');
		$JSON = array('status' => 200);
		$this->load->view('json',array('JSON' => $JSON));
	}
}