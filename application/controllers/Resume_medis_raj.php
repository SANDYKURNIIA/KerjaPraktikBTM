<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume_medis_raj extends CI_Controller {

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
		$data['page_title']="Resume Medis Rajal";
		$this->load->view('print/resume_medis_raj', $data);
	}
}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume_medis_raj extends CI_Controller {

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
		$data['page_title']="Resume Medis Rajal";
		$this->load->view('print/resume_medis_raj', $data);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
