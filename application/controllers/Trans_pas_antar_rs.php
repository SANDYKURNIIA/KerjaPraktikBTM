<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans_pas_antar_rs extends CI_Controller {

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
		$data['page_title']="Transfer Pasien Antar RS";
		$this->load->view('print/Trans_pas_antar_rs', $data);
	}
}
