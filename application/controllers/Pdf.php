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
 * The Pdf Module for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Controller
 * @author		SAMF Dev Team
 */


class Pdf extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Memory Limitation 
		ini_set('memory_limit', '-1');
		// Load Essential Library
 		$this->load->library('session');
 		$this->load->library('createpdf');
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
		
	}

	public function appreport()
	{
		// announce return variable
		$JSON 			= 	array();
		// get data from form
		$daterange 		= 	$this->input->post('daterange',true);
		$typeselect 	= 	$this->input->post('typeselect',true);
		$application_id = 	$this->input->post('application_id',true);
		// Load logger model
		$this->load->model('logger_model');
		// check data variable to get a model function
		if (empty($daterange) && empty($typeselect) && empty($application_id)) 
		{
			$Data 		= 	$this->logger_model->get();
		} 
		else 
		{
			$Data 		= 	$this->logger_model->getif($daterange,$typeselect,$application_id);
		}
		$this->load->view('pdftemplate', array(
			'data' 		=> 		$Data, 
			'daterange' => 		$daterange
			)
		);
	}

	public function funcreport()
	{
		// announce return variable
		$JSON 			= 	array();
		// get data from form
		$daterange 		= 	$this->input->post('daterange',true);
		$typeselect 	= 	$this->input->post('typeselect',true);
		$function_id 	= 	$this->input->post('function_id',true);
		// Load logger model
		$this->load->model('logger_model');
		// check data variable to get a model function
		if (empty($daterange) && empty($typeselect) && empty($function_id)) 
		{
			$Data 		= 	$this->logger_model->get();
		}
		else 
		{
			$Data 		= 	$this->logger_model->getif_func($daterange,$typeselect,$function_id);
		}
		$this->load->view('pdftemplate', array(
			'data' 			=> 	$Data, 
			'daterange'	 	=> 	$daterange)
		);
	}

}

/* End of file Pdf.php */
/* Location: ./application/controllers/Pdf.php */