<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 *  =======================================
 *  mPDF Library for CodeIgniter 
 *  Author     : Weerayut Hongsa
 *  License    : Protected 
 *  Email      : Kusumoto.com@gmail.com
 *  ======================================= 
 */  
require_once APPPATH."/third_party/mpdf57/mpdf.php"; 
 
class CreatePDF extends mPDF { 
    public function __construct() { 
        parent::__construct(); 
    }
}