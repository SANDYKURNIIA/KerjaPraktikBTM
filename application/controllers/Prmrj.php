<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prmrj extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		echo "Page is not accessible";
	}

	public function print_out()
	{
		$data['page_title']="General Concern";
		$this->load->view('print/prmrj', $data);
	}
}
