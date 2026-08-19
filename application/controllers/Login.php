<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
    }
    public function index()
    {
        $this->load->view('Login');
    }

}
